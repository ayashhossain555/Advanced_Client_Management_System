<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/dbconnection.php";
    
    $sql = "SELECT * FROM admin WHERE email = 'admin@gmail.com'";
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
	
    
    if($user){
		if ($_POST['password'] === $user['password']){
			session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["ID"];
            
            header("Location: admin_dash.php");
            exit;
		}
	}
	$is_invalid=true;
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Client Management System||Login Page</title>

	<!-- lined-icons -->
	<link rel="stylesheet" href="assets/css/log.css" type='text/css' />
	<!-- //lined-icons -->
	
</head> 
<body>
  
	
    <main>
	
        <form id="login_form" class="form_class"  method="post">
            <div class="form_div">
                <label>Admin login verification Password:</label>
            
                
            
               
                <input id="pass" class="field_class" name="password" type="password" placeholder="Only admins can enter">
                <button class="submit_class" type="submit" form="login_form">Entrar</button>
            </div>
            <div class="info_div">
                <h5>Login as a <a href="login.php" >Customer </a><h5>
                <h5>Back to  <a href="index.php" >Homepage </a><h5>    
            </div>
        </form>
    </main>
    
	<script src="assets/js/log.js"></script>
</body>
</html>