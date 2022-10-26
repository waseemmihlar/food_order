<?php session_start() ?>
<?php include '../main.php'; ?>
<?php include '../../backend/config/dbconnect.php'; ?>
<link rel="stylesheet" href="../style/OrderNow.css">



<body>
    <div class="container ">
        <!-- Search Bar -->
        <?php include '../SearchBar/searchbar.php' ?>
        <!-- END Search Bar -->

        <div class="row">
            <div class="col-12">
                <h1 class="text-center mt-5 text-success">Today Menu List</h1>
            </div>
        </div>
        <?php
        if (isset($_SESSION['ok'])) {
        ?>
            <div class="alert-success" role="alert">
                <strong>Hey!</strong> <?= $_SESSION['ok']; ?>
            </div>
        <?php
            unset($_SESSION['ok']); // When refresh the webpage this alert is disrepair
        }
        ?>


        <!-- Pricing Card -->
        <div class="PricingCard ">
            <div class="row mt-4 ">
                <?php
                $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' AND featured='Yes' ";
                $res2 = mysqli_query($con, $sql2);
                $count2 = mysqli_num_rows($res2);
                if ($count2 > 0) {
                    while ($row = mysqli_fetch_assoc($res2)) {
                        $id = $row['id'];
                        $title = $row['title'];
                        $description = $row['description'];
                        $price = $row['price'];
                        $image_name = $row['image_name'];
                ?>

                        <div class="col-4" data-tilt>
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row no-gutters">
                                    <div class="col-md-5 ">
                                        <img src="../../images/Food/<?php echo $image_name; ?>" class="card-img h-100 w-100">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo  $title; ?></h5>
                                            <p class="card-text"><?php echo $description; ?></p>
                                            <h4>Rs.<?php echo  $price; ?></h4>
                                            <a href="../orderProccess/orderP.php?food_id=<?php echo $id; ?>" class="btn btn-outline-success round-4 rounded-pill mt-3">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Pricing Card -->
                <?php
                    }
                } else {
                    $_SESSION['food_av'] = "Food is Not Available";
                }
                ?>
            </div>
        </div>
    </div>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-tilt/1.7.2/vanilla-tilt.min.js" integrity="sha512-K9tDZvc8nQXR1DMuT97sct9f40dilGp97vx7EXjswJA+/mKqJZ8vcZLifZDP+9t08osMLuiIjd4jZ0SM011Q+w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>