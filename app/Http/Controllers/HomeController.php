<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Zone;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	$sucuri = DB::table('sucuri_user')->count();
	$reseller = DB::table('brandings')->count();
    //$user = DB::select('select * from student_details');
    $ided=auth()->user()->id;
       

        // echo auth()->user()->createToken('My Token')->accessToken;

        return view('home', ['sucuri'=>$sucuri, 'reseller'=>$reseller, 'user'=>$ided]);
    }
}
