@extends('layouts.adminapp')
@section('title', 'Add Video')
@section('AdminContent')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Video</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{url('admin/store-video')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputText1">Video Name</label>
            <input type="text" name="video_name" class="form-control" id="exampleInputText1" placeholder="Please enter video name">
          </div>

          <div class="form-group">
            <label for="exampleInputText1">Video Link</label>
            <input type="text" name="video_url" class="form-control" id="exampleInputText1" placeholder="Please enter video link">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
  </div>
  @endsection