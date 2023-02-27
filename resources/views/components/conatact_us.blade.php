@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')
@push('styles')
<style>
.ftco-section{
font-family: Arial, Helvetica, sans-serif;
}
.form-group{
    margin:5px auto;
}  
.label{
    padding: 5px;
    font-size:15px;
}
.inputclass
{
height:50px;
}

.dbox{
    margin-top:2px;
}
.icon{
   margin-right: 6px;
    background-color: white;
    color:orangered;
   padding:10px;
   border-radius: 50%;
}

.fa{
    font-size:20px;
}
a{
    color: white;
    text-decoration: none;
}
a:hover{
    color:orangered;
}
.contact-left-box{
    height: 520px;
}
.gmap iframe{
    height:400px;
    width: 100%;
    margin-top:15px; 
}

body{
    background: white;
}
</style>

@endpush
<div class="bg-light">
    <div class="container py-4">
      <div class="row h-100 align-items-center py-2">
        <div class="col-lg-12 text-center">
          <h1 class="display-4">Contact us</h1>
        </div>
      </div>
   </div>
  </div>

<section class="ftco-section mt-5">
    <div class="container">
        {{-- <div class="row justify-content-center bg-light">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Contact Form </h2>
            </div>
        </div> --}}
     
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">
                        <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                            <div class="contact-wrap w-100 p-md-5 p-4">
                                <h3 class="mb-4">Get in touch</h3>
                                <div id="form-message-warning" class="mb-4"></div> 
                                <form  id="contactForm" name="contactForm" class="contactForm">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="label" for="name">Full Name</label>
                                                <input type="text" class="form-control inputclass" name="name" id="name" placeholder="Name">
                                            </div>
                                            <span class="text-danger" id="ename" ></span>
                                        </div>
                                        <div class="col-md-6"> 
                                            <div class="form-group">
                                                <label class="label" for="email">Phone Number</label>
                                                <input type="email" class="form-control inputclass" name="phone" id="phone" placeholder="Number">
                                            </div>
                                            <span class="text-danger" id="ephone" ></span>
                                        </div>
                                        <div class="col-md-12"> 
                                            <div class="form-group">
                                                <label class="label" for="email">Email Address</label>
                                                <input type="email" class="form-control inputclass" name="email" id="email" placeholder="Email">
                                            </div>
                                            <span class="text-danger" id="eemail" ></span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="subject">Subject</label>
                                                <input type="text" class="form-control inputclass" name="subject" id="subject" placeholder="Subject">
                                            </div>
                                            <span class="text-danger" id="esubject" ></span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="label" for="#">Message</label>
                                                <textarea name="message" class="form-control" id="message" cols="30" rows="4" placeholder="Message"></textarea>
                                            </div>
                                            <span class="text-danger" id="emessage" ></span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="submit" id="contactusbtn" value="Send Message" class="btn btn-primary">
                                                <input type="reset"  hidden class="btn btn-primary">
                                                <div class="submitting"></div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 d-flex align-items-stretch text-white contact-left-box">
                            <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                <h3>Let's get in touch</h3>
                                <p class="mb-4">We're open for any suggestion or just to have a chat</p>
                        <div class="dbox w-100 d-flex align-items-start">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-map-marker"></span>
                            </div>
                            <div class="text pl-3">
                            <p style="margin-top:0"><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
                          </div>
                      </div>
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-phone"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
                          </div>
                      </div>
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                          </div>
                      </div>
                        <div class="dbox w-100 d-flex align-items-center">
                            <div class="icon d-flex align-items-center justify-content-center">
                                <span class="fa fa-globe"></span>
                            </div>
                            <div class="text pl-3">
                            <p><span>Website</span> <a href="#">yoursite.com</a></p>
                          </div>
                      </div>
                  </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Google Map --}}

<!--Google map-->
<div class="row gmap">
    <div class="col-12">
{{-- <div id="map-container-google-1" class="z-depth-1-half map-container "> --}}
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7218.009767300924!2d81.98530081496261!3d25.23676048387783!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3985453a61573ca3%3A0x1b9060f3a6b361f4!2sMishra%20Bhavan!5e0!3m2!1sen!2sin!4v1641640316659!5m2!1sen!2sin" frameborder="0"
      style="border:0" allowfullscreen></iframe>
  </div>
</div>
  <!--Google Maps-->

@endsection

@push('scripts')
<script>
    $(document).ready(function () {
        $(document).on('click', '#contactusbtn', function (e) {
            e.preventDefault();
            var data = {
                'name': $('#name').val(),
                'email': $('#email').val(),
                'phone': $('#phone').val(),
                'subject': $('#subject').val(),
                'message': $('#message').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/contactstore",
                data: data,
                dataType: "json",
                success: function (response) {
                    // console.log(response);
                    if (response.status == 400) {
                        $.each(response.error, function (key, err_val) {
                            $('#'+'e'+ key).text(err_val);
                        });
                    }
                    else {
                        swal({
                                title: "Message Sent Successfully",
                                text: "We will contact you soon. Thank You",
                                icon: "success",
                                button: "Close!",
                            });
                        $('#contactForm').trigger("reset");
                    }
                }

            });
        });
    });
</script>
@endpush