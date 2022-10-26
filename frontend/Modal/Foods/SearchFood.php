<?php include '../../../backend/config/dbconnect.php'; ?>
<?php include '../../main.php'; ?>
<link rel="stylesheet" href="../../style/OrderNow.css">
<div class="container mt-4">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Your Result</h1>
        </div>
    </div>



    <?php
    // Get Search value
    $search = $_POST['search'];

    // SQL Query to get foods based on search keyword
    $sql = "SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE  '%$search%'";

    // Execute Query
    $res = mysqli_query($con, $sql);

    // count the query 
    $count = mysqli_num_rows($res);

    // Check whether food avaliable or not
    if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $Id = $row['id'];
            $title = $row['title'];
            $price  = $row['price'];
            $description = $row['description'];
            $image_name = $row['image_name'];
    ?>
            <div class="col-4" data-tilt>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-5 ">
                            <img src="../../../images/Food/<?php echo $image_name ?>" class="card-img h-100 w-100">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo  $title ?></h5>
                                <p class="card-text"><?php echo $description ?></p>
                                <h4>Rs.<?php echo  $price ?></h4>
                                <a href="" class="btn btn-outline-success round-4 rounded-pill mt-3">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php
        }
    } else {
        $_SESSION['S-food-no'] = "Food Is Not Avaliable";
    }

?>