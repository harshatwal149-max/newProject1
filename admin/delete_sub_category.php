<?php
session_start();
?>
<?php
include('database.php');
$id=$_GET['id'];
mysqli_query($conn, "DELETE FROM sub_categories WHERE id=$id");
header("Location:sub_category_page.php");
 $_SESSION['success'] = "delete sub successfully!";
exit;
?>