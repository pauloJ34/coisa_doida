<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doujinshi;

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
       
        $query = Doujinshi::all();
        // dd($query);
        return view('home')->with("doujinshi",$query);
    }
}
