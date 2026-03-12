<?php
session_start();
?>
<?php
include('database.php');
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$discount_price = $_POST['discount_price'];
$status = $_POST['status'];
$id = $_POST['id'];
mysqli_query($conn, "UPDATE products SET product_name='$sub_category_id',product_name='$product_name',product_price='$product_price',discount_price='$discount_price',status='$status' WHERE id=$id");
header("Location:products.php");
$_SESSION['success'] = "update Products successfully!";
exit;
