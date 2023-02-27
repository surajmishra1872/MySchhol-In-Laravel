
@extends('layouts.adminapp')
@section('title', 'Gallery Image List')
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
            Gallery
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{url('admin/add-gallery/'.$album_id)}}">
                  <i class="fa fa-plus" aria-hidden="true"></i>Add Gallery Image</a>
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
                        <th>Image</th>
                        <th>Image Text</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(!empty($galleryData))
                      @foreach($galleryData as $key=>$galval)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>
                          <img src="{{asset("Gallery/".$galval->img_image ?? '')}}" alt="N/F" width="150px" height="70px"/>
                        </td>
                        <td>{{$galval->img_text ?? ''}}</td>
                        <td>{!!$galval->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
                        <td class="text-center pl-2">
                          <a href="{{url('admin/edit-gallery/'.$galval->img_id)}}" class="edit_facilities" value="{{$galval->album_id}}"><i class="fas fa-edit "></i></a>
                          <a href="javascript:void(0);" class="delete_image" value="{{$galval->img_id}}"><i class="fas fa-archive"></i></a>
                        <a href="javascript:void(0);" class="change_status" value="{{$galval->img_id}}"><i class="fa fa-refresh"></i></a>
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
          {!! $galleryData->links() !!}
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
              <h5 class="modal-title" id="exampleModalLabel">Delete image</h5>
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
  $(document).on("click", ".delete_image", function (e) {
      e.preventDefault();
      var FacId = $(this).attr('value');
      $('#delete_add_id').val(FacId);
      $('#DeleteAddressModal').modal('show');
  });
 
  // final delete
  $(document).on("click", ".delete_add_cnf", function (e) {
      e.preventDefault();
      var img_id = $('#delete_add_id').val();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: "{{ url('admin/delete-gallery') }}",
          type: "POST",
          data: {
            img_id: img_id
          },
          success: function (response) {
             //  console.log(response);
              $('#DeleteAddressModal').modal('hide');
              swal({
                    title: "Image Deleted",
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
      var img_id = $(this).attr('value');
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
          url: "{{ url('admin/status-gallery') }}",
          type: "POST",
          data: {
            img_id: img_id
          },
          success: function (response) {
              swal({
                    title: "Image Status Changed Successfully",
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