@extends('layouts.app')

@section('title', 'ユーザー登録')
@section('description', 'ユーザー登録ページです。')
@section('keywords', 'ユーザー登録ページ,PC買取,ピーシー買取')

@section('content')
    <div class="p-site-width">
        <form method="POST" action="{{ route('register') }}" class="p-form">
            @csrf
            <h1 class="c-title">ユーザー登録</h1>

            <p class="c-text">ユーザー名</p>
            <input type="text" class="c-input" name="name" value="{{ old('name') }}" placeholder="ユーザー名">

            @error('name')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>


            <p class="c-text">メールアドレス</p>
            <input type="email" class="c-input" name="email" value="{{ old('email') }}" placeholder="メールアドレス">

            @error('email')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>


            <p class="c-text">パスワード</p>
            <input type="password" class="c-input" name="password" placeholder="パスワード">

            @error('password')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>


            <p class="c-text">パスワード再入力</p>
            <input type="password" class="c-input" name="password_confirmation" placeholder="パスワード再入力">

            <p class="c-text"><a href="{{ route('rule.show')}}" class="c-a">利用規約</a>に同意して登録する。</p>

            <div style="margin-bottom: 32px"></div>

            <input type="submit" class="c-btn" value="登録">

        </form>
    </div>
@endsection
