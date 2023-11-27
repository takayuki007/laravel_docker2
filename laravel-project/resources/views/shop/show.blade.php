@extends('layouts.app')

@section('title', '店舗詳細')
@section('description', '店舗詳細ページです。')
@section('keywords', '店舗詳細ページ,PC買取,ピーシー買取')

@section('content')
    <div class="p-site-width">
        <form class="p-form" method="post" action="{{ route('shop.favorite',$shop->id)}}">
            @csrf
            <h1 class="c-info-title">{{ $shop->name }}</h1>
            <div class="p-info-area">
                <img src="{{ asset('/storage/shop_img/'.$shop->img) }}" class="c-info-img">
                <div class="c-info-wrapper">
                    <p class="c-text">TEL: {{ $shop->tel }}</p>
                    <p class="c-text">営業時間: {{ $open_time->time }}〜{{ $close_time->time }}</p>
                    <p class="c-text">定休日: {{ $shop->regular_holiday }}</p>
                    <p class="c-text">所在地: {{ $shop->location }}</p>
                    <p class="c-text">アクセス: {{ $shop->access }}</p>
                    @guest
                        <a href="{{ route('login')}}" class="c-btn-second p-btn-link">お気に入り</a>
                    @else
                        @if($favorite === 0)
                            <input type="submit" class="c-btn" value="お気に入り">
                        @elseif($favorite === 1)
                            <input type="submit" class="c-btn-second" value="お気に入り解除">
                        @endif
                    @endguest
                </div>
            </div>
        </form>

        <ul class="u-ul">
            <h1 class="c-info-title">同じ地域の買取店候補</h1>
            @foreach($relateShops as $relateShop)
                <list-item-component :name="{{ json_encode($relateShop->name) }}" img="{{ asset('/storage/shop_img/'.$relateShop->img) }}" shop-link="{{ route('shop.show', $relateShop->id)}}"></list-item-component>
            @endforeach
        </ul>
    </div>

@endsection
