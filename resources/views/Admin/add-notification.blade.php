@extends('layouts.adminapp')
@section('title', 'Add Notification')
@section('AdminContent')
<div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Add Notification</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="{{url('admin/store-notification')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="exampleInputText1">Notification Text</label>
            <input type="text" name="notification_text" class="form-control" id="exampleInputText1" placeholder="Please enter notification text">
          </div>

          <div class="form-group">
            <label for="exampleInputText1">Notification Link (Not Mandatory)</label>
            <input type="text" name="notification_link" class="form-control" id="exampleInputText1" placeholder="Please enter notification link">
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