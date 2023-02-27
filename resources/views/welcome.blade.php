@extends('layouts.app')
@section('title', 'Home Page')
@section('content')

@push('styles')
<link rel="stylesheet" href="{{asset('css/docs.theme.min.css')}}">
<!-- Owl Stylesheets -->
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<style>
  .carousel .carousel-item {
    color: #999;
    overflow: hidden;
    min-height: 100px;
    font-size: 13px;
  }

  .carousel .media img {
    width: 80px;
    height: 80px;
    display: block;
    border-radius: 50%;
  }

  .carousel .testimonial {
    padding: 0 15px 0 60px;
    position: relative;
  }

  .carousel .testimonial::before {
    content: "\201C";
    font-family: Arial, sans-serif;
    color: #e2e2e2;
    font-weight: bold;
    font-size: 68px;
    line-height: 54px;
    position: absolute;
    left: 15px;
    top: 0;
  }

  .carousel .overview b {
    text-transform: uppercase;
    color: #1c47e3;
  }

  .testnomialitem {
    background-color: white;
    border: 1px solid white;
    padding: 30px;
    margin-top: 85px;
  }

  #mrquee_text{
    color:rgb(1, 4, 57);
  }

</style>
@endpush


{{-- Slider Start --}}
@if(!empty($sliderData))
<div id="carouselExampleCaptions" class="carousel slide carousel-fade  data-bs-ride="carousel">
  <div class="carousel-indicators">
    @foreach($sliderData as $key=>$slideVal)
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{$key}}" class="active"
      aria-current="true" aria-label="Slide {{$key}}"></button>
    @endforeach
  </div>
  <div class="carousel-inner">
    @foreach($sliderData as $key=>$slideVal)
    <div class="carousel-item {{$key+1==sizeof($sliderData) ? 'active':''}} " data-bs-interval="3000">
      <img src="{{asset('slider/'.$slideVal->slider_image)}}" class="d-block w-100 " height="500px" alt="N/F">
      <div class="carousel-caption d-none d-md-block">
        <h4>{{$slideVal->slider_text}}</h4>
      </div>
    </div>
    @endforeach
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
@endif
{{-- Slider End --}}

{{-- Start of news --}}
@if(!empty($notificationData) && sizeof($notificationData)>0)
<div class="container  mt-4">
  <div class="row border border-primary ">
    <div class="col-2 col-md-1" style="background-color:red;color:white;">
      Latest News
    </div>
    <div class="col-10 col-md-11" >
      <marquee  width="100%" direction="left" scrollamount="7" onmouseover="this.stop();"
        onmouseout="this.start();">
        @foreach($notificationData as $NotiKey=>$NotiVal)
          @if(!empty($NotiVal->notification_link))
             {{$NotiKey+1}}. <a id="mrquee_text" href="{{$NotiVal->notification_link ?? ''}}">{{$NotiVal->notification_text}}</a>
             @if($NotiKey==0)<span class="right badge blink" style="background: rgb(255, 3, 3);">New</span>@endif &nbsp;&nbsp;&nbsp;
          @else
          {{$NotiKey+1}}. {{$NotiVal->notification_text}} &nbsp;&nbsp;&nbsp;
           @endif
        @endforeach
      </marquee>
    </div>
  </div>
</div>
@endif

{{-- end of news --}}


{{-- Start of principal --}}

<div class="py-3 px-1">
  <div class="container py-3">
    <div class="row text-center">
      <!-- Team item-->
      <div class="col-12 col-md-4 mb-3">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img style="height:120px;" src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" width="120" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Principal Name</h5><span class="small text-uppercase text-muted">Degree Name</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="" target="_blank"class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="" target="_blank"class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="" target="_blank" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="" class="social-link"><i class="fa fa-phone"></i></a></li>
            <li class="list-inline-item"><a href="" class="social-link"><i class="fa fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

        <!-- Team item-->
        <div class="col-xl-4 col-sm-6 mb-3">
          <div class="bg-white rounded shadow-sm py-5 px-4"><img style="height:120px;" src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" width="120" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
            <h5 class="mb-0">Manager Name</h5><span class="small text-uppercase text-muted">Degree Name</span>
            <ul class="social mb-0 list-inline mt-3">
              <li class="list-inline-item"><a href="" target="_blank"class="social-link"><i class="fa fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a href="" target="_blank"class="social-link"><i class="fa fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="" target="_blank" class="social-link"><i class="fa fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="" class="social-link"><i class="fa fa-phone"></i></a></li>
              <li class="list-inline-item"><a href="" class="social-link"><i class="fa fa-whatsapp"></i></a></li>
            </ul>
          </div>
        </div>
        <!-- End-->
        
          <!-- Team item-->
      <div class="col-xl-4 col-sm-6 mb-3">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img style="height:120px;" src="https://bootstrapious.com/i/snippets/sn-about/img-1.jpg" alt="" width="120" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Other Persone Name</h5><span class="small text-uppercase text-muted">Position Name</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="" target="_blank"class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="" target="_blank"class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="" target="_blank" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="" class="social-link"><i class="fa fa-phone"></i></a></li>
            <li class="list-inline-item"><a href="" class="social-link"><i class="fa fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

    </div>
  </div>
</div>

{{-- end of principal --}}

