@extends('layouts.app')
@section('title', 'Gallery')
@section('content')
<div class="container">
	<div class="row">
		<div class="row">
            @if(!empty($gallery_data))
            @foreach($gallery_data as $galkey=>$galVal)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="{{$galVal->img_text??''}}"
                   data-image="{{asset('Gallery/'.$galVal->img_image)}}"
                   data-target="#image-gallery">
                    <img class="img-thumbnail img-fluid" 
                         src="{{asset('Gallery/'.$galVal->img_image)}}"
                         alt="Another alt text">
                </a>
            </div>
            @endforeach
            @endif
        </div>


        <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="image-gallery-title"></h4>
                        <button type="button" class="close bg-white border-0 h3" id="img-close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img id="image-gallery-image" class="img-responsive col-md-12" width="100%" src="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                        </button>

                        <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

	</div>
</div>

@push('scripts')
<script>
$(".thumbnail").on("click", function(){
    $('#image-gallery').modal('show');
  });

  $("#img-close").on("click", function(){
    $('#image-gallery').modal('hide');
  });

  </script>
@endpush
@endsection