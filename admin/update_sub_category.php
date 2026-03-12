<?php
session_start();
?>
<?php
include('database.php');
$sub_category_name  = $_POST['sub_category_name'];
$status = $_POST['status'];
$id=$_POST['id'];
mysqli_query($conn, "UPDATE sub_categories SET sub_category_name='$sub_category_name',status='$status' WHERE id=$id");
header("Location:sub_category_page.php");
 $_SESSION['success'] = "updated sub Category successfully!";
exit;
?>