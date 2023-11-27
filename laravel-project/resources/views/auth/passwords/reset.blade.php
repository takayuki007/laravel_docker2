@extends('layouts.app')

@section('title', 'パスワードリセット')
@section('description', 'パスワードリセットページです。')
@section('keywords', 'パスワードリセット ページ,PC買取,ピーシー買取')


@section('content')
    <div class="p-site-width">
        <form action="" class="p-form" method="post">
            @csrf
            <h1 class="c-title">パスワードリセット</h1>
            <input type="hidden" name="token" value="{{ $token }}">

            <p class="c-text">メールアドレス</p>
            <input type="email" name="email" class="c-input" value="" placeholder="email">

            @error('email')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            <p class="c-text">パスワード</p>
            <input type="password" name="password" class="c-input" value="" placeholder="password">

            @error('password')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            <p class="c-text">パスワード再入力</p>
            <input type="password" name="password_confirmation" class="c-input" value="" placeholder="confirm password">

            @error('password_confirmation')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            <input type="submit" class="c-btn" value="リセット">
        </form>
    </div>
@endsection
