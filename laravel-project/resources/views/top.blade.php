@extends('layouts.app')

@section('title', 'TOP')
@section('description', 'TOPページです。')
@section('keywords', 'TOPページ,PC買取,ピーシー買取')

@section('content')
    <div class="u-bg-img">
        <div class="p-site-width">
            <form class="p-top-form" method="post" action="{{ route('top.search')}}">
                @csrf
                <p class="c-text">日本最大級のPC買取点検索サイト</p>
                <h1 class="c-top-main-title">PC買取MAX！！</h1>
                <div class="p-top-search-area">
                    <select name="area" class="c-top-search-select">
                        <option value="0" class="c-search-option">全て</option>
                        @foreach($areas as $area)
                            <option value="{{ $area->id }}" class="c-search-option" @if(old('area')== $area->id) selected  @endif>{{ $area->name }}</option>
                        @endforeach
                    </select>
                    <select name="os" class="c-top-search-select">
                        <option value="0" class="c-search-option">全て</option>
                        @foreach($oss as $os)
                            <option value="{{ $os->id }}" class="c-search-option" @if(old('os')== $os->id) selected  @endif>{{ $os->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" class="c-top-btn" value="検索">
            </form>
        </div>
    </div>
    <div class="u-space"></div>
    <div class="p-site-width">
        <div class="c-banner-area">
            <div class="c-banner">
                <p class="c-banner-text">今月の買取強化店舗一覧はこちら！！</p>
            </div>
        </div>

        <div class="c-gray-area">
            <h1 class="c-top-title" id="what">PC買取MAXってなに？</h1>
            <p class="c-text">PC買取MAXとは、いらなくなった、使わなくなったPCをいつでもお金に変えられるように、あなたのお住まいの地域の買取店舗を検索できるサービスです。</p>
            <p class="c-text">エリアとOSで絞り込むことによって、お家の近くの店舗を表示することができます。店舗情報では住所と電話番号を確認できるため、店舗に直接問い合わせることが可能です。</p>
            <p class="c-text">なぜこのサービスを開発したかというと、PCに疎い人はネットで売ろうとしても個人情報を流出させないためPCを初期化する知識がなかったり、そもそもメルカリなどの個人売買に慣れていない人が多いです。そんな人には初期化の作業をやってくれる店舗買取が最適だと思いました。</p>
            <p class="c-text">ここでは、そんな人のために、買取店舗をご紹介しております。</p>
        </div>

        <ul class="u-ul">
            <h1 class="c-top-title">最新買取店情報</h1>
            @foreach($relateShops as $relateShop)
                <list-item-component :name="{{ json_encode($relateShop->name) }}" img="{{ asset('/storage/shop_img/'.$relateShop->img) }}" shop-link="{{ route('shop.show', $relateShop->id)}}"></list-item-component>
            @endforeach
        </ul>
    </div>
@endsection
