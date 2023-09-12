<?php
   session_start();
   include_once "./dbconnection.php";
   include_once "./sidebar.php";



?>
<?php
if (isset($_POST["editorder"])){
  $oid=$_POST['order_id'];   
  $offmemberid=$_POST['offmemberid'];
  $date=$_POST['date'];
  $status=isset($_POST['status'])? '1':'0';
  $work=isset($_POST['work'])? '1':'0';
  $pay=isset($_POST['pay'])? '1':'0';
  

  $query="UPDATE orders SET
  offmemberid='$offmemberid', date='$date', status='$status', work='$work', pay='$pay'
  WHERE OID='$oid'";

  $run= mysqli_query($mysqli, $query);

  $offmember="UPDATE orders
  INNER JOIN offmember ON orders.offmemberid = offmember.ID
  SET orders.oname = offmember.name ";

  $runn= mysqli_query($mysqli, $offmember);

  $offmember="UPDATE orders
  INNER JOIN offmember ON orders.offmemberid = offmember.ID
  SET orders.omail = offmember.mail ";

  $runn= mysqli_query($mysqli, $offmember); 

  $offmember="UPDATE orders
  INNER JOIN offmember ON orders.offmemberid = offmember.ID
  SET orders.ophone = offmember.phone ";

  $runn= mysqli_query($mysqli, $offmember); 

  if($query){
    $_SESSION['message']="Updated successfully";
    header("Location: clientorder.php");
    exit();
  }
  else{
    $_SESSION['message']="something went wrong";
    header("Location: clientorder.php");
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
       
          <h6 class="font-weight-bolder mb-0">Service Orders</h6>

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
        if(isset($_GET["OID"])){
            
            $id= $_GET["OID"];
             $query="SELECT * FROM orders WHERE OID='$id'";
             $run=mysqli_query($mysqli, $query);
             if(mysqli_num_rows($run)>0){

                $data=mysqli_fetch_array($run);
             
        ?>
        <div class="card">
            <div class="card-header">
                <h4>Edit order<h4>
            </div>
            <div class="card-body">
              <form action="editorder.php" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
              <input type="hidden" name="order_id" value="<?= $data["OID"]?>"> 

              <label for="">Order ID:</label>
                <label style="black">"<?php echo $data["OID"]; ?>"</label>  
            </div>
            <div>
                <label for="">Client ID:</label>
                <label style="black">"<?php echo $data["ID"]; ?>"</label> 
            </div>
            <div>
                <label for="">Service Name:</label>
                <label style="black">"<?php echo $data["sname"]; ?>"</label> 
            </div>
            <div>
                <label for="">Requested Date:</label>
                <label style="black">"<?php echo $data["reqdate"]; ?>"</label> 
            </div>
            <div>
                <label for="">Meeting Agenda:</label>
                <label style="black">"<?php echo $data["agenda"]; ?>"</label> 
            </div>
            <p>_____________________________________________________________________________________________________________________________________________________________________</p>
            <div class="col-md-12">
                <label for="">Select Office Member</label>
                <select name="offmemberid" value="<?= $data["offmemberid"]?>" class="form-control">
                    <?php
                    
                    $query="SELECT * FROM offmember";
                    $run=mysqli_query($mysqli, $query);
                    ?>  
                  <option value="<?php echo $data["offmemberid"];?>"><?php echo $data["offmemberid"];?></option>

                  <?php while($row1 = mysqli_fetch_array($run)):
                   

                   if($row1[0] != $data["offmemberid"]):
                    {
                   ?>

                  <option value="<?php echo $row1[0];?>"><?php echo $row1[3];?></option>
                  
                  <?php 
                  } 
                
                     endif;?>
                 
                  <?php endwhile;?>
                    
                   
                    
               </select>    
            </div>
            <div class="col-md-12">
                <label for="">Fix meeting date</label>
                <input type="datetime-local" name="date" value="<?= $data["date"]?>" placeholder="Name" class="form-control">
            </div>
            <div class="col-md-12">
                <label for="">Approving?</label>
                <input type="checkbox" name="status" <?= $data["status"]? "checked":""?>>
            </div>
            <div class="col-md-12">
                <label for="">Progress?</label>
                <input type="checkbox" name="work" <?= $data["work"]? "checked":""?>>
            </div>
            <div class="col-md-12">
                <label for="">Paid?</label>
                <input type="checkbox" name="pay" <?= $data["pay"]? "checked":""?>>
            </div>
            
            
            
            
            <div class="col-md-12">
              <button type="submit" class="btn btn-primary" name=editorder>Save</button>
              <a href="clientorder.php" class="btn btn-primary">Back</a> 
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