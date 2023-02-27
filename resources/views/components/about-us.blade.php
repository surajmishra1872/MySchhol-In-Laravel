@extends('layouts.app')
@section('title', 'About Us')
@section('content')

  
  <div class="bg-light">
    <div class="container py-5">
      <div class="row h-100 align-items-center py-2">
        <div class="col-lg-12 text-center">
          <h1 class="display-4">About us page</h1>
        </div>
      </div>
   </div>
  </div>
  
  <div class="bg-white py-5">
    <div class="container py-5">
      <div class="row align-items-center mb-5">
        <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
          <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>
          <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
        </div>
        <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      </div>
      <div class="row align-items-center">
        <div class="col-lg-5 px-5 mx-auto"><img src="https://bootstrapious.com/i/snippets/sn-about/img-2.jpg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
        <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
          <h2 class="font-weight-light">Lorem ipsum dolor sit amet</h2>
          <p class="font-italic text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p><a href="#" class="btn btn-light px-5 rounded-pill shadow-sm">Learn More</a>
        </div>
      </div>
    </div>
  </div>
  
  @if(!empty($teacherList))
  <div class="bg-light py-5">
    <div class="container py-5">
      <div class="row mb-4">
        <div class="col-lg-5">
          <h2 class="display-4 font-weight-light">Meet our teachers</h2>
          <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
      </div>
  
      <div class="row text-center">
        <!-- Team item-->
       @foreach($teacherList as $teachKey=>$teachVal)
        <div class="col-xl-3 col-sm-6 mb-5">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img style="height:120px;" src="{{asset("Teachers/".$teachVal->teacher_image ?? '')}}" alt="" width="120" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">{{$teachVal->teacher_name ?? ''}}</h5><span class="small text-uppercase text-muted">Subject - {{$teachVal->teacher_subject ?? ''}}</span>
            <ul class="social mb-0 list-inline mt-3">
              @if(!empty($teachVal->teacher_facebook))
              <li class="list-inline-item"><a href="{{$teachVal->teacher_facebook}}" target="_blank"class="social-link"><i class="fa fa-facebook-f"></i></a></li>
              @endif
              @if(!empty($teachVal->teacher_twitter))
              <li class="list-inline-item"><a href="{{$teachVal->teacher_twitter}}" target="_blank"class="social-link"><i class="fa fa-twitter"></i></a></li>
              @endif
              @if(!empty($teachVal->teacher_instagram))
              <li class="list-inline-item"><a href={{"https://www.instagram.com/".$teachVal->teacher_instagram."/"}} target="_blank" class="social-link"><i class="fa fa-instagram"></i></a></li>
              @endif
              @if(!empty($teachVal->teacher_mobile))
              <li class="list-inline-item"><a href="tel:{{$teachVal->teacher_mobile}}" class="social-link"><i class="fa fa-phone"></i></a></li>
              @endif
              @if(!empty($teachVal->teacher_whatsapp))
              <li class="list-inline-item"><a href="{{$teachVal->teacher_whatsapp}}" class="social-link"><i class="fa fa-whatsapp"></i></a></li>
              @endif
            </ul>
          </div>
        </div>
        @endforeach
        <!-- End-->
      </div>
    </div>
  </div>
  @endif
  @endsection