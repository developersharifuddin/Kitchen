@extends('layouts.app')

@section('title', 'categories || admin controller')

@section('content')

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">categories</h4>
                  <p class="card-category">categories</p>
                </div>
                <div class="card-body">

                    <form action="{{route('sub_category.store')}}" method="POST"  enctype="multipart/form-data">
                       @csrf

                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <div class="row mt-4">
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">category_name</label>
 
                            <select class="form-select" name="category_id">
                              <option selected>category_name</option>
                               @foreach($categories as $categorie)
                                <option value="{{$categorie->id}}" class="form-control">{{$categorie->name}}</option>
                                 
                                @endforeach
                                    
                            </select>
                        </div>
                      </div>
                       

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub_category name</label>
                          <input type="text" name="subcategory_name" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                      <div class="col-md-12 mt-5">
                          <label class="bmd-label-floating">Sub_category images</label>
                          <input type="file" name="subcategory_image" class="form-control">
                      
                      </div>
                      
                    </div>
 
                  
                    <button type="submit" class="btn btn-primary pull-right mt-4">Add category</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>
      @endsection