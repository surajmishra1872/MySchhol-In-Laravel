
@extends('layouts.adminapp')
@section('title', 'Edit Facilities')
@section('AdminContent')<!-- Small boxes (Stat box) -->
<div class="row">

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Facilities</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('admin/update-facilities/'.$edit_fac_data->facilities_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputText1">Title</label>
                <input type="text" name="facilities_heading" value="{{$edit_fac_data->facilities_heading ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter facility title">
              </div>
              <div class="form-group">
                <label for="exampleInputDesc1">Description</label>
                <textarea class="form-control" name="facilities_text" id="exampleInputDesc1" rows="3" placeholder="Please enter facility description">
                {{$edit_fac_data->facilities_text ?? ''}}
                </textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" name="feature_image" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose New Image</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
                @error('feature_image')
                <p class="text-danger">{{$message}}</p>   
               @enderror
              </div>
              <img src="{{asset("facilities/".$edit_fac_data->feature_image ?? '')}}" alt="N/F" id="previewImg"  width="150px" height="70px"/>
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