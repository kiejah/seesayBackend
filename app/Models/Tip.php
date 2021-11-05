<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tip extends Model
{
    use HasFactory;
    protected $fillable=[
        'tip_cat_id',
        'county_name',
        'location_name',
        'tipdesc',
        'user_id'
    ];
    public function category(){
        return $this->belongsTo(TipCategory::class,'tip_cat_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function county(){
        return $this->belongsTo(County::class,'county_name');
    }

}
