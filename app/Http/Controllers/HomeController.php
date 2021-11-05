<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipCategory;
use App\Models\County;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $categories,$counties;
   
    public function __construct()
    {
        $this->counties = County::all();
        $this->categories = TipCategory::all();
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
   

}
