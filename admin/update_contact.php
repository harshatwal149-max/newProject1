<?php
include('database.php');
$id    = $_POST['id'];
$name    = $_POST['name'];
$email   = $_POST['email'];
$phone   = $_POST['phone'];
$subject = $_POST['subject'];
$message = $_POST['message'];

mysqli_query($conn, "UPDATE contacts SET  name='$name',email='$email',phone='$phone',subject='$subject', message='$message' WHERE id=$id
");
header("Location: contact.php");
exit;
?>