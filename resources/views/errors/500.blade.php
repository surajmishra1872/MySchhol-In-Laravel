
<!doctype html>
<html lang="en" dir="ltr">

    <head>
        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />

        <!-- favicon -->
        
        <!-- Css -->
        <!-- Bootstrap Css -->
        <link href="{{asset('error/bootstrap.min.css')}}" class="theme-opt" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <!-- Style Css-->
        <link href="{{asset('error/style.min.css')}}" class="theme-opt" rel="stylesheet" type="text/css" />
    </head>

    <body>        
        
        <!-- ERROR PAGE -->
        <section class="bg-home d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-12 text-center">
                        <img src="{{asset('error/500.jpg')}}" class="img-fluid" alt="" height="450" width="450">
                        <div class="text-uppercase mt-4 display-3">Oh ! no</div>
                        <div class="text-capitalize text-dark mb-4 error-page">Its not you its us.</div>
                    </div><!--end col-->
                </div><!--end row-->

                <div class="row">
                    <div class="col-md-12 text-center">  
                        <a href="javascript:history.back()" class="btn btn-outline-primary mt-4">Go Back</a>
                        <a href="{{url('/')}}" class="btn btn-primary mt-4 ms-2">Go To Home</a>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- ERROR PAGE -->
    </body>
</html>