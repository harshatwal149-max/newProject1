<?php
session_start();
if(!isset($_SESSION['loggedin'])){
  header("Location:login.php");
}
?>
<?php
include('header.php');
include('admin/database.php');
?>

<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Category</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="product-section mt-150 mb-150">
	<div class="container">

		<div class="row">
			<div class="col-md-12">
				<div class="product-filters">
					<ul>
						<?php
						$cat_q = mysqli_query($conn, "SELECT id, category_name FROM categories ");
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

    </div>


<?php
include('footer.php');
?>
