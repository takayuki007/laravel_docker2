<?php

namespace App\Http\Controllers;

use App\Area;
use App\Favorite;
use App\Os;
use App\Shop;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    //店舗登録画面を表示
    public function new()
    {
        $times = Time::get();
        $oss = Os::get();
        $areas = Area::get();
        return view('shop.new')->with(['times'=>$times, 'oss'=>$oss, 'areas'=>$areas]);
    }

    //店舗を登録する。
    public function store(Request $request)
    {
        $request->validate([
            'shopName'=> 'required|string|max:255',
            'img'=> 'required|file|image|mimes:jpeg,jpg,png|max:1000',
            'tel'=> 'required|string|max:255',
            'open_time' => 'required',
            'close_time' => 'required',
            'regular_holiday'=> 'required|string|max:255',
            'location'=> 'required|string|max:255',
            'access'=> 'required|string|max:255',
            'area'=> 'required',
            'os'=> 'required'
        ]);

        $shop = new Shop;

        $shop->name = $request->shopName;
        $path = $request->file('img')->store('public/shop_img');
        $shop->img = basename($path);
        $shop->tel = $request->tel;
        $shop->open_time_id = $request->open_time;
        $shop->close_time_id = $request->close_time;
        $shop->regular_holiday = $request->regular_holiday;
        $shop->location = $request->location;
        $shop->access = $request->access;
        $shop->area_id = $request->area;
        $shop->os_id = $request->os;

        $shop->save();

        $shop = Shop::latest()->first();
        $shop_id = $shop->id;

        return redirect()->route('shop.show',['shop_id'=>$shop_id]);
    }

    //店舗編集画面を表示
    public function edit($id)
    {
        //数字以外ならリダイレクト
        if(!ctype_digit($id)){
            return redirect('top');
        }

        $shop = Shop::where('id', $id)->first();
        $open_time_edit = Time::where('id', $shop->open_time_id)->first();
        $close_time_edit = Time::where('id', $shop->close_time_id)->first();
        $area_name = Area::where('id', $shop->area_id)->first();
        $os_name = Os::where('id', $shop->os_id)->first();
        $times = Time::get();
        $oss = Os::get();
        $areas = Area::get();

        return view('shop.edit')->with(['shop'=>$shop, 'open_time_edit'=>$open_time_edit, 'close_time_edit'=>$close_time_edit, 'area_name'=>$area_name, 'os_name'=>$os_name, 'times'=>$times, 'oss'=>$oss, 'areas'=>$areas]);
    }

    //店舗を更新する。
    public function update(Request $request, $id)
    {
        //数字以外ならリダイレクト
        if(!ctype_digit($id)){
            return redirect('top');
        }

        $request->validate([
            'shopName'=> 'required|string|max:255',
            'img'=> 'file|image|mimes:jpeg,jpg,png|max:1000',
            'tel'=> 'required|string|max:255',
            'open_time' => 'required',
            'close_time' => 'required',
            'regular_holiday'=> 'required|string|max:255',
            'location'=> 'required|string|max:255',
            'access'=> 'required|string|max:255',
            'area'=> 'required',
            'os'=> 'required'
        ]);

        $shop = Shop::where('id', $id)->first();

        $shop->name = $request->shopName;
        if(!empty($request->file('img'))){
            $path = $request->file('img')->store('public/shop_img');
            $shop->img = basename($path);
        }
        $shop->tel = $request->tel;
        $shop->open_time_id = $request->open_time;
        $shop->close_time_id = $request->close_time;
        $shop->regular_holiday = $request->regular_holiday;
        $shop->location = $request->location;
        $shop->access = $request->access;
        $shop->area_id = $request->area;
        $shop->os_id = $request->os;

        $shop->save();

        $shop_id = $shop->id;

        return redirect()->route('shop.show',['shop_id'=>$shop_id]);
    }

    //店舗詳細ページを表示
    public function show($id)
    {
        //数字以外ならリダイレクト
        if(!ctype_digit($id)){
            return redirect('top');
        }

        $shop = Shop::where('id', $id)->first();
        $open_time = Time::where('id', $shop->open_time_id)->first();
        $close_time = Time::where('id', $shop->close_time_id)->first();
        $relateShops = Shop::where('area_id', $shop->area_id)->latest()->orderBy('id','desc')->take(10)->get();
        $favorite = Favorite::where('user_id', Auth::id())->where('shop_id', $shop->id)->count();

        return view('shop.show')->with(['shop'=>$shop, 'open_time'=>$open_time, 'close_time'=>$close_time, 'relateShops'=>$relateShops, 'favorite'=>$favorite]);
    }

    public function favorite($id)
    {
        //数字以外ならリダイレクト
        if(!ctype_digit($id)){
            return redirect('top');
        }

        $user_id = Auth::id();
        $shop = Shop::find($id);
        $shop_id = $shop->id;

        $result = Favorite::where('user_id', $user_id)->where('shop_id', $shop_id)->count();

        if($result === 1){
            Favorite::where('user_id', $user_id)->where('shop_id', $shop_id)->delete();

            return redirect()->route('shop.show',['shop_id'=>$shop_id]);

        }elseif($result === 0){
            $favorite = new Favorite;
            $favorite->user_id = $user_id;
            $favorite->shop_id = $shop_id;

            $favorite->save();

            return redirect()->route('shop.show',['shop_id'=>$shop_id]);
        }
    }
}
