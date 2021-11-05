<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;
use App\Models\TipCategory;

class GeneralController extends Controller
{
    //
    public $tipCats,$counties;
    public function __construct() {
        $this->counties = County::all();
        $this->tipCats = TipCategory::all();
    }
    public function index(Request $request)
    {
        //check url and permit
         $response = [
            'tip_categories'=>$this->tipCats, 
            'counties'=>$this->counties 
         ];
        return response($response,201);
    }
    public function getCountyData(){
       
        $all_counties= array();

        foreach($this->counties as $county){
            $all_counties[] = [$county->countyName=>$this->countyDataGen($county->id)];
        }

         $data= response($all_counties);
        return $data;

        }
          

    function countyDataGen($county_id){
        $county_data= array();
        foreach ($this->tipCats as $cat){
            $county_data[] = [$cat->category_name => getCatCount($county_id,$cat->id)];

        }

        return $county_data;
        
    }
}
