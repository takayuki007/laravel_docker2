@extends('layouts.app')

@section('title', 'お問合せ')
@section('description', 'お問合せページです。')
@section('keywords', 'お問合せページ,PC買取,ピーシー買取')

@section('content')
    <div class="p-site-width">
        @csrf
        <form action="" class="p-form" method="post">
            <h1 class="c-title">お問合せ</h1>
            <p class="c-text">Email</p>
            <input type="text" name="email" class="c-input" value="" placeholder="email">

            @error('email')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <p class="c-text">お問合せ</p>
            <textarea name="contact" id="" cols="30" rows="10" class="c-textarea" placeholder="contact"></textarea>

            @error('contact')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <input type="submit" class="c-btn" value="送信">
        </form>

    </div>
@endsection
