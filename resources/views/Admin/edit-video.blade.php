
@extends('layouts.adminapp')
@section('title', 'Edit Video')
@section('AdminContent')<!-- Small boxes (Stat box) -->
<div class="row">

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Video Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('admin/update-video/'.$edit_video_data->video_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputText1">Video Name</label>
                <input type="text" name="video_name" value="{{$edit_video_data->video_name ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter video name">
              </div>

              <div class="form-group">
                <label for="exampleInputText1">Video Link</label>
                <input type="text" name="video_url" value="{{$edit_video_data->video_url ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter video url">
              </div>
            </div>
            <!-- /.card-body -->
    
            <div class="card-footer">
                
              <button type="submit" class="btn btn-primary">UPDATE</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div>
  
  </div>
  <!-- /.row (main row) -->
 @endsection