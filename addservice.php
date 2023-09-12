<?php
   session_start();
   include_once "./dbconnection.php";
   include_once "./sidebar.php";

?>
<?php
if (isset($_POST["addservice"])){
  $name=$_POST['name'];
  $description=$_POST['description'];
  $price=$_POST['price'];
  $duration=$_POST['duration'];
  $status=isset($_POST['status'])? '1':'0';
 

  
  $query="INSERT INTO service
  (name, description,price, duration, status) 
  VALUES ('$name', '$description', '$price', '$duration', '$status')";

  
  $run= mysqli_query($mysqli, $query);

  if($query){
    $_SESSION['message']="Added successfully";
    header("Location: servicetable.php");
    exit();
  }
  else{
    $_SESSION['message']="something went wrong";
    header("Location: servicetable.php");
    exit();
  }
}
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
       
          <h6 class="font-weight-bolder mb-0">Add service</h6>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              
            </div>
          </div>
          
        </div>
      </div>
    </nav>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Service<h4>
            </div>
            <div class="card-body">
              <form action="addservice.php" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <label for="">Name</label>
                <input type="text" name="name" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Description</label>
                <input type="text" name="description" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Price</label>
                <input type="text" name="price" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Duration</label>
                <input type="text" name="duration" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Status</label>
                <input type="checkbox" name="status">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name=addservice>Add</button>
              <a href="servicetable.php" class="btn btn-primary">Back</a> 
            </div>
            </form>
            </div>
        </div>
      </div>
    

    </div>
</div>


 <!--   Core JS Files   -->
 <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/perfect-scrollbar.min.js"></script>
  <script src="assets/js/smooth-scrollbar.min.js"></script>
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