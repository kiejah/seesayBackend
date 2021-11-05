<?php

namespace App\Http\Controllers;


use App\Models\TipCategory;
use App\Models\County;
use App\Models\Tip;
use Illuminate\Http\Request;

class CountiesController extends Controller
{
    //
    public $categories,$counties;
    public function __construct(){
            $this->counties = County::all();
            $this->categories = TipCategory::all();
    }
    public function index()
    {
        //
        return view('county.index',['categories'=>$this->categories,'counties'=>$this->counties]);

    
    }
    

}
