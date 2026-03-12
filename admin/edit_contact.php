<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('database.php'); ?>

<main class="app-main">
  <div class="app-content">
    <div class="container-fluid">
      <div class="row g-4">
        <div class="col-md-6">
            
                               <?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                      $q = mysqli_query($conn, "SELECT  id,name,email,phone,subject,message FROM contacts WHERE id=$id");
                      while($row = mysqli_fetch_assoc($q)){
                        ?>

          <form action="update_contact.php" method="post">
            <input type="hidden" value="<?php echo $row['id'] ?>" name="id">
            <div class="card card-primary card-outline mb-4">
              <div class="card-header">
                <div class="card-title">Edit Conatct</div>
              </div>

              <div class="card-body">
                <div class="mb-3">
                  <label class="form-label"> Name</label>
                  <input type="text" name="name" value="<?php echo $row['name'] ?> " class="form-control" required>
                </div>

                <div class="mb-3">
                  <label class="form-label"> Email</label>
                  <input type="text" name="email" value="<?php echo $row['email'] ?> " class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label"> Phone</label>
                  <input type="text" name="phone" value="<?php echo $row['phone'] ?> " class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label"> Subject</label>
                  <input type="text" name="subject" value="<?php echo $row['subject'] ?> " class="form-control" required>
                </div>
                <div class="mb-3">
                  <label class="form-label">  Message</label>
                  <input type="text" name="message" value="<?php echo $row['message'] ?> " class="form-control" required>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Contact</button>
              </div>
            </div>
          </form>
<?php }
                    ?>
        </div>
    
    </div>
  </div>
</main>

<?php include('footer.php'); ?>
