<?php
   session_start();
   include_once "./dbconnection.php";
   include_once "./sidebar_customer.php";

   if(isset($_SESSION["user_id"])){
    $sql="SELECT * FROM clients WHERE ID={$_SESSION["user_id"]}";
    $result= $mysqli->query($sql);
    $user=$result->fetch_assoc();
   }

?>
<?php
if (isset($_POST["editclient"])){
  $client_id=$_POST['client_id']  ;
  $name=$_POST['name'];
  $email=$_POST['email'];
  
  $mobile=$_POST['mobile'];
  $permail=$_POST['permail'];
  $organization=$_POST['organization'];
  $facebook=$_POST['facebook'];
  $twitter=$_POST['twitter'];
  $linkdin=$_POST['linkdin'];
  $othersocial=$_POST['othersocial'];

  $query="UPDATE clients SET
  name= '$name', email='$email', mobile='$mobile', permail='$permail', organization='$organization', facebook='$facebook', twitter='$twitter', linkdin='$linkdin', othersocial='$othersocial' 
  WHERE ID='$client_id'";

  $run= mysqli_query($mysqli, $query);

  if($query){
    $_SESSION['message']="Updated successfully";
    header("Location: customer_dashboard.php? Updated successfully");
    exit();
  }
  else{
    $_SESSION['message']="something went wrong";
    header("Location: customer_dashboard.php");
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
    Dashboard
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
       
          <h6 class="font-weight-bolder mb-0">Edit profile</h6>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              <label class="form-label">Type here...</label>
              <input type="text" class="form-control">
            </div>
          </div>
          
        </div>
      </div>
    </nav>

<div class="container">
    <div class="row">
      <div class="col-md-12">
        <?php
        if(isset($_GET["ID"])){
            $id= $_GET["ID"];
             $query="SELECT * FROM clients WHERE ID='$id'";
             $run=mysqli_query($mysqli, $query);
             if(mysqli_num_rows($run)>0){

                $data=mysqli_fetch_array($run);
             
        ?>
        <div class="card">
            <div class="card-header">
                <h4>Edit Profile<h4>
            </div>
            <div class="card-body">
              <form action="editclient.php" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <input type="hidden" name="client_id" value="<?= $user["ID"]?>">
                <label for="">Name</label>
                <input type="text" name="name" value="<?= $user["name"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Email</label>
                <input type="text" name="email" value="<?= $user["email"]?>" placeholder="Name" class="form-control">
            </div>
            
            <div class="col-md-12">
                <label for="">Contact No.</label>
                <input type="text" name="mobile" value="<?= $user["mobile"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Alternate email</label>
                <input type="text" name="permail" value="<?= $user["permail"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Organization</label>
                <input type="text" name="organization" value="<?= $user["organization"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Facebook Profile</label>
                <input type="text" name="facebook" value="<?= $user["facebook"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Twitter</label>
                <input type="text" name="twitter" value="<?= $user["twitter"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Linkdin</label>
                <input type="text" name="linkdin" value="<?= $user["linkdin"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Other social medias</label>
                <input type="text" name="othersocial" value="<?= $user["othersocial"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name=editclient>Save</button>
              <a href="customer_dashboard.php" class="btn btn-primary">Back</a> 
            </div>
            </form>
            </div>
        </div>
        <?php
         }
         else{
            echo"Category not found";
         }
        }
        else{
            echo"ID nai";
        }

        ?>
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