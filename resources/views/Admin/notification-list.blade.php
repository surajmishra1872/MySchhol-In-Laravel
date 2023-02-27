
@extends('layouts.adminapp')
@section('title', 'Notification List')
@section('AdminContent')<!-- Small boxes (Stat box) -->
  <!-- /.row -->

   <!-- Main row -->
   <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Manage Notifications
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active bg-warning" href="{{url('admin/add-notification')}}"  >
                  <i class="fa fa-plus" aria-hidden="true"></i>Add Notification</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
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
                        <th>Notification Text</th>
                        <th>Notification Link</th>
                        <th>Creation Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(!empty($noticationData))
                      @foreach($noticationData as $key=>$notiVal)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$notiVal->notification_text ?? ''}}</td>
                        <td>{{$notiVal->notification_link ?? ''}}</td>
                        <td>{{$notiVal->created_at ?? ''}}</td>
                        <td>{!!$notiVal->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
                        <td class="text-center pl-2">
                          <a href="{{url('admin/edit-notification/'.$notiVal->notification_id)}}" class="edit_facilities" value="{{$notiVal->notification_id}}"><i class="fas fa-edit "></i></a>
                          <a href="javascript:void(0);" class="delete_notification" value="{{$notiVal->notification_id}}"><i class="fas fa-archive"></i></a>
                        <a href="javascript:void(0);" class="change_status" value="{{$notiVal->notification_id}}"><i class="fa fa-refresh"></i></a>
                      </td>
                      </tr>
                      @endforeach
                      @endif
                      </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div><!-- /.card-body -->
        <div class="d-flex justify-content-center">
          {!! $noticationData->links() !!}
        </div>
      </div>
      <!-- /.card -->
    </section>
    <!-- /.Left col -->
  
  </div>
  <!-- /.row (main row) -->

  
  <div class="modal fade" id="DeleteAddressModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Notification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="delete_add_id">
                <h2>Are You Sure Want to Delete ?</h2>
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
 $(document).on("click", ".delete_notification", function (e) {
     e.preventDefault();
     var NotiId = $(this).attr('value');
     $('#delete_add_id').val(NotiId);
     $('#DeleteAddressModal').modal('show');
 });

 // final delete
 $(document).on("click", ".delete_add_cnf", function (e) {
     e.preventDefault();
     var notification_id = $('#delete_add_id').val();
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/delete-notification') }}",
         type: "POST",
         data: {
            notification_id: notification_id
         },
         success: function (response) {
            //  console.log(response);
             $('#DeleteAddressModal').modal('hide');
             swal({
                   title: "Notification Deleted Successfully",
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
     var notification_id = $(this).attr('value');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/status-notification') }}",
         type: "POST",
         data: {
            notification_id: notification_id
         },
         success: function (response) {
             swal({
                   title: "Notification Status Changed Successfully",
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