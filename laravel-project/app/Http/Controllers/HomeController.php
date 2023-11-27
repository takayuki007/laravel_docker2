<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $relateShops = array();
        $favorites = Favorite::where('user_id', Auth::id())->latest()->get();
        if(!empty($favorites)){
            foreach ($favorites as $key => $favorite){
                $relateShops[] = Shop::where('id', $favorite->shop_id)->first();
            }
            return view('home')->with(['relateShops'=>$relateShops]);
        }else{
            return view('home');
        }
    }

    public function delete()
    {
        User::find(Auth::id())->delete();

        return redirect('login');
    }

}
