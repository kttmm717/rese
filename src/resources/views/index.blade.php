@extends('layouts.default')

@section('title', '飲食店一覧ページ')

@section('css')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="top">
        <a class="logo" href="/home">Rese</a>
        <form id="search-form" class="search" action="/search" method="get">
            <div class="area__search">
                <select name="area">
                    <option value="">All area</option>
                    @foreach($areas as $area)
                    <option value="{{$area->id}}">{{$area->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="genre__search">
                <select name="genre">
                    <option value="">All genre</option>
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="input__search">
                <input name="keyword" class="keyword__search" type="text" placeholder="Search…">
            </div>
            <div class="search__button">
                <button>検索</button>
            </div>
        </form>
    </div>

    <div class="stores">
        @foreach($stores as $store)
            <div class="store">
                <div class="store__img">
                    <img src="{{Storage::disk('s3')->url($store->image_path)}}" alt="Store Image">
                </div>
                <div class="store__info">
                    <p class="store__name">{{$store->name}}</p>
                    <div class="hash">
                        <p>#{{$store->area->name}}</p>
                        <p>#{{$store->genre->name}}</p>
                    </div>
                    <div class="icon">
                        <a class="link" href="/detail/{{$store->id}}">詳しくみる</a>
                        <form action="{{$store->liked() ? '/unlike/'.$store->id : '/like/'.$store->id}}" method="post">
                            @csrf
                            @if($store->liked())
                                <button><i class="fas fa-heart like"></i></button>
                            @else
                                <button><i class="fas fa-heart unlike"></i></button>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    function adjustLastRowAlignment() {
        const container = document.querySelector(".stores");
        const stores = Array.from(container.children).filter(el => el.matches("div"));

        if(stores.length === 0) return;

        const existingDummy = container.querySelector(".dummy-space");
        
        if(existingDummy) {
            existingDummy.remove();
        }        
        const containerWidth = container.clientWidth;
        let rowStores = [];
        let rowWidth = 0;

        for(const store of stores) {
            const storeWidth = store.offsetWidth;
            if(rowWidth + storeWidth > containerWidth) {
                rowStores = [];
                rowWidth = 0;
            }
            rowStores.push(store);
            rowWidth += storeWidth;
        }
        if(rowStores.length > 0) {
            const dummy = document.createElement("div");
            dummy.classList.add("dummy-space");
            dummy.style.flex = "1 1 auto";
            dummy.style.visibility = "hidden";

            container.appendChild(dummy);
        }
    }

    window.addEventListener("resize", adjustLastRowAlignment);

    adjustLastRowAlignment();

    const searchForm = document.querySelector("#search-form"); //検索フォーム取得
    if (searchForm) {
        searchForm.addEventListener("submit", function() {
            setTimeout(adjustLastRowAlignment, 300);
        });
    }
</script>

@endsection