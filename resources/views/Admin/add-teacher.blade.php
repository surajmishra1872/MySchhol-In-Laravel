
@extends('layouts.adminapp')
@section('title', 'Add Teacher')
@section('AdminContent')<!-- Small boxes (Stat box) -->
<div class="row">

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Add Teacher</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('admin/store-teacher')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputText1">Teacher name</label>
                <input type="text" name="teacher_name" class="form-control" id="exampleInputText1" placeholder="Enter teacher name">
              </div>
              <div class="form-group">
                <label for="exampleInputDesc1">Teacher subject</label>
                <input type="text" class="form-control" name="teacher_subject" id="exampleInputDesc1" rows="3" placeholder="Enter teacher subject">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher facebookID </label>
                <input type="text" class="form-control" name="teacher_facebook" id="exampleInputDesc1" rows="3" placeholder="Enter teacher facebook ID (not mandatory)">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher instagramID</label>
                <input type="text" class="form-control" name="teacher_instagram" id="exampleInputDesc1"  placeholder="Enter teacher instagram ID (not mandatory)">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher twitterID</label>
                <input type="text" class="form-control" name="teacher_twitter" id="exampleInputDesc1" rows="3" placeholder="Enter teacher teacher ID (not mandatory)">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher mobile no.</label>
                <input type="text" class="form-control" name="teacher_mobile" id="exampleInputDesc1" rows="3" placeholder="Enter teacher mobile number">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher whatsapp no.</label>
                <input type="text" class="form-control" name="teacher_whatsapp" id="exampleInputDesc1" rows="3" placeholder="Enter teacher whatsapp number (not mandatory)">
              </div>

              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="teacher_image" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @error('teacher_image')
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
  
  </div>
  <!-- /.row (main row) -->
 @endsection