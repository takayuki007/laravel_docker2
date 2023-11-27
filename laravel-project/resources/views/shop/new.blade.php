@extends('layouts.app')

@section('title', '店舗登録ページ')
@section('description', '店舗登録ページです。')
@section('keywords', '店舗登録ページ,PC買取,ピーシー買取')

@section('content')
    <div class="p-site-width">
        <form action="{{ route('shop.store')}}" class="p-form" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="c-title">店舗登録ページ</h1>
            <p class="c-text">店舗名</p>
            <input type="text" name="shopName" class="c-input" value="{{ old('shopName') }}" placeholder="PC買取名古屋店">

            @error('shopName')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>

            <p class="c-text">画像登録</p>
            <input type="file" name="img" class="c-file">

            @error('img')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>


            <p class="c-text">TEL</p>
            <input type="text" name="tel" class="c-input" value="{{ old('tel') }}" placeholder="03-0000-0000">

            @error('tel')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>

            <p class="c-text">営業時間</p>
            <select name="open_time" id="" class="c-select">
                <option value="" class="c-option">選択してください</option>
                @foreach($times as $time)
                    <option value="{{ $time->id }}" class="c-option" @if(old('open_time')== $time->id) selected  @endif>{{ $time->time }}</option>
                @endforeach
            </select>
            <span class="c-text">~</span>
            <select name="close_time" id="" class="c-select">
                <option value="" class="c-option">選択してください</option>
                @foreach($times as $time)
                    <option value="{{ $time->id }}" class="c-option" @if(old('close_time')== $time->id) selected  @endif>{{ $time->time }}</option>
                @endforeach
            </select>

            @error('open_time')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            @error('close_time')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>

            <p class="c-text">定休日</p>
            <input type="text" name="regular_holiday" class="c-input" value="{{ old('regular_holiday') }}" placeholder="毎週水曜日">

            @error('regular_holiday')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>


            <p class="c-text">所在地</p>
            <input type="text" name="location" class="c-input" value="{{ old('location') }}" placeholder="東京都港区南青山1-1">

            @error('location')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>


            <p class="c-text">アクセス</p>
            <input type="text" name="access" class="c-input" value="{{ old('access') }}" placeholder="各線南青山一丁目駅から徒歩10分">

            @error('access')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>

            <p class="c-text">検索項目設定</p>
            <p class="c-text">地域設定</p>
            <select name="area" id="" class="c-select">
                <option value="" class="c-option">選択してください</option>
                @foreach($areas as $area)
                    <option value="{{ $area->id }}" class="c-option" @if(old('area')== $area->id) selected  @endif>{{ $area->name }}</option>
                @endforeach
            </select>

            @error('area')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>

            <p class="c-text">OS</p>
            <select name="os" id="" class="c-select">
                <option value="" class="c-option">選択してください</option>
                @foreach($oss as $os)
                    <option value="{{ $os->id }}" class="c-option" @if(old('os')== $os->id) selected  @endif>{{ $os->name }}</option>
                @endforeach
            </select>

            @error('os')
            <span class="c-invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div style="margin-bottom: 32px"></div>

            <input type="submit" class="c-btn" value="登録">
        </form>
    </div>
@endsection
