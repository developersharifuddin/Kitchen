<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function items()
    {
     return $this->hasMany('App\Models\Item');
    }

   public function subitem()
    {
     return $this->hasMany('App\Models\Subitem');
    }

    public function Subscategorys()
    {
     return $this->hasMany('App\Models\Subscategory');
    }
}
