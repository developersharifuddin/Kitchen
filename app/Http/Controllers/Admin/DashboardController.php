<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FeatureItem;
use App\Models\Item;
use App\Models\Reservation;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    public function index()
    {   
        $user = User::count();
        $sliders = Slider::all();
        $countSlider = Slider::count();
        $item = Item::count();
        $featureItem = FeatureItem::count();
        $reservation = Reservation::count();
        $reservationpending = Reservation::where('status', false)->count();
        $reservationconfirmed = Reservation::where('status', true)->count();
        return view('admin.dashboard', compact('sliders', 'countSlider', 'user','item', 'featureItem', 'reservation', 'reservationpending', 'reservationconfirmed'));

    //    $blogs = Blog::all();
    //     //$blogs = Blog::where('compleated', false)->get();
    //     $blogs2 = Blog::where('compleated', true)->get();
    //     $blogs3 = Blog::where('compleated', false)->count();
    //     $blogs4 = Blog::where('compleated', true)->count();
    //     $blogs5 = Blog::all()->count();
    //     return view('blogs.index', compact('blogs', 'blogs2', 'blogs3','blogs4','blogs5'));
    }
}
