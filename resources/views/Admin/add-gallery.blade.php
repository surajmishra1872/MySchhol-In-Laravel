@extends('layouts.adminapp')
@section('title', 'Add Gallery Image')
@section('AdminContent')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Gallery Image</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{url('admin/store-gallery')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <input type="text" value="{{$id}}" hidden name="album_id">
            <label for="exampleInputText1">Image Text</label>
            <input type="text" name="img_text" class="form-control" id="exampleInputText1" placeholder="Please enter gallery name">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="img_image" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
            @error('img_image')
            <p class="text-danger">{{$message}}</p>   
           @enderror
          </div>
          <img src="#" id="previewImg" alt="imagepreview" hidden width="150px" height="70px"/>
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