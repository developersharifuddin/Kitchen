<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Aboutus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class AboutusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts =Aboutus::all();
        return view('admin.about.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'logo' => 'required',
            'image' => 'required'
        ]);

        $logo = $request->file('logo');
        $slug = str_slug($request->title);

        if (isset($logo)) {
            $currentDate = Carbon::now()->toDateString();
            $logoname = $slug.'-logo-'.$currentDate.'-'.'.'.$logo->getClientOriginalExtension();
            if (!file_exists('uploads/about')) {
                mkdir('uploads/about',077, true);
             }
            $logo->move('uploads/about', $logoname );
        }else {
           $logoname = 'defaultlogo.png';
        }



        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();
            if (!file_exists('uploads/about')) {
                mkdir('uploads/about',077, true);
             }
            $image->move('uploads/about', $imagename );
        }else {
           $imagename = 'default.png';
        }
 
        $about = new Aboutus();
        $about->title = $request->title;
        $about->body = $request->body;
        $about->logo = $logoname;
        $about->image = $imagename;
       
        $about->save();
        return redirect()->route('about.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $about = Aboutus::find($id);
       return view('admin.about.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                 $validated = $request->validate([
            'title' => 'required',
            'body' => 'required'
           
        ]);

        $about = Aboutus::find($id);
        $logo = $request->file('logo');
        $slug = str_slug($request->title);

        if (isset($logo)) {
            $currentDate = Carbon::now()->toDateString();
            $logoname = $slug.'-logo-'.$currentDate.'-'.'.'.$logo->getClientOriginalExtension();
            if (!file_exists('uploads/about')) {
                mkdir('uploads/about',077, true);
             }
               $destination ='uploads/about/'.$logoname;
             if (File::exists($destination)){
            File::delete($destination);
             }
            $logo->move('uploads/about', $logoname );
        }else {
           $logoname = 'defaultlogo.png';
        }



        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();

             $destination ='uploads/about/'.$request->image;
             if (File::exists($destination)){
             File::delete($destination);
             }
            $image->move('uploads/about', $imagename );
        }else {
           $imagename = 'default.png';
        }
        
        $about->title = $request->title;
        $about->body = $request->body;
        $about->logo = $logoname;
        $about->image = $imagename;
       
        $about->save();
        return redirect()->route('about.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $about = Aboutus::find($id);
            

            if (file_exists('uploads/slider/'.$about->logo)) {
               unlink('uploads/slider/'.$about->logo);
            }
            
            if (file_exists('uploads/slider/'.$about->image)) {
               unlink('uploads/slider/'.$about->image);
            }
            $about->delete();
            return redirect()->route('about.index');
    }
}
