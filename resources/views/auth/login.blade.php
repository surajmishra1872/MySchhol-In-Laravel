@extends('layouts.app')
@section('title', 'Admin Login')
@section('content')
<div class="form-bg">
  <div class="container">
      <div class="row">
          <center>
          <div class="col-md-offset-3 col-md-6 p-4 ">
              <form class="form-horizontal" id="login_form" action="{{ route('login') }}" method="post">
                @csrf
                  <span class="heading">Log In</span>
                  <div class="form-group">
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                      <i class="fa fa-user"></i>
                  @error('email')
                  <p class="text-danger">{{ $message }}</p>
                   @enderror
                  </div>
                
                  <div class="form-group help">
                      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                      <i class="fa fa-lock"></i>
                      <a href="#" class="fa fa-question-circle"></a>
                      @error('password')
                      <p class="text-danger">{{ $message }}</p>
                       @enderror
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-default ">log in</button>
                  </div>
              </form>
          </div>

          @error('failed')
          <strong class="text-danger" style="margin-top:-50px;">{{ $message }}</strong>
          @enderror
      </center>
      </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('#login_form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    minlength: 8,
                    required: true
                },
            },
            messages: {
                email: {
                        required: "Please enter a email",
                        email: "Please enter valid email",
                        maxlength: "Email cannot be more than 50 characters,Please enter valid email",
                    },
                    password: {
                        required: "Please enter password",
                        minlength: "Password must be at least 8 characters,Please enter valid password"
                    },
                },
            // highlight: function(element) {
            //     $(element).addClass('error');
            //     $(element).css("border", " 1px solid red")
            // }
        });
    });
 

</script>
@endpush