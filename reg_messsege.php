<?php

if (empty($_POST["name"])) {
    die("Name is required");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}
if ( ! preg_match("/[0-9]/", $_POST["mobile"])) {
    die("Phone number must contain numbers");
}

$password_hash=password_hash($_POST["password"], PASSWORD_DEFAULT);
print_r($_POST);
var_dump($password_hash);

$mysqli = require __DIR__ . "/dbconnection.php";

$sql = "INSERT INTO clients (name, email, password, mobile)
        VALUES (?, ?, ?, ?)";
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}
$stmt->bind_param("ssss",
                  $_POST["name"],
                  $_POST["email"],
                  $password_hash,
                  $_POST["mobile"]); 
if ($stmt->execute()) {
    
    $_SESSION['message']="Updated successfully";
    header("Location: index.php");
    exit();
    
} 
else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}

?>