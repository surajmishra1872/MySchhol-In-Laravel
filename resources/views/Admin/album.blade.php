
@extends('layouts.adminapp')
@section('title', 'Album List')
@section('AdminContent')<!-- Small boxes (Stat box) -->
  <!-- /.row -->

   <!-- Main row -->
   <div class="row">
    <!-- Left col -->
    <section class="col-lg-12 connectedSortable">
      <!-- Custom tabs (Charts with tabs)-->
      <div class="card">
        <div class="card-header bg-primary">
          <h3 class="card-title">
            <i class="fas fa-chart-pie mr-1"></i>
            Album
          </h3>

          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item ">
                <a class="nav-link bg-warning link-light" href="{{url('admin/add-albums')}}" >
                  <i class="fa fa-plus" aria-hidden="true"></i> Add Albums</a>
              </li>
            </ul>
          </div>
          
        </div><!-- /.card-header -->
        <div class="card-body">
          {{-- <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Serial No.</th>
              <th>Image</th>
              <th>Album Name</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($albumData))
            @foreach($albumData as $key=>$albumval)
            <tr>
              <td>{{$key+1}}</td>
              <td>
                <img src="{{asset("Album/".$albumval->album_image ?? '')}}" alt="N/F" width="150px" height="70px"/>
              </td>
              <td>{{$albumval->album_name ?? ''}}</td>
              <td>{!!$albumval->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
              <td class="text-center pl-2">
                <a href="{{url('admin/edit-album/'.$albumval->album_id)}}" class="edit_facilities" value="{{$albumval->album_id}}"><i class="fas fa-edit "></i></a>
                <a href="javascript:void(0);" class="delete_album" value="{{$albumval->album_id}}"><i class="fas fa-archive"></i></a>
              <a href="javascript:void(0);" class="change_status" value="{{$albumval->album_id}}"><i class="fa fa-refresh"></i></a>
              <a href="{{url('admin/add-gallery/'.$albumval->album_id)}}" class="add_gallery_image" value="{{$albumval->album_id}}"><i class="fas fa-plus "></i></a>  
              <a href="{{url('admin/show-gallery/'.$albumval->album_id)}}" class="add_gallery_image" value="{{$albumval->album_id}}"><i class="fas fa-eye "></i></a>  
            </td>
            </tr>
            @endforeach
            @endif
            </tbody>
          </table> --}}

          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Serial No.</th>
                        <th>Image</th>
                        <th>Album Name</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($albumData))
                      @foreach($albumData as $key=>$albumval)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>
                          <img src="{{asset("Album/".$albumval->album_image ?? '')}}" alt="N/F" width="150px" height="70px"/>
                        </td>
                        <td>{{$albumval->album_name ?? ''}}</td>
                        <td>{!!$albumval->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
                        <td class="text-center pl-2">
                          <a href="{{url('admin/edit-album/'.$albumval->album_id)}}" class="edit_facilities" value="{{$albumval->album_id}}"><i class="fas fa-edit "></i></a>
                          <a href="javascript:void(0);" class="delete_album" value="{{$albumval->album_id}}"><i class="fas fa-archive"></i></a>
                        <a href="javascript:void(0);" class="change_status" value="{{$albumval->album_id}}"><i class="fa fa-refresh"></i></a>
                        <a href="{{url('admin/add-gallery/'.$albumval->album_id)}}" class="add_gallery_image" value="{{$albumval->album_id}}"><i class="fas fa-plus "></i></a>  
                        <a href="{{url('admin/show-gallery/'.$albumval->album_id)}}" class="add_gallery_image" value="{{$albumval->album_id}}"><i class="fas fa-eye "></i></a>  
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
      </div>
      <div class="d-flex justify-content-center">
        {!! $albumData->links() !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Delete album</h5>
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
 $(document).on("click", ".delete_album", function (e) {
     e.preventDefault();
     var FacId = $(this).attr('value');
     $('#delete_add_id').val(FacId);
     $('#DeleteAddressModal').modal('show');
 });

 // final delete
 $(document).on("click", ".delete_add_cnf", function (e) {
     e.preventDefault();
     var album_id = $('#delete_add_id').val();
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/delete-album') }}",
         type: "POST",
         data: {
             album_id: album_id
         },
         success: function (response) {
            //  console.log(response);
             $('#DeleteAddressModal').modal('hide');
             swal({
                   title: "Album Deleted",
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
     var album_id = $(this).attr('value');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/status-album') }}",
         type: "POST",
         data: {
          album_id: album_id
         },
         success: function (response) {
             swal({
                   title: "Album Status Changed Successfully",
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