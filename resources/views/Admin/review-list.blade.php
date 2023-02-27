@extends('layouts.adminapp')
@section('title', 'Review List')
@section('AdminContent')<!-- Small boxes (Stat box) -->
  <!-- /.row -->

   <!-- Main row -->
   <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            People Reviews
          </h3>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th>Serial No.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Position</th>
                        <th>Message</th>
                        <th>Created at</th>
                        <th>status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(!empty($reviewData))
                      @foreach($reviewData as $key=>$reviewVal)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>
                          <img src="{{asset("Review/".(isset($reviewVal->image) ?$reviewVal->image :'profile.png'))}}" alt="N/F" width="150px" height="70px"/>
                        </td>
                        <td>{{$reviewVal->name ?? ''}}</td>
                        <td>{{$reviewVal->email ?? ''}}</td>
                        <td>{{$reviewVal->position ?? ''}}</td>
                        <td>{{$reviewVal->message ?? ''}}</td>
                        <td>{{$reviewVal->created_at ?? ''}}</td>
                        <td>{!!$reviewVal->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
                        <td class="text-center pl-2">
                          <a href="javascript:void(0);" class="delete_review" value="{{$reviewVal->review_id}}"><i class="fas fa-archive"></i></a>
                        <a href="javascript:void(0);" class="change_status" value="{{$reviewVal->review_id}}"><i class="fa fa-refresh"></i></a>
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
              <div class="d-flex justify-content-center">
                {!! $reviewData->links() !!}
              </div>
            </div>
          </div>
        </div><!-- /.card-body -->
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
                <h5 class="modal-title" id="exampleModalLabel">Delete review</h5>
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
 $(document).on("click", ".delete_review", function (e) {
     e.preventDefault();
     var RevId = $(this).attr('value');
     $('#delete_add_id').val(RevId);
     $('#DeleteAddressModal').modal('show');
 });

 // final delete
 $(document).on("click", ".delete_add_cnf", function (e) {
     e.preventDefault();
     var review_id = $('#delete_add_id').val();
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/delete-review') }}",
         type: "POST",
         data: {
          review_id: review_id
         },
         success: function (response) {
            //  console.log(response);
             $('#DeleteAddressModal').modal('hide');
             swal({
                   title: "Review Deleted Successfully",
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
     var review_id = $(this).attr('value');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/status-review') }}",
         type: "POST",
         data: {
          review_id: review_id
         },
         success: function (response) {
             swal({
                   title: "Review Status Changed Successfully",
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