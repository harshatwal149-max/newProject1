<?php
session_start();
include('database.php');

if (!isset($_POST['category_id'], $_POST['sub_category_name'], $_POST['status'])) {
  die("Invalid Request");
}

$category_id = $_POST['category_id'];
$sub_name    = $_POST['sub_category_name'];
$status      = $_POST['status'];

mysqli_query($conn, "INSERT INTO sub_categories (category_id, sub_category_name, status)
VALUES ('$category_id', '$sub_name', '$status')");
 $_SESSION['success'] = "sub Category saved successfully!";
header("Location: sub_category_Page.php");
exit;
