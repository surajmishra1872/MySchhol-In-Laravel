
@extends('layouts.app')
@section('title', 'Gallery Album')
@section('content')
<div class="container-fluid">
  <div class="px-lg-5">

    <!-- For demo purpose -->
    <div class="row py-5">
      <div class="col-lg-12 mx-auto">
        <div class="text-white p-5 shadow-sm rounded banner">
          <h1 class="display-4">Bootstrap 4 photo gallery</h1>
          <p class="lead">Bootstrap photogallery snippet.</p>
          <p class="lead">Snippet by <a href="https://bootstrapious.com/snippets" class="text-reset"> 
                        Bootstrapious</a>, Images by <a href="https://unsplash.com" class="text-reset">Unsplash</a>.
          </p>
        </div>
      </div>
    </div>
    <!-- End -->
    <div class="row"> 
     <!-- Gallery item -->
      @if(!empty($album_data))
      @foreach($album_data as $albumkey=>$albumVal)
      <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
        <div class="bg-white rounded shadow-sm"><a href="{{url('/webgallery/'.$albumVal->album_id)}}"><img src="{{asset('Album/'.$albumVal->album_image)}}" alt="" class="img-fluid card-img-top"></a>
          <div class="p-4">
            <h5> <a href="#" class="text-dark">{{$albumVal->album_name ?? ''}}</a></h5>
          </div>
        </div>
      </div>
      @endforeach
      @endif
      <!-- End -->
    </div>
    <div class="py-5 text-right"><a href="#" class="btn btn-dark px-5 py-3 text-uppercase">Show me more</a></div>
  </div>
</div>

@endsection