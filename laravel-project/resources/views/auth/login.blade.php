@extends('layouts.app')

@section('title', 'ログイン')
@section('description', 'ログインページです。')
@section('keywords', 'ログインページ,PC買取,ピーシー買取')

@section('content')
    <div class="p-site-width">
        <form method="POST" action="{{ route('login') }}" class="p-form">
            @csrf
            <h1 class="c-title">ログイン</h1>
            <p class="c-text">メールアドレス</p>
            <input type="email" class="c-input" name="email" value="{{ old('email') }}" placeholder="email">

            @error('email')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin: 28px"></div>


            <p class="c-text">パスワード</p>
            <input type="password" class="c-input" name="password" placeholder="password">

            @error('password')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin: 28px"></div>

            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">自動でログイン</label>

            <div style="margin: 28px"></div>

            <input type="submit" class="c-btn" value="ログイン">

            <div style="margin: 40px"></div>
            @if (Route::has('password.request'))
                <a class="c-a" href="{{ route('password.request') }}">
                    パスワード忘れはこちら
                </a>
            @endif

        </form>
    </div>
@endsection
