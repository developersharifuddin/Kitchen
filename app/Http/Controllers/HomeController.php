<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Slider;
use App\Models\Aboutus;
use App\Models\Category;
use App\Models\Feature;
use App\Models\FeatureItem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     
    public function index()
    {
         $sliders = Slider::all();
         $abouts = Aboutus::all();
         $categorys = Category::all();
         $items = Item::all();
         $features = Feature::all();
         $featureItem = FeatureItem::all();
         return view('welcome', compact('sliders','abouts', 'categorys','items', 'features', 'featureItem'));
    }
}
