<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\ProductCode;

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

    public function warranty_check(Request $request) {
        $product_code = $request->post('product_code');

        $code = ProductCode::findIdByCode($product_code);

        if ($code) {
            if ($code->warranty) {
                $data = "Sản phẩm: ".$code->warranty->product->product->name." - "."Thời hạn bảo hành từ: ".$code->warranty->from." đến: ".$code->warranty->to;
            }
            else {
                $data = "Không có thông tin BH";
            }
        } else {
            $data = "Không có thông tin SP";
        }

        return $data;
    }

    public function info($id) {
        $product = Product::find($id);
        $data = $this->getUserInfo();

        return view('layouts.product_info')
            ->with('product', $product)
            ->with('data', $data);
    }
}
