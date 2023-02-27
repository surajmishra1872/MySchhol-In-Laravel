@extends('layouts.adminapp')
@section('title', 'Add Link')
@section('AdminContent')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Link</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{url('admin/store-link')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputText1">Link Name</label>
            <input type="text" name="link_name" class="form-control" id="exampleInputText1" placeholder="Please enter link name">
          </div>

          <div class="form-group">
            <label for="exampleInputText1"> Link Url</label>
            <input type="text" name="link_url" class="form-control" id="exampleInputText1" placeholder="Please enter link url">
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