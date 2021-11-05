<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    use HasFactory;
    protected $table = 'county';
    
    public function tips(){
        return $this->hasMany(Tip::class,'county_name');
    }
}
