@extends('layouts.app')

@section('title', 'パスワードリセット')
@section('description', 'パスワードリセットページです。')
@section('keywords', 'パスワードリセット ページ,PC買取,ピーシー買取')


@section('content')
    <div class="p-site-width">
        <form action="{{ route('password.email') }}" class="p-form" method="post">
            @csrf
            <h1 class="c-title">パスワードリセット</h1>
            <p class="c-text">メールアドレス</p>
            <input type="email" name="email" class="c-input" value="" placeholder="email">

            @error('email')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror


            @if (session('status'))
                <div class="alert c-alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div style="margin: 28px"></div>

            <input type="submit" class="c-btn" value="キーを発行する">
        </form>
    </div>
@endsection
