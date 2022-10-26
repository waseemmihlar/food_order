<?php
ob_start();
?>
<?php

include '../../backend/config/dbconnect.php';
session_start();
?>
<?php include '../main.php'; ?>
<?php
if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];

    $sql = "SELECT * FROM tbl_food WHERE id= $food_id";
    $res = mysqli_query($con, $sql);

    $count = mysqli_num_rows($res);



    if ($count == 1) {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];


        // echo $image_name;
    } else {
        echo "No data In the moments";
    }
} else {
    echo "Your get method Problem";
}
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Fill this From to confirm your order.</h1>
        </div>
    </div>

    <div class="row mt-4">

        <form action="" method="POST">
            <div class="select-food  border" style="padding:40px 40px 40px 40px;">
                <div class="col-12">
                    <h3>Select Food Section.</h3>
                </div>
                <div class="row">
                    <div class="col-6">

                        <?php
                        if ($image_name == "") {
                            // Image not Available
                            echo "Image IS no...";
                        } else {
                        ?>
                            <img src="../../images/Food/<?php echo $image_name ?>" width="50%">
                        <?php
                        }
                        ?>
                    </div>
                    <div class="col-6" style="display: flex; flex-direction: column; justify-content: center;">
                        <h2><?php echo $title; ?></h2>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">
                        <p><?php echo $price; ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <label for="number">Quantity: </label>
                        <input type="number" name="qty" value="1" class="form-control w-50">
                    </div>
                </div>
            </div>

            <div class="delivery-details mt-5  border" style="padding:40px 40px 40px 40px;">
                <div class="row">
                    <h2></h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h2> Delivery Details. </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <label for="text">Full Name:</label>
                        <input type="text" name="full-name" placeholder="E.g. Chathuri Abewicrama" class="form-control" require>

                        <label for="tel">Phone Number:</label>
                        <input type="tel" name="contact" placeholder="E.g. 071 xxx xxxx" class="form-control" require>

                        <label for="email">Email:</label>
                        <input type="email" name="email" placeholder="E.g. food@gmail.com" class="form-control" require>

                        <label for="address">Address:</label>
                        <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="form-control" require></textarea>

                        <input type="submit" name="submit" value="Confirm Order" class="btn btn-outline-success mt-4">

                    </div>
                </div>
            </div>
        </form>

        <?php
        if (isset($_POST['submit'])) {
            // echo "Btn work";
            $food = $_POST['food'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total = $price * $qty;
            $order_date = date("Y-m-d H:i:s"); //date formate
            $status = 'ordered';
            $customer_name = $_POST['full-name'];
            $customer_contact = $_POST['contact'];
            $customer_email = $_POST['email'];
            $customer_address = $_POST['address'];


            //$sql2 = "INSERT INTO order(food,price,qty,total,cdate,custatus,customer_name,customer_contact,customer_email,customer_address)
            //VALUES ('$food','$price','$qty','$total','$order_date','$status','$customer_name','$customer_contact','$customer_email','$customer_address')";
            //$res2 = mysqli_query($con, $sql2);
            $sql2 = "INSERT INTO `order` (`id`, `food`, `o_price`, `o_qty`, `o_total`, `cdate`, `custatus`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES (NULL, ' $food', ' $price', ' $qty', ' $total', '$order_date', ' $status', '$customer_name', '$customer_contact', ' $customer_email', '$customer_address')";
            $res2 = mysqli_query($con, $sql2);

            // exit(mysqli_error($con));

            if ($res2 == true) {
                // query Correct
                $_SESSION['ok'] = "Your Food Order Is Ok.";
                header("Location: ../website/orderNow.php");
                ob_end_flush();
            } else {
                // echo  $res2;
                echo "Faild Query";
            }
        } else {
            // echo "Btn Not working..";
        }
        ?>

    </div>
</div>