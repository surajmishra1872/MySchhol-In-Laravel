
@extends('layouts.adminapp')
@section('title', 'Enquiries')
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
            Enquiry / Contact Us
          </h3>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text"  id="search" name="search" class="form-control float-right" placeholder="Search">
              
              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-bordered table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Serial No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Enquiry Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($enquiryData))
                      @foreach($enquiryData as $key=>$enquiryVal)
                      <tr>
                        <td>{{$key+1}}</td>
                        <td><b>{{$enquiryVal->name ?? ''}}</b></td>
                        <td>{{$enquiryVal->email ?? ''}}</td>
                        <td><b>{{$enquiryVal->phone ?? ''}}</b></td>
                        <td>{{$enquiryVal->subject ?? ''}}</td>
                        <td>{{$enquiryVal->message ?? ''}}</td>
                        <td>{{$enquiryVal->created_at ?? ''}}</td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <div class="d-flex justify-content-center">
                {!! $enquiryData->links() !!}
            </div>
              <!-- /.card -->
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
                <h5 class="modal-title" id="exampleModalLabel">Delete enquiry</h5>
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

@push('scripts')
<script type="text/javascript">
  $('#search').on('keyup',function(){
  $value=$(this).val();
  $.ajax({
  type : 'get',
  url : '{{URL::to('admin/contact-search')}}',
  data:{'search':$value},
  success:function(data){
  $('tbody').html(data);
  }
  });
  })
  </script>
  <script type="text/javascript">
  $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
  </script>
@endpush
 @endsection

