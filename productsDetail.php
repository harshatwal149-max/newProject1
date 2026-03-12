<?php
include('header.php');
include('admin/database.php');



$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$q = mysqli_query($conn, " SELECT p.id,c.category_name,p.product_name,p.product_price,p.discount_price,p.status FROM products p JOIN categories c ON p.category_id = c.id   where p.id=$product_id");
$product = mysqli_fetch_assoc($q);

?>
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>Fresh and Organic</p>
                    <h1><?php echo $product['product_name']; ?></h1>
                </div>
            


            </div>
        </div>
    </div>
</div>

<!-- end breadcrumb section -->

<!-- single product -->
<div class="single-product mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="single-product-img">
                    <img src="assets/img/products/product-img-5.jpg" alt="">
                </div>
            </div>
            <div class="col-md-7">
                <div class="single-product-content">
                    <h3><?php echo $product['product_name']; ?></h3>
                    <p class="single-product-pricing"> ₹<?php echo $product['discount_price']; ?>
                        <del>₹<?php echo $product['product_price']; ?></del>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum.</p>
                    <div class="single-product-form">
                        <form action="/">
                            <input type="number" placeholder="0">
                        </form>
                        <a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                        <p><strong>Categories: </strong><?php echo $product['category_name'] ?></p>
                    </div>
                    <h4>Share:</h4>
                    <ul class="product-share">
                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                        <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single product -->

<!-- more products -->
<div class="more-products mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Related</span> Products</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae option.</p>
                </div>
            </div>
        </div>
        <div class="row">
          <?php
			$q = mysqli_query($conn, " SELECT p.id,c.category_name,sc.sub_category_name,p.product_name,p.product_price,p.discount_price,p.sub_category_id,p.status FROM products p JOIN categories c ON p.category_id = c.id   JOIN sub_categories sc ON p.sub_category_id = sc.id  
                      
                                               
                      
                      
                      ");
			$sr_no = 1;
			while ($row = mysqli_fetch_assoc($q)) {
			?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="productsDetail.php?id=<?php echo $row['id']; ?>"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
						</div>
						<h3><?php echo "{$row['product_name']}" ?></h3>
						<p class="product-price"><span>$<?php echo "{$row['discount_price']}" ?> <del>$<?php echo "{$row['product_price']}" ?></del></p>
						<p class="category_name"><span><?php echo "{$row['category_name']}" ?> </p>
						<a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
					</div>
				</div>
			<?php
			};
			?>
        
        </div>
    </div>
</div>



<!-- end more products -->

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


<?php include('footer.php'); ?>