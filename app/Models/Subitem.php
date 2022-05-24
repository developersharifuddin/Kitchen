<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Item;

class Subitem extends Model
{
    use HasFactory;

        public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }

    //    public function category()
    // {
    //     return $this->belongsTo('App\Models\Category');
    // }

    
    public function category() 
    {
     //return $this->hasMany('App\Models\Subitem');
     return $this->belongsTo(Item::class);
    }
}
