<?php include('header.php');
include('admin/database.php'); ?>

<div class="breadcrumb-section breadcrumb-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 offset-lg-2 text-center">
				<div class="breadcrumb-text">
					<p>Fresh and Organic</p>
					<h1>Cart</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- end breadcrumb section -->
<!-- cart -->
<div class="cart-section mt-150 mb-150">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-12">
				<div class="cart-table-wrap">
					<?php
					if (isset($_SESSION['success'])) {
						echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
						unset($_SESSION['success']);
					}
					?>
					<form action="update_cart.php" method="POST">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$q = mysqli_query($conn, " SELECT c.id, product_name , product_price , quantity FROM carts c JOIN products p 
			ON c.product_id = p.id   ");
								$sr_no = 1;
								while ($row = mysqli_fetch_assoc($q)) {
								?>
									<tr class="table-body-row">
										<td class="product-remove"><a href="delete_cart.php?id=<?php echo $row['id']; ?>"><i class="far fa-window-close"></i></a></td>
										<td class="product-image"><img src="assets/img/products/product-img-1.jpg" alt=""></td>
										<td class="product-name"><?php echo $row['product_name'] ?></td>
										<td class="product-price"><?php echo $row['product_price'] ?></td>
										<td class="product-quantity"><input type="number" name="quantity[<?php echo $row['id']; ?>]"value="<?php echo $row['quantity']; ?>"min="1"></td>
										<td class="product-total"><?php echo $row['product_price'] * $row['quantity']; ?></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
				</div>
			</div>

			<?php
			$subtotal = 0;
			$query = "SELECT carts.quantity, product_price FROM carts  INNER JOIN products ON carts.product_id = products.id";
			$result = mysqli_query($conn, $query);
			while ($row = mysqli_fetch_assoc($result)) {
				$price = $row['product_price'];
				$quantity = $row['quantity'];
				$itemTotal = $price * $quantity;
				$subtotal = $subtotal + $itemTotal;
			}
			$total = $subtotal;
			?>
			<div class="col-lg-4">
				<div class="total-section">
					<table class="total-table">
						<thead class="total-table-head">
							<tr class="table-total-row">
								<th>Total</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr class="total-data">
								<td><strong>Subtotal: </strong></td>
								<td>$<?php echo $subtotal;?></td>
							</tr>
                        <tr class="total-data">
								<td><strong>Shipping Charges: </strong></td>
								<td>Free</td>
							</tr>
							<tr class="total-data">
								<td><strong>Total: </strong></td>
								<td>$<?php echo $total; ?></td>
							</tr>
						</tbody>
					</table>
					<div class="cart-buttons">
						<input type="submit" value="Update Cart" class="boxed-btn">
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php
include('footer.php') ?>