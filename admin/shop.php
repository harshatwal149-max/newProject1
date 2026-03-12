<?php
include('header.php');
?>
<?php include('admin/database.php'); ?>


<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Shop</h1>
				</div>



			</div>
		</div>
	</div>
</div>

<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="product-filters">
					<ul>
						<?php
						$cat_q = mysqli_query($conn, "SELECT id, category_name FROM categories");
						while ($cat = mysqli_fetch_assoc($cat_q)) {
						?>
							<a href="products.php?id=<?php echo $cat['id']; ?>" class="text-capitalize" >
								<?php  echo "{$cat['category_name']}" ?>
</a>
						<?php } ?>

					</ul>
				</div>
			</div>
		</div>

		<div class="row product-lists">
			<?php
			$q = mysqli_query($conn, " SELECT p.id,c.category_name,sc.sub_category_name,p.product_name,p.product_price,p.discount_price,p.sub_category_id,p.status FROM products p JOIN categories c ON p.category_id = c.id   JOIN sub_categories sc ON p.sub_category_id = sc.id  
                      
                                               
                      
                      
                      ");
			$sr_no = 1;
			while ($row = mysqli_fetch_assoc($q)) {
			?>
				<div class="col-lg-4 col-md-6 text-center">
					<div class="single-product-item">
						<div class="product-image">
							<a href="productsDetail.php?id=<?php echo $row['id'];?>"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
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