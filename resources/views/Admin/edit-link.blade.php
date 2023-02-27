
@extends('layouts.adminapp')
@section('title', 'Edit Link')
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
          <form action="{{url('admin/update-link/'.$edit_link_data->link_id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label for="exampleInputText1">Link Name</label>
                <input type="text" name="link_name" value="{{$edit_link_data->link_name ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter link name">
              </div>

              <div class="form-group">
                <label for="exampleInputText1">Link Url</label>
                <input type="text" name="link_url" value="{{$edit_link_data->link_url ?? ''}}" class="form-control" id="exampleInputText1" placeholder="Please enter link url">
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