@extends('layouts.app')

@section('title', '退会')
@section('description', '退会ページです。')
@section('keywords', '退会ページ,PC買取,ピーシー買取')

@section('content')
    <div class="p-site-width">
        <form action="{{ route('home.delete')}}" class="p-form" method="post">
            @csrf
            <h1 class="c-title">退会</h1>
            <br>
            <br>
            <br>
            <br>
            <input type="submit" class="c-btn" value="退会">
        </form>
    </div>
@endsection
