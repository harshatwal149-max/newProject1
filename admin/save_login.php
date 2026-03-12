<?php
session_start();
include('database.php');

$email = $_POST['email'];
$password   = $_POST['password'];
// var_dump($email);
// die;

$result = mysqli_query($conn, "select * from users where email='$email' and password='$password' and role='admin'");

if($result->num_rows>0){
    
    $_SESSION['loggedin']= "login successfully!";
    header("Location:../admin");
    exit();
}
 $_SESSION['failed'] = "Login Failed";
header("Location: login.php");

// mysqli_query($conn, "INSERT INTO login (email, password) VALUES ('$email','$password')");
//  $_SESSION['success'] = "login successfully!";
// header("Location: login.php");

exit;
