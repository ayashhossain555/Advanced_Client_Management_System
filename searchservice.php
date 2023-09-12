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
  <!--ALERTIFY-->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css" rel="stylesheet" />
  <style>
    .form-control{
        border: 1px solid #b3a1a1 !important;
        padding: 8px 10px;
    }
  </style>
</head>



    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
       
          <h6 class="font-weight-bolder mb-0">Clients</h6>

          <form action="searchservice.php" method="GET">  
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group mb-3">
            
            
                  <input type="text" name="search" class="form-control" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>" placeholder="Search service">
                  <button type="submit" class="btn btn-danger">Search</button>
            <!--      
              <label class="form-label">Search here...</label>
              <input type="text" name="search" class="form-control">

              <input type="submit" name="submit" class="form-control">
              <button type="submit" class='btn btn-primary'> Search </button>
-->
            </div>
          </div>
          
        </div>
        </form>
      </div>
    </nav>

    <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="">
        <div class="card-header">
                <h4>Service List<h4>
            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped" id="item">
                <thead>
                    <tr>
                    <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Duration</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>
                    <tbody>
                        <?php
                          
                         if(isset($_GET['search'])){
                          $filtervalue=$_GET['search'];
                          $filterdata="SELECT * FROM service WHERE CONCAT(ID, name, description, price, duration, status) LIKE '%$filtervalue%'";
                          $run=mysqli_query($mysqli, $filterdata);
                          if(mysqli_num_rows($run)>0){
                            foreach($run as $i){

                              ?>
                              <tr>
                              <td> <?= $i['ID']; ?></td>
                                    <td> <?= $i['name']; ?></td>
                                    <td> <?= $i['description']; ?></td>
                                    <td> <?= $i['price']; ?></td>
                                    <td> <?= $i['duration']; ?></td>
                                    <td> <?= $i['status']=='1'? "Available":"Unavailable" ?></td>
                                    
                                    <td><a href="editservice.php?ID=<?= $i["ID"]; ?>" class="btn btn-primary">Edit</a> 
                                    </td>
                                    <td>
                                    <form action="deleteservice.php" method="POST">
                                        <input type="hidden" name="service_id" value="<?= $i['ID']; ?>">
                                        <button type="submit" class="btn btn-danger" name="delete_btn">Delete</button>
                                     </form>
                                    </td>
                              </tr>
                              <?php

                            }

                          }
                          else{
                            ?>
                            <tr>
                              <td colspan="11">search not found</td>

                            <?php
                             
                          }
                         }  

                        
                   ?>
                    </tbody>
                </thead>
              </table>
            </div>
            <div class="col-md-12">
            <a href="addservice.php" class="btn btn-primary">Add service</a>
            </div>
        </div>
      </div>
    
    </div>
</div>    



 <!--   Core JS Files   -->
 <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
  <script src="assets/js/search.js"></script>
  <!--ALERTIFY-->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
    <?php
         if (isset($_SESSION["message"])){
     alertify.set('notifier','position', 'top-center');
    alertify.success();
         }
         ?>
  </script>
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