@extends('layouts.adminapp')
@section('title', 'Slider List')
@section('AdminContent')<!-- Small boxes (Stat box) -->
<div class="row">

  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Slider List</h3>
        <div class="card-tools">
          <a href="{{url('admin/add-slider')}}" class="btn btn-warning btn-sm float-sm-right" role="button" aria-pressed="true"><i class="fa fa-plus" aria-hidden="true"></i>
            Add New</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap table-bordered">
                  <thead>
                    <tr>
                      <th>Serial No.</th>
                      <th>Image</th>
                      <th>Slider Text</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($slider_data))
                    @foreach($slider_data as $key=>$slideval)
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>
                        <img src="{{asset("slider/".$slideval->slider_image ?? '')}}" alt="N/F" width="150px" height="70px"/>
                      </td>
                      <td>{{$slideval->slider_text ?? ''}}</td>
                      <td>{!!$slideval->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
                      <td class="text-center pl-2">
                        <a href="{{url('admin/edit-slider/'.$slideval->slider_id)}}" class="edit_facilities" value="{{$slideval->slider_id}}"><i class="fas fa-edit "></i></a>
                        <a href="javascript:void(0);" class="delete_slider" value="{{$slideval->slider_id}}"><i class="fas fa-archive"></i></a>
                      <a href="javascript:void(0);" class="slider_status" id="slider_status_btn" value="{{$slideval->slider_id}}"><i class="fa fa-refresh"></i></a>
                      </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="d-flex justify-content-center">
              {!! $slider_data->links() !!}
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
  
  </div>
  <!-- /.row (main row) -->

  <div class="modal fade" id="DeleteAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Slider</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_add_id">
                <h1>Are You Sure Want to Delete ?</h1>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                <button type="button" class="btn btn-primary delete_add_cnf ">YES</button>
            </div>
        </div>
    </div>
</div>
 @endsection

@push('scripts')
<script>
 //delete modal
 $(document).on("click", ".delete_slider", function (e) {
     e.preventDefault();
     var SliderId = $(this).attr('value');
     $('#delete_add_id').val(SliderId);
     $('#DeleteAddressModal').modal('show');
 });

 // final delete
 $(document).on("click", ".delete_add_cnf", function (e) {
     e.preventDefault();
     var slider_id = $('#delete_add_id').val();
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/delete-slider') }}",
         type: "POST",
         data: {
            slider_id: slider_id
         },
         success: function (response) {
            //  console.log(response);
             $('#DeleteAddressModal').modal('hide');
             swal({
                   title: "Slide Deleted Successfully",
                   text: "",
                   icon: "success",
                   button: "Close!",
                  });
            window.location.reload();
         }
     });
 });

//  change status  

 $(document).on("click", ".slider_status", function (e) {
     e.preventDefault();
     var slider_id = $(this).attr('value');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/status-slider') }}",
         type: "POST",
         data: {
             slider_id: slider_id
         },
         success: function (response) {
            //  console.log(response);
            //  $('#DeleteAddressModal').modal('hide');
             swal({
                   title: "Slider Status Changed Successfully",
                   text: "",
                   icon: "success",
                   button: "Close!",
                  });
            window.location.reload();
         }
     });
 });

</script>
@endpush