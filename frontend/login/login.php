<?php session_start() ?>
<?php require_once '../main.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Page</title>
    <link rel="stylesheet" href="../style/Login.css">

<body>
    <div class="container col-xs-12">
        <div class="row">
            <!-- Left Section -->
            <div class="col-md-6 mb-3 logo col-xs-12 ">
                <img src="../../images/./icon/./logo.jpg" alt="" style="padding: 0 0 0 6rem;">
            </div>
            <!-- Left Section -->

            <!-- Right Section -->
            <div class="col-md-6 register col-xs-12 ">
                <h3 class="sign-text mb-3">Sign In</h3>
                <?php include '../message.php' ?>
                <form action="../../backend/loginCode.php" method="POST" class="register-head">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>

                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group mt-1">
                        <p>Don't Have a account? <a href="../register/register.php">Signup</a></p>
                    </div>

                    <div class="form-group d-grid gap-2 col-6 mx-auto">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>

                    </div>
                </form>
            </div>
            <!-- END Right Section -->
        </div>
    </div>
</body>

</html>