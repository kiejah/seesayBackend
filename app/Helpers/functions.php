<?php
use App\Models\Tip;
use App\Models\TipCategory;

function getCatCount($county_id,$cat_id){
    
    $count= Tip::where('county_name',$county_id)
                    ->where('tip_cat_id',$cat_id)
                    ->count();
    return $count;
}

