<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use App\Model\ProductCode;
use Illuminate\Support\Facades\DB;

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

    public function main(Request $request)
    {
        $category = $request->get('category');
        $name = $request->get('name');
        $price_from = $request->get('price_from');
        $price_to = $request->get('price_to');

        $data = $this->getUserInfo();
        $product = Product::select();

        if ($category)
            $product = $product->where('category_id', '=', $category);

        if ($name)
            $product = $product->where('name', 'like', '%'.$name.'%');

        if ($price_from)
            $product = $product->where('price', '>=', $price_from);

        if ($price_to)
            $product = $product->where('price', '<=', $price_to);

        $product = $product->paginate(9);

        return view('main')
            ->with('product', $product)
            ->with('link', $product->appends(request()->input())->links())
            ->with('data', $data);
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
