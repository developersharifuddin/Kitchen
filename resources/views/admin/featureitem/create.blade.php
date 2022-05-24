@extends('layouts.app')

@section('title', 'featureitem || admin controller')

@section('content')

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">featureitem</h4>
                  <p class="card-category">featureitem</p>
                </div>
                <div class="card-body">

                    <form action="{{route('featureitem.store')}}" method="POST"  enctype="multipart/form-data">
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
                          <label class="bmd-label-floating">feature</label>
 
                            <select class="form-select" name="feature">
                                @foreach($features as $feature)
                                <option value="{{$feature->id}}" class="form-control">{{$feature->name}}</option>
                                 
                                @endforeach
                                    
                            </select>
                        </div>
                      </div>
                       

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">features name</label>
                          <input type="text" name="name" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">features Description</label>
                           <textarea name="description" class="form-control"></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">features Price</label>
                          <input type="text" name="price" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                       
                    </div>
 
                  
                    <button type="submit" class="btn btn-primary pull-right mt-4">Add features</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>
      @endsection