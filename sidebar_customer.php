<?php
   include_once "./dbconnection.php";

   if(isset($_SESSION["user_id"])){
    $sql="SELECT * FROM clients WHERE ID={$_SESSION["user_id"]}";
    $result= $mysqli->query($sql);
    $user=$result->fetch_assoc();
   }

?>


<!--Sidebar -->
<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" " target="_blank">
        
        <span class="ms-1 font-weight-bold text-white">
        <?php if (isset($user)): ?>
        
        <p class="ms-1 font-weight-bold text-white">Hello <?= htmlspecialchars($user["name"]); 
          htmlspecialchars($user["email"]); ?></p>
        
        <?php endif; ?>

        </span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link text-white " href="customer_dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="servicetable_customer.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Our services</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="requestorder.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Request order</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="clientorder_customer.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">Your orders</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="sidenav-footer position-absolute w-100 bottom-0 ">
    <div class="mx-3">
            <a href="editclient.php?ID=<?= $user["ID"]; ?>" class="btn bg-gradient-primary mt-4 w-100">Edit Profile</a> 
        </div>
        
        <div class="mx-3">
            <a class="btn bg-gradient-primary mt-4 w-100" href="logout.php" type="button">Log Out</a>
        </div>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">