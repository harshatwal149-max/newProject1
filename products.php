<?php
session_start();

include('header.php');
// session_destroy();
unset($_SESSION['title']);
?>
<?php include('admin/database.php'); 


$category_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

?>


<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <?php
                    $cat_q = mysqli_query($conn, "SELECT  category_name FROM categories where id=$category_id");
                    $cat_data = mysqli_fetch_assoc($cat_q);
                    ?>
                    <h1><?php echo $cat_data['category_name'] ?? ''; ?></h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row product-lists">
            <?php
            $q = mysqli_query($conn, " SELECT p.id,c.category_name,p.product_name,p.product_price,p.discount_price,p.status FROM products p JOIN categories c ON p.category_id = c.id   where p.category_id=$category_id
                      
                                               
                      
                      
                      ");
            $sr_no = 1;
            while ($row = mysqli_fetch_assoc($q)) {
            ?>
                <div class="col-lg-4 col-md-6 text-center">
                            <a href="productsDetail.php?id=<?php echo $row['id']; ?>">

                    <div class="single-product-item">
                        <div class="product-image">
                                <img src="assets/img/products/product-img-1.jpg" alt="">
                       

                        </div>
                        <h3><?php echo "{$row['product_name']}" ?></h3>
                        <p class="product-price"><span>$<?php echo "{$row['discount_price']}" ?> <del>$<?php echo "{$row['product_price']}" ?></del></p>
                        <p class="category_name"><span><?php echo "{$row['category_name']}" ?> </p>
                        <a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </a>
                    </div>
                </div>
            <?php
            };
            ?>
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/1.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/2.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/3.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/4.png" alt="">
                    </div>
                    <div class="single-logo-item">
                        <img src="assets/img/company-logos/5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('footer.php') ?>