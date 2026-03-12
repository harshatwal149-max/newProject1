<?php
session_start();
?>
<?php
include('database.php');
$id    = $_POST['id'];
$category_name   = $_POST['category'];

mysqli_query($conn, "UPDATE categories SET category_name='$category_name' WHERE id=$id");
header("Location:category_page.php");
 $_SESSION['success'] = "update Category successfully!";
exit;
?>