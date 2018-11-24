<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\Userinfo;
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
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function getUserInfo() {
        try {
            $userinfo = \Auth::user()->userinfo ? \Auth::user()->userinfo : null;
        }
        catch (\Exception $e){
            $userinfo = null;
        }
        return $userinfo;
    }

    public function main()
    {
        $data = $this->getUserInfo();
        return view('main')->with('data', $data);
    }

    public function info($id) {
        $product = Product::find($id);
        $data = $this->getUserInfo();

        return view('layouts.product_info')
            ->with('product', $product)
            ->with('data', $data);
    }
}
