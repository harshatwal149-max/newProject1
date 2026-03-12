<?php
session_start();
?>
<?php
include('database.php');

$category_id      = $_POST['category_id'] ?? '';
$sub_category_id  = $_POST['sub_category_id'] ?? '';
$product_name     = $_POST['product_name'] ?? '';
$price            = $_POST['price'] ?? '';
$discount_price   = $_POST['discount_price'] ?? '';
$status           = $_POST['status'] ?? '';
if ($category_id == '' || $sub_category_id == '' || $product_name == '' || $price == '' || $status == '') {
    die("Please fill all required fields");
}
$q = mysqli_query($conn, "INSERT INTO products 
(category_id, sub_category_id, product_name, product_price, discount_price, status) VALUES ('$category_id', '$sub_category_id', '$product_name', '$price', '$discount_price', '$status')");
$_SESSION['success'] = "Products saved successfully!";
if ($q) {
    header("Location: products.php");

    echo "Product Saved Successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}
$_SESSION['success'] = "Products saved successfully!";
