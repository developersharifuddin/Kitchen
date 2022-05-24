<?php

namespace App\Http\Controllers\Admin;
 
use App\Models\Category;
use App\Models\Subscategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subscategories = Subscategory::select('subscategories.*', 'categories.name')
        ->leftJoin('categories', 'subscategories.category_id', 'categories.id')->get();

        return view('admin.sub_category.index', compact('categories', 'subscategories'));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         $categories = Category::all();
         return view('admin.sub_category.create', compact('categories'));
          
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
            'subcategory_name' => 'required'
             
        ]);
         
        $subcategory_slug = str_slug($request->subcategory_name);
        $sub_category = new Subscategory();
        $sub_category->category_id = $request->category_id;

        $sub_category->subcategory_name = $request->subcategory_name;
        $sub_category->subcategory_slug = $subcategory_slug;

        $sub_category->save();
        return redirect()->route('sub_category.index');
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

        return view('admin/sub_category.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscategory::find($id)->delete();
        return redirect()->route('sub_category.index');
    }
}
