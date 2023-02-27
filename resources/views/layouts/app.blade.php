<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Site Metas -->
  <title>My School | @yield('title')</title>
  <meta name="keywords" content="">
  <meta name="description" content="This is officila website for My School Website Project By Technofy India By Suraj Mishra">
  <meta name="author" content="">
 {{-- OG Meta --}}
 <meta property="og:title" content="My School"/>
 <meta property="og:type" content="website" />
 <meta property="og:url" content="{{URL::current()}}" />
 <meta property="og:image" content="{{asset('Web/logo.png')}}" />
  <!-- Site Icons -->
  <link rel="shortcut icon" href="{{asset('Web/logo.png')}}" type="image/x-icon">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
  <link rel="stylesheet" href="{{asset('css/external.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  @stack('styles')
</head>

<body>
@php
use App\Models\ExternalLinks;
$external_links=ExternalLinks::where('status',1)->get();
@endphp
  <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-arrow-up bounce" aria-hidden="true"></i></button>
  {{-- Top bar start --}}
  <div class="row top1 text-center text-light fw-bold py-1"  style="background-color: rgb(255,117, 24);">
    <div class="col-sm-5">
      <a href="tel:9170832051" style="color:white;"><i class="fa fa-phone"></i>+91-9170832051</a>
      <a href="mailto:surajmishra@gmail.com" style="color:white;"><i class="fa fa-envelope"></i>surajmishra@gmail.com</a>
    </div>
    <div class="col-sm-3">
      {{-- <a href="#" class="btn btn-light btn-sm active" role="button" aria-pressed="true">हिंदी संस्करण</a> --}}
    </div>
    <div class="col-sm-2">

      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-youtube"></i>
      <i class="fa fa-whatsapp"></i>
    </div>
    <div class="col-sm-2">
      {{-- Start of review --}}
      <button type="button" id="review_button" class="btn  btn-rounded btn-sm text-white" style="background: rgb(4, 45, 192);color:white;">Give Your
        Review</button>
      {{-- End of review button --}}
    </div>
  </div>
  {{-- top bar end --}}

  {{-- navbar start --}}
  <div class="header" id="menubar">
    <nav  class="navbar  navbar-expand-lg navbar-dark text-center px-3"  style="background-color:rgb(25, 25, 112);">
      {{-- <a class="navbar-brand h5" href="{{url('/')}}">Sarswati Gyan Mandir Naini Prayagraj</a> --}}
      <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{asset('Web/logo.png')}}" width="100" height="50" alt="">
      </a>
      <span class="v-line"></span>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-4 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{url('/')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/webalbum')}}">Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/about-us')}}">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/contact-us')}}">Contact us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/video-gallery')}}">Video Gallery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/our-results')}}">Our Results</a>
          </li>

          @if(!empty($external_links) && sizeof($external_links)>0)
          @foreach($external_links as $linkKey=>$linkVal)
          
          <li class="nav-item">
            <a class="nav-link" target="_blank" href="{{$linkVal->link_url}}">
              {{$linkVal->link_name}}
               @if($linkKey+1==sizeof($external_links) )
               <span class="right badge rounded-circle blink" style="background: red;">New</span>
               @endif
            </a>
          </li>
          @endforeach
          @endif
          {{-- End of External Links  --}}

        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-light" type="button">Search</button>
        </form>
      </div>
    </nav>
  </div>
  {{-- emd of navbar --}}

  {{-- content yield here --}}

  @yield('content')

  {{-- end of yield --}}
  {{-- start of footer --}}
  <div class="row mt-5">
    <!-- Footer -->
    <footer class="text-center text-lg-start text-white" style="background-color: #000000">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: Links -->
        <section class="">
          <!--Grid row-->
          <div class="row">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-47 font-weight-bold">
                Collage name
              </h6>
              <p>
                Here you can use rows and columns to organize your footer
                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit.
              </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Links</h6>
              <p>
                <a class="text-white">MDBootstrap</a>
              </p>
              <p>
                <a class="text-white">MDWordPress</a>
              </p>
              <p>
                <a class="text-white">BrandFlow</a>
              </p>
              <p>
                <a class="text-white" href="{{url('/login')}}">Admin Login</a>
              </p>
            </div>
            <!-- Grid column -->           
            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none" />

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
              <p><i class="fa fa-home mr-3"></i> New York, NY 10012, US</p>
              <p><i class="fa fa-envelope mr-3"></i> info@gmail.com</p>
              <p><i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
              <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

              <!-- Facebook -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i
                  class="fa fa-facebook-f"></i></a>

              <!-- Twitter -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i
                  class="fa fa-twitter"></i></a>

              <!-- Instagram -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i
                  class="fa fa-instagram"></i></a>

              <!-- Linkedin -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #0082ca" href="#!" role="button"><i
                  class="fa fa-linkedin"></i></a>
             
              <img  class="mt-2" src="{{asset('Web/logo.png')}}" width="100%">

            </div>
          </div>
          <!--Grid row-->
        </section>
        <!-- Section: Links -->
      </div>
      <!-- Grid container -->

      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © <script>document.write(new Date().getFullYear())</script> Copyright:
        <a class="text-white" href="#">Suraj Kumar Mishra</a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </div>

  {{-- Start of review modal --}}

<div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Give Your Review</h5>
      <button type="button" class="close bg-white border-0 reviewClose" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form id="reviewform">
      <div class="mb-3">
        <label for="formGroupExampleInput" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="formGroupExampleInput" placeholder="Enter your name">
        <p class="text-danger" id="name"></p>
      </div>

      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Email</label>
        <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Enter your email">
        <p class="text-danger" id="email"></p>
      </div>

      <div class="mb-3">
        <label for="formGroupExampleInput2" class="form-label">Role</label>
        <select class="form-select" name="position" aria-label="Default select example">
          <option selected value="">Open this select option</option>
          <option value="Student">Student</option>
          <option value="Parent">Parent</option>
          <option value="Other">Other</option>
        </select>
        <p class="text-danger" id="position"></p>
      </div>

      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Your Messege</label>
        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"
          placeholder="Plese write your valueable review"></textarea>
          <p class="text-danger" id="message"></p>
      </div>

      <div class="mb-3">
        <label class="form-label" for="inputGroupFile01">Upload Your Image</label>
        <input type="file" name="image" class="form-control" id="inputGroupFile01">
        <p class="text-danger" id="image"></p>
      </div>
    
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary reviewClose" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary" id="reviewSubmit">Save changes</button>
      <input type="reset" hidden >
    </div>
  </form>
  </div>
</div>
</div>

{{-- End of review modal --}}


  {{-- End of footer --}}
  @stack('scripts')
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/extra.js')}}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {scrollFunction()};
    
    function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
      } else {
        mybutton.style.display = "none";
      }
    }
    
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }


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
  {{--
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
</body>

</html>