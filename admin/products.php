<?php 
session_start();
if(!isset($_SESSION['loggedin'])){
  header("Location:login.php");
}
include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('database.php'); ?>



<main class="app-main">
  <div class="app-content">
    <div class="container-fluid">
      <div class="row g-4">
        <div class="col-md-6">

          <div class="card card-primary card-outline mb-4">
            <div class="card-header">
              <div class="card-title">Add Product</div>
            </div>
                      <?php
                if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
    unset($_SESSION['success']); 
}
?>
                   

            <form action="saveProducts.php" method="post">
              <div class="card-body">

                <!-- Select Category -->
                <div class="mb-3">
                  <label class="form-label">Select Category</label>
                  <select name="category_id" id="category" class="form-select" required>
                    <option value="">Select Category</option>
                    <?php
                      $q = mysqli_query($conn, "SELECT id, category_name FROM categories WHERE status=1");
                      while($row = mysqli_fetch_assoc($q)){
                        echo "<option value='{$row['id']}'>{$row['category_name']}</option>";
                      }
                    ?>
                  </select>
                </div>

                <!-- Select Sub Category (Dynamic) -->
                <div class="mb-3">
                  <label class="form-label">Select Sub Category</label>
                  <select name="sub_category_id" id="sub_category" class="form-select" required>
                    <option value="">Select Sub Category</option>
                  </select>
                </div>

                <!-- Product Name -->
                <div class="mb-3">
                  <label class="form-label">Product Name</label>
                  <input type="text" name="product_name" class="form-control" required>
                </div>

                <!-- Product Price -->
                <div class="mb-3">
                  <label class="form-label">Product Price</label>
                  <input type="number" name="price" class="form-control" required>
                </div>

                <!-- Discount Price -->
                <div class="mb-3">
                  <label class="form-label">Discount Price</label>
                  <input type="number" name="discount_price" class="form-control">
                </div>

                <!-- Status -->
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>

              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save Product</button>
              </div>
            </form>

          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Products</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" role="table">
                      <thead>
                        <tr>
                          <th style="width: 10px" scope="col">#</th>
                          <th scope="col">Category</th>
                          <th scope="col">Sub Category</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Product Price</th>
                          <th scope="col">Discount Price</th>
                          <th scope="col">Status</th>
                          <th scope="col">Edit/Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                               <?php
                               
                      $q = mysqli_query($conn, " SELECT p.id,c.category_name,sc.sub_category_name,p.product_name,p.product_price,p.discount_price,p.sub_category_id,p.status FROM products p JOIN categories c ON p.category_id = c.id   JOIN sub_categories sc ON p.sub_category_id = sc.id  
                      
                                               
                      
                      
                      ");
                      $sr_no = 1;
                      while($row = mysqli_fetch_assoc($q)){
                        echo "<tr >
                       
                       <td>{$sr_no}</td>
                        <td>{$row['category_name']}</td>
                        <td>{$row['sub_category_name']}</td>
                        <td>{$row['product_name']}</td>
                        <td>{$row['product_price']}</td>
                        <td>{$row['discount_price']}</td>
                        <td>{$row['status']}</td>
                         <td> <a href='edit_products.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
                         <a href='delete_products.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a></td>
                        </tr>
                        ";
                        $sr_no++;
                      }
                    ?>
                        
                      </tbody>
                    </table>
                  </div>
                
                </div>
              
                <!-- /.card -->
              </div>
       
      </div>
    </div>
  </div>
</main>

<?php include('footer.php'); ?>

<!-- jQuery (agar header.php me already nahi hai) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
  // Category change hote hi sub category load hogi
  $('#category').change(function(){
    var category_id = $(this).val();


    $.ajax({
      url: 'get_sub_categories.php',
      type: 'POST',
      data: { category_id: category_id },
      success: function(data){
        $('#sub_category').html(data);
      }
    });
  });
</script>
