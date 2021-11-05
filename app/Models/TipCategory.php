<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipCategory extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_name'
    ];
    public function tips(){
        return $this->hasMany(Tip::class,'tip_cat_id');
    }
}
