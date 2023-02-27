
@extends('layouts.adminapp')
@section('title', 'Links List')
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
            Manage Links
          </h3>
          <div class="card-tools">
            <ul class="nav nav-pills ml-auto">
              <li class="nav-item">
                <a class="nav-link active" href="{{url('admin/add-links')}}" >
                  <i class="fa fa-plus" aria-hidden="true"></i>Add Links</a>
              </li>
            </ul>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          {{-- <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Serial No.</th>
              <th>Links Name</th>
              <th>Link url</th>
              <th>Creation Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(!empty($linksData))
            @foreach($linksData as $key=>$linkVal)
            <tr>
              <td>{{$key+1}}</td>
              <td>{{$linkVal->link_name ?? ''}}</td>
              <td>{{$linkVal->link_url ?? ''}}</td>
              <td>{{$linkVal->created_at ?? ''}}</td>
              <td>{!!$linkVal->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
              <td class="text-center pl-2">
                <a href="{{url('admin/edit-link/'.$linkVal->link_id)}}" class="edit_facilities" value="{{$linkVal->link_id}}"><i class="fas fa-edit "></i></a>
                <a href="javascript:void(0);" class="delete_link" value="{{$linkVal->link_id}}"><i class="fas fa-archive"></i></a>
              <a href="javascript:void(0);" class="change_status" value="{{$linkVal->link_id}}"><i class="fa fa-refresh"></i></a>
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
                  <table class="table table-hover text-nowrap table-bordered">
                    <thead>
                      <tr>
                        <th>Serial No.</th>
                        <th>Links Name</th>
                        <th>Link url</th>
                        <th>Creation Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @if(!empty($linksData))
                      @foreach($linksData as $key=>$linkVal)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$linkVal->link_name ?? ''}}</td>
                        <td>{{$linkVal->link_url ?? ''}}</td>
                        <td>{{$linkVal->created_at ?? ''}}</td>
                        <td>{!!$linkVal->status==1 ? '<p class="text-success">active</p>':'<p class="text-warning">deactive</p>' !!}</td>
                        <td class="text-center pl-2">
                          <a href="{{url('admin/edit-link/'.$linkVal->link_id)}}" class="edit_facilities" value="{{$linkVal->link_id}}"><i class="fas fa-edit "></i></a>
                          <a href="javascript:void(0);" class="delete_link" value="{{$linkVal->link_id}}"><i class="fas fa-archive"></i></a>
                        <a href="javascript:void(0);" class="change_status" value="{{$linkVal->link_id}}"><i class="fa fa-refresh"></i></a>
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
          {!! $linksData->links() !!}
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Menu Item</h5>
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
 $(document).on("click", ".delete_link", function (e) {
     e.preventDefault();
     var LinkId = $(this).attr('value');
     $('#delete_add_id').val(LinkId);
     $('#DeleteAddressModal').modal('show');
 });

 // final delete
 $(document).on("click", ".delete_add_cnf", function (e) {
     e.preventDefault();
     var link_id = $('#delete_add_id').val();
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/delete-link') }}",
         type: "POST",
         data: {
            link_id: link_id
         },
         success: function (response) {
            //  console.log(response);
             $('#DeleteAddressModal').modal('hide');
             swal({
                   title: "Link Deleted Successfully",
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
     var link_id = $(this).attr('value');
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
     $.ajax({
         url: "{{ url('admin/status-link') }}",
         type: "POST",
         data: {
            link_id: link_id
         },
         success: function (response) {
             swal({
                   title: "Link Status Changed Successfully",
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