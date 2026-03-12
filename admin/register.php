<?php session_start(); ?>
<?php include('header.php'); ?>
<?php include('sidebar.php'); ?>
<?php include('database.php'); ?>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 120px);">
        <div class="col-md-5 col-sm-11 col-lg-4">

            <div class="card shadow register-card">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <div class="brand">🍎 FRUITKHA</div>
                        <p class="text-muted mb-0">Create your account</p>
                    </div>
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
                        unset($_SESSION['success']);
                    }
                    ?>
                    <?php
                    $q = mysqli_query($conn, "SELECT id, name, email , password FROM users");
                    $sr_no = 1;
                    while ($row = mysqli_fetch_assoc($q))
                    ?>
                    <form method="post" action="save_register.php">
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Create password" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-fruitkha">Register</button>
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
<?php include('footer.php'); ?>