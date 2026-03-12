

<?php
session_start();
?>
<?php
include('database.php');
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM categories   WHERE id=$id");
header("Location:category_page.php");
 $_SESSION['success'] = "Delete Category successfully!";
exit;
?>