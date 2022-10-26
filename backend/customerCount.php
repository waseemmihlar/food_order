<?php include('config/dbconnect.php'); ?>
<?php
$count_query = "SELECT * FROM customer";
if ($result = mysqli_query($con, $count_query)) {
    $row_count  = mysqli_num_rows($result);
} else {
    echo "Please Check Query";
}
?>