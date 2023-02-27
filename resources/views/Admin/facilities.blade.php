
@extends('layouts.adminapp')
@section('title', 'Facilities List')
@section('AdminContent')<!-- Small boxes (Stat box) -->
<div class="row">

  <div class="col-md-12">
    <!-- general form elements -->
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Facilities List</h3>
        <div class="card-tools">
        <a href="{{url('admin/add-facilities')}}" class="btn btn-warning btn-sm float-sm-right" role="button" aria-pressed="true"><i class="fa fa-plus" aria-hidden="true"></i>
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
                      <th>Facilities Title</th>
                      <th>Facilities Text</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @if(!empty($FacData))
                      @foreach($FacData as $key=>$facval)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>
                          <img src="{{asset("facilities/".$facval->feature_image ?? '')}}" alt="N/F" width="150px" height="70px"/>
                        </td>
                        <td>{{$facval->facilities_heading ?? ''}}</td>
                        <td>{{$facval->facilities_text ?? ''}}</td>
                        <td>{!!$facval->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
                        <td class="text-center pl-2">
                          <a href="{{url('admin/edit-facilities/'.$facval->facilities_id)}}" class="edit_facilities" value="{{$facval->facilities_id}}"><i class="fas fa-edit "></i></a>
                          <a href="javascript:void(0);" class="delete_facilities" value="{{$facval->facilities_id}}"><i class="fas fa-archive"></i></a>
                        <a href="javascript:void(0);" class="change_status" value="{{$facval->facilities_id}}"><i class="fa fa-refresh"></i></a>
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
              {!! $FacData->links() !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Delete facility</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_add_id">
                <h1>Are You Sure Want to Delete ?</h1>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary delete_add_cnf ">Yes</button>
            </div>
        </div>
    </div>
</div>
 @endsection

@push('scripts')
<script>
 //delete modal
 $(document).on("click", ".delete_facilities", function (e) {
     e.preventDefault();
     var FacId = $(this).attr('value');
     $('#delete_add_id').val(FacId);
     $('#DeleteAddressModal').modal('show');
 });

 // final delete
 $(document).on("click", ".delete_add_cnf", function (e) {
     e.preventDefault();
     var facilities_id = $('#delete_add_id').val();
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/delete-facilities') }}",
         type: "POST",
         data: {
             facilities_id: facilities_id
         },
         success: function (response) {
            //  console.log(response);
             $('#DeleteAddressModal').modal('hide');
             swal({
                   title: "Facility Deleted",
                   text: "",
                   icon: "success",
                   button: "Close!",
                  });
            window.location.reload();
         }
     });
 });


//  change status  

$(document).on("click", ".change_status", function (e) {
     e.preventDefault();
     var facilities_id = $(this).attr('value');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/status-facilities') }}",
         type: "POST",
         data: {
          facilities_id: facilities_id
         },
         success: function (response) {
             swal({
                   title: "Facility Status Changed Successfully",
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