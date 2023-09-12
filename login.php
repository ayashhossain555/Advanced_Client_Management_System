<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/dbconnection.php";
    
    $sql = sprintf("SELECT * FROM clients
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
	
    
    if($user){
		if (password_verify($_POST['password'], $user['password'])){
			session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["ID"];
            
            header("Location: customer_dashboard.php");
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
	
        <form id="login_form" class="form_class" method="post">
            <div class="form_div">
				<div class="hh"><h2 align="center">Customer Login</h2></div>
				<?php if ($is_invalid): ?>
                  <em>Invalid login</em>
                <?php endif; ?>
				<label>Email:</label>
                <input class="field_class" name="email" type="text" placeholder="Enter email"  value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
                <label>Password:</label>
                <input id="pass" class="field_class" name="password" type="password" placeholder="password">
                <button class="submit_class" type="submit" form="login_form">Enter</button>
            </div>
            <div class="info_div">
                <h5>Login as an <a href="adminlog.php" >Admin </a><h5>
            </div>
        </form>
    </main>
    <footer>
	
</body>
</html>