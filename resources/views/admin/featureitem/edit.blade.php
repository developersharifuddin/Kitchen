@extends('layouts.app')

@section('title', 'feature || admin controller')

@section('content')

      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">featureitems update</h4>
                  <p class="card-category">featureitems update</p>
                </div>
                <div class="card-body">

                    <form action="{{route('featureitem.update',$featureitem->id)}}" method="POST"  enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                       @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <div class="row">
                      

                       <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">featureitems_name</label>
 
                            <select class="form-select" name="feature">
                               @foreach($feature as $item)
                               <option value="{{$item->id}}" class="form-control">{{$item->name}}</option>             
                                @endforeach
                            </select>
                        </div>
                      </div>
                       
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">featureitems name</label>
                          <input type="text" name="name" value="{{ $featureitem->feature_name}}" class="form-control">
                        </div>
                      </div>

 
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Description</label>
                           <textarea name="description" class="form-control">{{ $featureitem->description}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating"> Price</label>
                          <input type="text" name="price" value="{{ $featureitem->price}}" class="form-control">
                        </div>
                      </div>
                      
                    </div>
                      
                    </div>
                
                    <button type="submit" class="btn btn-primary pull-right mt-4">update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
   
          </div>
        </div>
      </div>
      @endsection