{{--Start of Our Facilities --}}
@if(!empty($facilitiesData))

  <h4 class="text-center">Our <b class="text-muted">Facilities</b></h4>
  <div class="row p-3">
  @foreach($facilitiesData as $facilitiesdata)
  <div class="col-sm-3 py-2 px-1">
    <!--Bootstrap Card-->
    <div class="card" style="min-height:320px;">
      <img class="card-img-top" src="{{asset("facilities/".$facilitiesdata->feature_image ?? '')}}" alt="N/F" class="top-img-cart" />
      <div class="card-body">
        <h5 class="card-title">{{$facilitiesdata->facilities_heading ?? ''}}</h5>
        <p class="card-text" >
          {{$facilitiesdata->facilities_text ?? ''}}
        </p>
      </div>
    </div>
    <!--end Card-->
  </div>
  @endforeach
</div>

@endif

{{--End of Our Facilities --}}

{{-- start of about us --}}
<div class="container-xxl pl-0 pr-0">
<div class="row  ">
  <h4 class="text-center">About<b class="text-warning">Us</b></h4>
  <div class="col-sm-8 bg-primary p-5 text-light">

    What is Lorem Ipsum?
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
    a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing
    Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions
    of Lorem Ipsum.

    Why do we use it?
    It is a long established fact that a reader will be distracted by the readable content of a page when looking at
    its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
    opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing
    packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'
    will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by
    accident, sometimes on purpose (injected humour and the like).
    <div class="position-relative">
      <div class="position-absolute bottom--20 end-0"> <a class="btn" style="background-color: rgb(255, 164, 6);color:white;" href="{{url('/about-us')}}"
          role="button">Know More</a></div>
    </div>
  </div>
  <div class="col-sm-4 bg-warning p-3 text-light">

    <iframe width="100%" height="100%">
    {{-- src="https://www.youtube.com/embed/BddP6PYo2gs?playlist=BddP6PYo2gs&autoplay=1&mute=1&loop=1"> --}}
    </iframe>

  </div>
</div>
</div>

{{-- End of about us --}}

{{-- Start of our result --}}
@if(!empty($resultData))

<div class="row latestproduct justify-content-evenly p-4">
  <h4 class="text-center">Our <b class="text-muted">Results</b></h4>
  <section id="demos">
    <div class="row">
      <div class="col-12">
        <div class="owl-carousel carousel_se_01_carousel owl-theme">
          @foreach($resultData as $reskey=>$resvalue)
          <div class="item">
            <div class="card ">
              <div class="position-relative">
                <div class="position-absolute top-0 start-10">
                  <div
                    style="width:100%;padding:6px; height: 40px; background-color: rgb(0, 0, 0);color:white;font-size:25px;">
                    <b>{{$resvalue->percentage}}%</b></div>
                </div>
              </div>
              <img src="{{asset('Result/'.$resvalue->student_image)}}" class="top-img-cart" />
              <div class="card-body">
                <h5 class="card-title text-center">{{$resvalue->student_name}}</h5>
                <h6 class="card-title text-center">Seasone - {{$resvalue->seasone}}</h6>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</div>

@endif
{{-- end of our result --}}

{{-- Start of testnomila --}}
@if(!empty($reviewData) && sizeof($reviewData)>0)
<h4 class="text-center m-3">What <b class="text-muted">People</b>Says About Us</h4>
<div class="row " id="outer" >
  <div class="col-lg-12 " id="inner">

    <section id="demos">
      <div class="row">
        <div class="large-12 columns">
          <div class="custom1 owl-carousel owl-theme">

            @foreach($reviewData as $reviewKey=>$reviewVal)
            <div class="item">
              <div class="container-xl testnomialitem">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <div class="row">
                        <div class="col-2">
                          <div class="media">
                            <img src="{{asset('Review/'.(isset($reviewVal->image) ?$reviewVal->image :'profile.png'))}}" class="mr-3" alt="">
                          </div>
                        </div>
                        <div class="media-body col-10">
                          <div class="testimonial">
                            <p>{{$reviewVal->message??''}}</p>
                            <p class="overview"><b>{{$reviewVal->name??''}}</b>,{{$reviewVal->position??''}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @endforeach

          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endif 

{{-- End of testnomila --}}



@endsection

@push('scripts')

<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.js')}}"></script>
<script>
  $(document).ready(function () {
    $('.carousel_se_01_carousel').owlCarousel({
      loop: true,
      margin: 10,
      responsiveClass: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 3,
          nav: false
        },
        1000: {
          items: 4,
          nav: true,
          loop: true,
          margin: 20
        }
      }
    })
  })
</script>
{{-- For testnomial --}}
<script>
  jQuery(document).ready(function ($) {
    $('.fadeOut').owlCarousel({
      items: 1,
      animateOut: 'fadeOut',
      loop: true,
      margin: 10,
    });
    $('.custom1').owlCarousel({
      animateOut: 'slideOutDown',
      animateIn: 'flipInX',
      items: 1,
      margin: 30,
      stagePadding: 30,
      smartSpeed: 450
    });
  });

  // jquery for review 

  $('#review_button').on('click', function () {
    $('#reviewModal').modal('show');
  });


  $('.reviewClose').on('click', function () {
    $('#reviewModal').modal('hide');
  });


  $(document).on('click', '#reviewSubmit', function (e) {
    e.preventDefault();
    let reviewform = document.getElementById('reviewform');
    let formData = new FormData(reviewform);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      type: "POST",
      url: "/storeReview",
      data: formData,
      dataType: "json",
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        if (response.status == 400) {
          $.each(response.error, function (key, err_val) {
            $('#' + key).text(err_val);
          });
        } else {
          $('#reviewModal').modal('hide');
          $('#reviewform').trigger("reset");
          swal({
                 title: "Thank You!",
                 text: "For your valuable review!",
                 icon: "success",
                 button: "OK",
              });
        }
      }

    });
  });

</script>
@endpush