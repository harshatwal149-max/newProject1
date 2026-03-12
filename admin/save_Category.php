<?php
session_start();
include('database.php');

$category = $_POST['category'];
$status   = $_POST['status'];

mysqli_query($conn, "INSERT INTO categories (category_name, status) VALUES ('$category','$status')");
 $_SESSION['success'] = "Category saved successfully!";
header("Location: category_page.php");

exit;
