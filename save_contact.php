<?php
include('admin/database.php');

$name   = $_POST['name'];
$email = $_POST['email'];
$phone   = $_POST['phone'];
$subject   = $_POST['subject'];
$message   = $_POST['message'];

mysqli_query($conn, "INSERT INTO contacts (name, email, phone, subject, message) 
VALUES ('$name','$email','$phone','$subject','$message')");
header("Location: contact.php");
?>
