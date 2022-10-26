<?php
session_start();
include '../main.php';
include '../../backend/config/dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register-Page</title>
    <link rel="stylesheet" href="../style/main.css">

<body>
    <div class="container col-xs-12">
        <div class="row">
            <!-- Left Section -->
            <?php include('../message.php'); ?>
            <div class="col-md-6 mb-3 logo col-xs-12 ">

                <img src="../../images/./icon/./logo.jpg" alt="" style="padding: 0 0 0 6rem;">
            </div>
            <!-- Left Section -->

            <!-- Right Section -->
            <div class="col-md-6 register col-xs-12 ">
                <h3 class="sign-text mb-3">Sign Up</h3>
                <form action="../../backend/registerCode.php" method="POST" class="register-head">
                    <div class="form-group">
                        <label for="fname">First Name</label>
                        <input type="text" name="fname" class="form-control" ">
                    </div>
                    <div class=" form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class=" form-group mt-2">
                        <label for="number">Phone Number</label>
                        <input type="number" name="number" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label for="rpassword">Re-Password</label>
                        <input type="password" name="rpassword" class="form-control">
                    </div>
                    <div class="form-group d-grid gap-2 col-6 mx-auto">

                        <button type="submit" name="register_btn" class="btn btn-primary">Register Now</button>
                    </div>
                </form>
            </div>
            <!-- END Right Section -->
        </div>
    </div>

</body>

</html>