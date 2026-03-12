<?php
session_start();
include('admin/database.php');

$product_id = $_GET['id'];

mysqli_query($conn, "INSERT INTO carts (product_id, quantity) VALUES ('$product_id',1)");
$_SESSION['success'] = "Category saved successfully!";
header("Location: carts.php");

exit;
?>