<?php

namespace App\Http\Controllers;

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

    public function main()
    {
        try {
            $userinfo = Auth::user()->userinfo ? Auth::user()->userinfo : null;
        }
        catch (\Exception $e){
            $userinfo = null;
        }
        return view('main')->with('data', $userinfo);
    }
}
