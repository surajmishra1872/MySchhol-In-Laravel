
@extends('layouts.adminapp')
@section('title', 'Edit Notification')
@section('AdminContent')<!-- Small boxes (Stat box) -->
<div class="row">

    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Edit Notification</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="{{url('admin/update-notification/'.$edit_notification_data->notification_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputText1">Notification Text</label>
                <input type="text" name="notification_text" value="{{$edit_notification_data->notification_text ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter notification text">
              </div>

              <div class="form-group">
                <label for="exampleInputText1">Notification Link</label>
                <input type="text" name="notification_link" value="{{$edit_notification_data->notification_link ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter notification link">
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