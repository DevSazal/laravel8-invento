<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
}
