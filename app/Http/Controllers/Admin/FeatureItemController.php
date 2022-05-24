<?php

namespace App\Http\Controllers\Admin;

use App\Models\Feature;
use App\Models\FeatureItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeatureItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feature = Feature::all();
        $featureitems = FeatureItem::all();
      
        return view('admin.featureitem.index', compact('feature', 'featureitems'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $features = Feature::all();
        return view('admin.featureitem.create', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[
            'name' => 'required',
            'feature' => 'required',
            'description' => 'required',
            'price' => 'required'
             
        ]);

        $feature = new FeatureItem();
        $feature->feature_id = $request->feature;
        $feature->feature_name = $request->name;
        $feature->description = $request->description;
        $feature->price = $request->price;
           
        $feature->save();
        return redirect()->route('featureitem.index');
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
        $feature = Feature::all();
        $featureitem = FeatureItem::find($id);
        return view('admin/featureitem.edit', compact('featureitem', 'feature'));
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
        $this->validate($request,[
            'name' => 'required',
            'feature' => 'required',
            'description' => 'required',
            'price' => 'required' 
             
        ]);

         $featureitem = FeatureItem::find($id);
        $featureitem->feature_id = $request->feature;
        $featureitem->feature_name = $request->name;
        $featureitem->description = $request->description;
        $featureitem->price = $request->price;
           
        $featureitem->save();
        return redirect()->route('featureitem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $featureitem = FeatureItem::find($id);
         $featureitem->delete();
        return redirect()->route('featureitem.index');

    }
}
