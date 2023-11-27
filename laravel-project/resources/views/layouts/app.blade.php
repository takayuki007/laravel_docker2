<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','TOP') | PC買取</title>
    <meta name="description" content="@yield('description','PC買取は、PCを売りたい人のための買取情報記載の掲示板です。お住まいの地域の買取店舗を検索いただけます。')">
    <meta name="keywords" content="@yield('keywords', 'PC買取')">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!--全体を包む-->
<div id="app" class="l-wrapper">
    <!--ヘッダー始まり-->
    <header class="l-header">
        <div class="l-logo-wrapper">
            <p class="l-logo"><a href="{{ route('top.show')}}" class="l-a">PC買取MAX</a></p>
            <p class="l-logo u-sp-display"><a href="{{ route('top.show')}}#what" class="l-a">PC買取MAXとは</a></p>
            <p class="l-logo u-sp-display"><a href="{{ route('info.show')}}" class="l-a">店舗掲載について</a></p>
        </div>
        <ul class="l-ul">
            @guest
                <li class="l-li">
                    <a href="{{ route('login')}}" class="l-a">ログイン</a>
                </li>
                <li class="l-li">
                    <a href="{{ route('register')}}" class="l-a">ユーザー登録</a>
                </li>
            @else
                <li class="l-li">
                    <a href="{{ route('home')}}" class="l-a">マイページ</a>
                </li>
                <li class="l-li">
                    <a href="{{ route('logout') }}" class="l-a" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">ログアウト</a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
        </ul>
    </header>
    <!--ヘッダー終わり-->
    <!--メイン始まり-->
    <main class="l-main">
        @yield('content')
    </main>
    <!--メイン終わり-->
    <!--フッター始まり-->
    <footer class="l-footer">
        <div class="l-footer-wrap">
            <p class="l-footer-logo"><a href="{{ route('top.show')}}" class="l-a">PC買取MAX</a></p>
            <ul class="l-footer-ul">
                <li class="l-footer-li">
                    <a href="{{ route('info.show')}}" class="l-a">店舗掲載について</a>
                </li>
                <li class="l-footer-li">
                    <a href="{{ route('rule.show')}}" class="l-a">利用規約</a>
                </li>
                <li class="l-footer-li">
                    <a href="{{ route('privacy.show')}}" class="l-a">プライバシーポリシー</a>
                </li>
                <li class="l-footer-li">
                    <a href="{{ route('transaction.show')}}" class="l-a">特定商取引法に基づく表記</a>
                </li>
                <li class="l-footer-li">
                    <a href="{{ route('contact.show')}}" class="l-a">お問合せ</a>
                </li>
            </ul>
        </div>
        <p class="l-text">Copyright © PC買取MAX. All Rights Reserved</p>
    </footer>
    <!--フッター終わり-->
</div>
<!--全体を包む終わり-->
</body>
</html>
