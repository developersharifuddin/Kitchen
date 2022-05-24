<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureItem extends Model
{
    use HasFactory;

    public function feature()
    {
        return $this->belongsTo('App\Models\Feature');
    }
}
