
@extends('layouts.adminapp')
@section('title', 'Add Teacher')
@section('AdminContent')<!-- Small boxes (Stat box) -->
<div class="row">

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Teacher</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('admin/update-teacher/'.$edit_teach_data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputText1">Teacher name</label>
                <input type="text" name="teacher_name" value="{{$edit_teach_data->teacher_name ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Enter teacher name">
              </div>
              <div class="form-group">
                <label for="exampleInputDesc1">Teacher subject</label>
                <input type="text" class="form-control" value="{{$edit_teach_data->teacher_subject ?? ''}}" name="teacher_subject" id="exampleInputDesc1" rows="3" placeholder="Enter teacher subject">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher facebookID </label>
                <input type="text" class="form-control" value="{{$edit_teach_data->teacher_facebook ?? ''}}" name="teacher_facebook" id="exampleInputDesc1" rows="3" placeholder="Enter teacher facebook ID (not mandatory)">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher instagramID</label>
                <input type="text" class="form-control" value="{{$edit_teach_data->teacher_instagram ?? ''}}" name="teacher_instagram" id="exampleInputDesc1"  placeholder="Enter teacher instagram ID (not mandatory)">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher twitterID</label>
                <input type="text" class="form-control" value="{{$edit_teach_data->teacher_twitter ?? ''}}" name="teacher_twitter" id="exampleInputDesc1" rows="3" placeholder="Enter teacher teacher ID (not mandatory)">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher mobile no.</label>
                <input type="text" class="form-control" value="{{$edit_teach_data->teacher_mobile ?? ''}}" name="teacher_mobile" id="exampleInputDesc1" rows="3" placeholder="Enter teacher mobile number">
              </div>

              <div class="form-group">
                <label for="exampleInputDesc1">Teacher whatsapp no.</label>
                <input type="text" class="form-control" value="{{$edit_teach_data->teacher_whatsapp ?? ''}}" name="teacher_whatsapp" id="exampleInputDesc1" rows="3" placeholder="Enter teacher whatsapp number (not mandatory)">
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
              <img src="{{asset("Teachers/".$edit_teach_data->teacher_image ?? '')}}" id="previewImg" alt="N/F" width="150px" height="70px"/>
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