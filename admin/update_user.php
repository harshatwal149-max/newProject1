<?php
include('database.php');
$id    = $_POST['id'];
$name    = $_POST['name'];
$email   = $_POST['email'];
$password   = $_POST['password'];

mysqli_query($conn, "UPDATE users SET  name='$name',email='$email',password='$password' WHERE id=$id
");
header("Location: users.php");
exit;
?>