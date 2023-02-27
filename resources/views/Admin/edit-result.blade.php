@extends('layouts.adminapp')
@section('title', 'Edit Result')
@section('AdminContent')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Result</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{url('admin/update-result/'.$edit_result_data->result_id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputText1">Student Name</label>
            <input type="text" name="student_name" value="{{$edit_result_data->student_name ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter student name">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Class</label>
            <input type="text" name="class" value="{{$edit_result_data->class ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter student class">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Seasone</label>
            <input type="text" name="seasone" value="{{$edit_result_data->seasone ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter exam Year">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Get Number</label>
            <input type="text" name="get_number" value="{{$edit_result_data->get_number ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter get number">
          </div>
          <div class="form-group">
            <label for="exampleInputText1">Total Number</label>
            <input type="text" name="total_number" value="{{$edit_result_data->total_number ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter total name">
          </div>
          <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
              <div class="custom-file">
                <input type="file" name="student_image" class="custom-file-input" id="exampleInputFile">
                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
              </div>
              <div class="input-group-append">
                <span class="input-group-text">Upload</span>
              </div>
            </div>
            @error('student_image')
            <p class="text-danger">{{$message}}</p>   
           @enderror
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
    <!-- /.card -->
    <img src="{{asset("Result/".$edit_result_data->student_image ?? '')}}" id="previewImg" alt="N/F" width="150px" height="70px"/>

  </div>
  @endsection