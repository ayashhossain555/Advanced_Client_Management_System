<?php
   session_start();
   include_once "./dbconnection.php";
   include_once "./sidebar.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>
    Admin Dashboard
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
<ul >
<div class="row">
  <div class="col-lg-7 position-relative z-index-2">
    <div class="card card-plain mb-4">
      <div class="card-body p-3">
        
      </div>
    </div>
    <div class="row">
      <div class="">

      <li>
        <div class="">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">weekend</i>
    </div>
    <div class="text-end pt-1">
      <p class="ms-1 font-weight-bold text-black">Clients</p>
      <h4 class="mb-0">
      
                    <?php
                        $sql="SELECT * from clients";
                        $result=$mysqli-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) { 
                    
                                $count=$count+1;
                            
                        }
                    }      
                        echo $count;
                    ?>
      </h4>
    </div>
  </div>
</div>
  
</div>
                  </li>

<li style="right: 50px">

        <div class="">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary shadow text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">leaderboard</i>
    </div>
    <div class="text-end pt-1">
      <p class="ms-1 font-weight-bold text-black">Services</p>
      <h4 class="mb-0">
      <?php
                        $sql="SELECT * from service";
                        $result=$mysqli-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) { 
                    
                                $count=$count+1;
                            
                        }
                    }      
                        echo $count;
                    ?>
      </h4>
    </div>
  </div>

  </div>
  
</div>

      </div>

                  </li>

      <li style="right: 50px;">
      <div class="">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">store</i>
    </div>
    <div class="text-end pt-1">
      <p class="ms-1 font-weight-bold text-black ">Office Members</p>
      <h4 class="mb-0 ">
      <?php
                        $sql="SELECT * from offmember";
                        $result=$mysqli-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) { 
                    
                                $count=$count+1;
                            
                        }
                    }      
                        echo $count;
                    ?>
      </h4>
    </div>
  </div>

 
</div>
                  </li>

<li style="right: 50px;">
        <div class="">
        <div class="card  mb-2">
  <div class="card-header p-3 pt-2 bg-transparent">
    <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
      <i class="material-icons opacity-10">person_add</i>
    </div>
    <div class="text-end pt-1">
      <p class="ms-1 font-weight-bold text-black ">Service orders</p>
      <h4 class="mb-0 ">
      <?php
                        $sql="SELECT * from orders";
                        $result=$mysqli-> query($sql);
                        $count=0;
                        if ($result-> num_rows > 0){
                            while ($row=$result-> fetch_assoc()) { 
                    
                                $count=$count+1;
                            
                        }
                    }      
                        echo $count;
                    ?>

      </h4>
    </div>
  </div>
</div>
  
</div>
                  </li>

      </div>
    </div>
                  </ul>
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