@extends('layouts.adminapp')
@section('title', 'Video Gallery List')
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
            Video Gallery List
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{url('admin/add-video')}}" >
                  <i class="fa fa-plus" aria-hidden="true"></i>Add Video</a>
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
                        <th>Video View</th>
                        <th>Video Name</th>
                        <th>Video Url</th>
                        <th>Upload Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(!empty($videoData))
                      @foreach($videoData as $key=>$videoVal)
                      @php
                          $string =$videoVal->video_embed_url;
                          $parts = explode('/', $string);
                          $last = array_pop($parts);
                      @endphp
                      <tr>
                        <td>{{$key+1}}</td>
                        <td><iframe width="100%" height="100%"
                          src={{$videoVal->video_embed_url.'?playlist='.$last.'&loop=1'}}>;
                          </iframe></td>
                        <td>{{$videoVal->video_name ?? ''}}</td>
                        <td>{{$videoVal->video_url ?? ''}}</td>
                        <td>{{$videoVal->created_at ?? ''}}</td>
                        <td>{!!$videoVal->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
                        <td class="text-center pl-2">
                          <a href="{{url('admin/edit-video/'.$videoVal->video_id)}}" class="edit_facilities" value="{{$videoVal->vidoe_id}}"><i class="fas fa-edit "></i></a>
                          <a href="javascript:void(0);" class="delete_video" value="{{$videoVal->video_id}}"><i class="fas fa-archive"></i></a>
                        <a href="javascript:void(0);" class="change_status" value="{{$videoVal->video_id}}"><i class="fa fa-refresh"></i></a>
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
          {!! $videoData->links() !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Video</h5>
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
                <button type="button" class="btn btn-primary delete_add_cnf ">Yes Delete</button>
            </div>
        </div>
    </div>
</div>

 @endsection

 
@push('scripts')
<script>
 //delete modal
 $(document).on("click", ".delete_video", function (e) {
     e.preventDefault();
     var VidId = $(this).attr('value');
     $('#delete_add_id').val(VidId);
     $('#DeleteAddressModal').modal('show');
 });

 // final delete
 $(document).on("click", ".delete_add_cnf", function (e) {
     e.preventDefault();
     var video_id = $('#delete_add_id').val();
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/delete-video') }}",
         type: "POST",
         data: {
            video_id: video_id
         },
         success: function (response) {
            //  console.log(response);
             $('#DeleteAddressModal').modal('hide');
             swal({
                   title: "Video Deleted Successfully",
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
     var video_id = $(this).attr('value');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/status-video') }}",
         type: "POST",
         data: {
            video_id: video_id
         },
         success: function (response) {
             swal({
                   title: "Video Status Changed Successfully",
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