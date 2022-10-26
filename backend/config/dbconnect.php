<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "e_hungry";


// creating constants variable
// ob_start();
// define('SITEURL', 'http://localhost:8080/Projects/food_order/');
// ob_clean();
$con = mysqli_connect("$host", "$user", "$pass", "$database");


if (!$con) {
    header("Location: ../../error/dberror.php");
    die();
}
