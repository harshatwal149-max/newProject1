<?php session_start();
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

        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header">
                              <?php
                if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
    unset($_SESSION['success']); 
}
?>
              <h3 class="card-title">Leads</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered" role="table">
                <thead>
                  <tr>
                    <th style="width: 10px" scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Edit/Delete</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $q = mysqli_query($conn, "SELECT id, name,email,phone,message,subject  FROM contacts ");
                  $sr_no = 1;
                  while ($row = mysqli_fetch_assoc($q)) {
                    echo "<tr >
                       
                       <td>{$sr_no}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['subject']}</td>
                        <td>{$row['message']}</td>
                       <td> <a href='edit_contact.php?id={$row['id']}' class='btn btn-sm btn-primary'>Edit</a>
                        <a href='delete_contact.php?id={$row['id']}' class='btn btn-sm btn-danger'>Delete</a></td>
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