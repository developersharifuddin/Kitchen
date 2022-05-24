@extends('layouts.app')

@section('title', 'Slider || admin controller')
@push('.css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            <a href="{{ route('slider.create') }}" class="btn btn-primary">Add New</a>
              <div class="card">
                 <div class="card-header card-header-primary">
                    <h4 class="card-title ">All Slider</h4>
                  </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" >
                      <thead class=" text-primary">
                        <th> SL  </th>
                        <th> Title </th>
                        <th> Sub title </th>
                        <th> Images </th>
                        <th> Action </th>
                      </thead>
                      <tbody>
                      
                      @foreach($sliders as $key => $slider)
                        <tr>
                           <td> {{$key+1}} </td>
                          <td>{{$slider->title}} </td>
                          <td>  {{$slider->sub_title}} </td>
                          <td>
                          <img src="{{ asset('uploads/slider/'.$slider->image)}}" alt="" width="70px" height="70px"
                         class="margin-auto"> </td>

                                <td class="td-actions text-left">
                              
                                  <a href="{{ route('slider.edit',$slider->id)}}" style="float:left">
                                  <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons">edit</i>
                                  </button></a>
  
                                  <!-- <form action="{{ route('slider.destroy',$slider->id)}}" method="post" style="float:left; margin-left:10px">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                  <i class="material-icons">close</i>
                                   </button>
                                   </form> -->

                                   <form id="delete-form-{{$slider->id}}" action="{{route('slider.destroy', $slider->id)}}" 
                                   method="post" style="display:none">
                                   @csrf
                                   @method('DELETE')
                                   </form>
                                   <button type="submit" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm mx-3" onclick="if(
                                     confirm('are you sure to delete this?')){
                                       event.preventDefault();
                                       document.getElementById('delete-form-{{$slider->id}}').submit();
                                     }else{
                                       event.preventDefault();
                                     }"> Delete
                                   </button>






                                  <a href="{{ route('slider.show',$slider->id)}}" style="float:left;display:none" style="margin-left:20px">
                                  <button type="button" rel="tooltip" title="view" class="btn btn-primary btn-link btn-sm">
                                  <i class="material-icons"></i>view
                                  </button></a>
                                  
                                </td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('js')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@endpush