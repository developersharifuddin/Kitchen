<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Slider;
use App\Models\Aboutus;
use App\Models\Category;
use App\Mail\Contactmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
   public function contuct(){
        $sliders = Slider::all();
         $abouts = Aboutus::all();
         $categorys = Category::all();
         $items = Item::all();
         return view('welcome', compact('sliders','abouts', 'categorys','items'));
 
   }

public function sendEmail(Request $request)
{
    $details = [
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message
    ];

     Mail::to('sharif.uddin.9977@gmail.com')->send(new Contactmail($details));
     Toastr::success('Your Message Submit Successfully', 'success', ["positionClass" => "toast-top-right"]);
     return redirect()->back();
}


}
