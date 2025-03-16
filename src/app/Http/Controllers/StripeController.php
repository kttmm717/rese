<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Auth;
use App\Models\Store;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use App\Models\Course;

class StripeController extends Controller
{
    public function stripe($store_id, ReservationRequest $request) {
        $course = (int)$request->input('course');
        $store = Store::find($store_id);
        $stripe = new StripeClient(config('stripe.stripe_secret_key'));

        [
            $user_id,
            $amount,
            $reservation_date,
            $reservation_time,
            $number_of_people,
            $course_id,
        ] = [
            Auth::id(),
            $course,
            $request->reservation_date,
            $request->reservation_time,
            $request->number_of_people,
            $request->course_id
        ];

        $course = Course::find($course_id);
        $amount = $course->price;

        $checkout_session = $stripe->checkout->sessions->create([
            'payment_method_types' => ['card'],
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'jpy',
                        'unit_amount' => $amount,
                        'product_data' => [
                            'name' => $store->name . '予約',
                            'description' => '予約コース：'. $course->name,
                        ],
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => "http://localhost/stripe/{$store_id}/success?user_id={$user_id}&amount={$amount}&reservation_date={$reservation_date}&reservation_time={$reservation_time}&number_of_people={$number_of_people}&course_id={$course_id}",
        ]);
        return redirect($checkout_session->url);
    }
    public function success($store_id, Request $request) {
        $stripe = new StripeClient(config('stripe.stripe_secret_key'));

        $stripe->charges->create([
            'amount' => $request->amount,
            'currency' => 'jpy',
            'source' => 'tok_visa'
        ]);

        Reservation::create([
            'user_id' => $request->user_id,
            'store_id' => $store_id,
            'reservation_date' => $request->reservation_date,
            'reservation_time' => $request->reservation_time,
            'number_of_people' => $request->number_of_people,
            'course_id' => $request->course_id,
        ]);
        return view('done');
    }
}
