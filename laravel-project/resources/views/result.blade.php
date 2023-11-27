@extends('layouts.app')

@section('title', '検索結果')
@section('description', '検索結果ページです。')
@section('keywords', '検索結果ページ,PC買取,ピーシー買取')

@section('content')
    <div class="p-site-width">
        <form class="p-form" method="post" action="{{ route('top.search')}}">
            @csrf
            <h1 class="c-info-title">買取店舗情報</h1>
            <div class="p-search-area">
                <table class="c-table">
                    <tr class="c-tr">
                        <th class="c-th">エリア</th>
                        <td class="c-td">
                            <select name="area" class="c-search-select">
                                <option value="0" class="c-search-option">選択してください。</option>
                                @foreach($areas as $area)
                                    <option value="{{ $area->id }}" class="c-search-option" @if(old('area')== $area->id) selected  @endif>{{ $area->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr class="c-tr">
                        <th class="c-th">OS</th>
                        <td class="c-td">
                            <select name="os" class="c-search-select">
                                <option value="0" class="c-search-option">選択してください。</option>
                                @foreach($oss as $os)
                                    <option value="{{ $os->id }}" class="c-search-option" @if(old('os')== $os->id) selected  @endif>{{ $os->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                </table>
                <input type="submit" class="c-btn" value="検索">
            </div>
        </form>

        <div class="p-count-area">
            <span class="c-text">{{ $relateShops->total() }}件の買取店があります。</span><span class="c-text">{{ $relateShops->total() }}件中　{{ $relateShops->firstItem() }}ー{{ $relateShops->lastItem() }}件を表示</span>
        </div>

        <ul class="u-ul">
            <h1 class="c-info-title">買取店候補一覧</h1>
            @foreach($relateShops as $relateShop)
                <list-item-component :name="{{ json_encode($relateShop->name) }}" img="{{ asset('/storage/shop_img/'.$relateShop->img) }}" shop-link="{{ route('shop.show', $relateShop->id)}}"></list-item-component>
            @endforeach
        </ul>

        {{ $relateShops->links('pagination::default') }}

    </div>

@endsection
