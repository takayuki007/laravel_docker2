@extends('layouts.app')

@section('title', '店舗掲載について')
@section('description', '店舗掲載についてのページです。')
@section('keywords', '店舗掲載についてのページ,PC買取,ピーシー買取')

@section('content')
    <div class="p-site-width">
        <div class="p-wrapper">
            <h1 class="c-title">店舗掲載について</h1>
            <div class="c-text-display">
                <p class="c-text">
                    店舗関係者のみなさまへ<br>
                    <br>
                    この度は、本サイトにお越しいただきありがとうございます。<br>
                    本サイトは、地域のPC買取店を掲載しているキュレーションサイトです。<br>
                    本サイトに訪れるユーザー様に、お近くのPC買取店の情報をご案内し、地域のPC買取店を応援させていただいております。<br>
                    掲載をご希望される店舗関係者様は、お問合せよりご連絡ください。<br>
                    別途ご案内させていただきます。<br>
                    <br>
                    <br>
                    <a href="{{ route('contact.show')}}" class="c-a">お問合せはこちら</a>
                </p>
            </div>
        </div>

    </div>
@endsection
