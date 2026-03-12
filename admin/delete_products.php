<?php
session_start();
?>
<?php
include('database.php');
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM  products WHERE id=$id");
header("Location:products.php");
$_SESSION['success'] = "delete Products successfully!";
exit;
?>
