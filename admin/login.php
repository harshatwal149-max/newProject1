<?php session_start(); ?>
<?php include('database.php'); ?>
<link rel="stylesheet" href="assets/css/login.css">
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 120px);">
        <div class="col-md-4 col-sm-10">

            <div class="card shadow login-card">
                <div class="card-body p-4">
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
                        unset($_SESSION['success']);
                    }
                    if (isset($_SESSION['failed'])) {
                        echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['failed']) . '</div>';
                        unset($_SESSION['failed']);
                    }
                    ?>

                    <div class="text-center mb-4">
                        <div class="brand">🍎 FRUITKHA</div>
                        <p class="text-muted mb-0">Login to your account</p>
                    </div>

                    <form method="post" action="save_login.php">
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="mb-3" style="position:relative;">
                            <label class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter password" required>
                            <button type="button" onclick="showPassword()" style="position:absolute; right:10px; top:38px; border:none; background:none;">
                                <i id="icon" class="fa fa-eye-slash"></i>Show</button>
                        </div>

                        <script>
                            function showPassword() {
                                var pass = document.getElementById("password");

                                if (pass.type === "password") {
                                    pass.type = "text";
                                } else {
                                    pass.type = "password";
                                }
                            }
                        </script>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-fruitkha btn-sm btn-primary">Login</button>
                        </div>
                    </form>

                    <div class="text-center mt-3">
                        <small>
                            Don’t have an account?
                            <a href="register.php">Register</a>
                        </small>
                    </div>
                    <?php
                    $q = mysqli_query($conn, "SELECT id, email, password FROM users");
                    $sr_no = 1;
                    while ($row = mysqli_fetch_assoc($q))
                    ?>
                </div>
            </div>

        </div>
    </div>
</div>