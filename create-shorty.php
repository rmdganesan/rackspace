<?php
session_start();
if ( !isset( $_SESSION["active"] ) ) {
    header("Location: ./index.php");
} 

require __DIR__ . '/vendor/autoload.php';
use App\Lib\MySQLDB;
use App\Lib\Shorty;
$objShorty = new Shorty(new MySQLDB('mysql', 'root','root','rackspace'));
$datas = $objShorty->getAll();
?>

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
    <link rel="stylesheet" href="./res/css//innerpage.css" >
    
    <title>rackspace::Demo</title>
  </head>
  <body>
  <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><?php echo $_SESSION["first_name"]. ' '. $_SESSION["last_name"]; ?></h3>
            </div>
            <ul class="list-unstyled components">
                <p>Shorty Demo</p>
                <li>
                    <a href="/create-shorty.php"> Create Shorty</a>
                </li>
                <li>
                    <a href="/create-shorty.php?info=list"> List All Shorty</a>
                </li>
          
            </ul>

            <ul class="list-unstyled components">
                <li>
                    <a href="./from-submit.php?action=logout"> Sign out</a>
                </li>

            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

               
                </div>
            </nav>
            <?php 
            $i = 1;
            if( $_GET['info'] == 'list')  { ?>
                
                <?php if(empty($datas)) { 
                    echo "<h3> no record found !</h3>";
                } else {
                    ?>

                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full URL</th>
                        <th scope="col">Short URL</th>
                        <th scope="col">Create Data</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php foreach($datas as $data): ?>
                        <tr>
                        <th scope="row"><?php echo $i++; ?></th>
                        <td><a href="<?php echo $data['url'];?>" style="text-decoration: underline;" target="_blank"> <?php echo $data['url'];?> </a> </td>
                        <td><a href="<?php echo $data['shortener'];?>" style="text-decoration: underline;" target="_blank" > <?php echo $data['shortener'];?> </a> </td>
                        <td><?php echo $data['created'];?> </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    </table>
            <?php  
                }
        } else { ?>
          
            <form class="needs-validation" action="from-submit.php?action=create-url" method="post" id="rackspace-form" novalidate>
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        
                        <div class=" text-center mr-3" id="err_div" style="display:none">
                        <h6 class="mb-0 mr-4 mt-2" id="error-message" style="color:red"></h6>
                        </div>
                        <div class=" text-center mr-3">
                          
                        </div>
                       
                    </div>
                    <div class="row px-3 mb-4">
                       
                    </div>
                    <div class="row px-3"> <label class="mb-1">
                    
                            
                            <label for="validationCustom01" class="form-label"> <h6 class="mb-0 text-sm">Full URL</h6></label>
                            
                        </label> <input class="mb-4 form-control" type="text" id="validationCustom01" name="url" placeholder="Enter a full url" required> 
                        <label class="invalid-feedback">
      Please provide a url.
    </label>
                        </div>

                    <div class="row px-3 mb-4">
                    </div>
                    <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center">Create Short URLs</button> </div>
                </div>
                </form>    
                <?php } ?>
        
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>

    <script src="./res/js/appJs.js"></script>

    
  </body>
</html>
