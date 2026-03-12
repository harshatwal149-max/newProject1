
<?php
session_start();

include('admin/database.php');?>

<?php


$name = $_POST['name'];
$email   = $_POST['email'];
$password   = $_POST['password'];
$mainpassword=password_hash($password,PASSWORD_DEFAULT);

mysqli_query($conn,"INSERT INTO users (name,email,password) 
VALUES ('$name','$email','$password')");
 $_SESSION['success'] = "Data saved successfully!";
header("Location: register.php");
exit;
?>