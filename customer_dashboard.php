<?php
   session_start();
   include_once "./dbconnection.php";
   include_once "./sidebar_customer.php";

   
   

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>
    Customer Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!--ALERTIFY -->
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css" rel="stylesheet" />
  <style>
    .form-control{
        boarder: 1px solid #b3a1a1 !important;
        padding: 8px 10px;
    }
  </style>
</head>


    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
       
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
            
            
            </div>
          </div>
          
        </div>
      </div>
    </nav>

<!--Dash -->
<div class="row">
  <div class="col-lg-7 position-relative z-index-2">
    <div class="card card-plain mb-4">
      <div class="card-body p-3">
        
      </div>
    </div>
    <div class="row">
      <div class="card">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2">
    <div >
      
      <h4 class="mb-0"> Welcome to ABC SOFT 
      </h4>
      <p>In a world where technology is the driving force behind progress, we understand the significance of staying ahead of the curve. At ABC Soft Company, we don't just adapt to change – we create it. Our passion for innovation fuels our drive to provide groundbreaking solutions that empower businesses, individuals, and communities to thrive in the digital age.</p>

      <p> With a team of visionary experts, we specialize in crafting tailor-made IT solutions that address your unique challenges and opportunities. Whether it's developing cutting-edge software, implementing robust cybersecurity measures, or harnessing the power of data analytics, we are your partners in turning possibilities into realities.</p>
 
    </div>
  </div>

  
</div>




    

 <!--   Core JS Files   -->
 <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

</body>

</html>