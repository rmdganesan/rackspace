<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" >
    <link rel="stylesheet" href="./res/css/appStyle.css" >
    
    <title>rackspace::Demo</title>
  </head>
  <body>
  <div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5" style="height: 50em;">
                    <div class="row">  </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="/res/img/logo.png" class="image"> </div>
                </div>
            </div>
            
            <div class="col-lg-6">
            <div class="row mb-4 px-3">
            </div>
            <form class="needs-validation" action="from-submit.php?action=login" method="post" id="rackspace-form" novalidate>
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        
                        <div class=" text-center mr-3" id="err_div" style="display:none">
                        <h6 class="mb-0 mr-4 mt-2" id="error-message" style="color:red">dddddd</h6>
                        </div>
                        <div class=" text-center mr-3">
                          
                        </div>
                       
                    </div>
                    <div class="row px-3 mb-4">
                       
                    </div>
                    <div class="row px-3"> <label class="mb-1">
                            
                            <label for="validationCustom01" class="form-label"> <h6 class="mb-0 text-sm">Email Address</h6></label>
                            
                        </label> <input class="mb-4 form-control" type="text" id="validationCustom01" name="email" placeholder="Enter a valid email address" required> 
                        <label class="invalid-feedback">
      Please provide a eamil id.
    </label>
                        </div>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> <input class="mb-4 form-control" type="password" name="password" placeholder="Enter password" required> 
                        <label class="invalid-feedback">
      Please provide a password.
    </label>
                        </div>
                    <div class="row px-3 mb-4">
                    </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                </div>
                </form>
            </div>
          
        </div>
        <div class="bg-blue py-4">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2019. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
    </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="./res/js/appJs.js"></script>

    
  </body>
</html>
