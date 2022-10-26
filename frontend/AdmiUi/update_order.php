<?php
ob_start();
?>
<?php session_start() ?>
<?php include './AdminSideNav.php' ?>
<?php include '../../backend/config/dbconnect.php'; ?>
<?php include '../main.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                <table class="tbl-30">
                    <td>
                        <h1>Update Order</h1>
                    </td>
                    <?php
                    // check wheather id set or not
                    if (isset($_GET['order_id'])) {
                        $id = $_GET['order_id'];

                        // get all the details
                        $sql = "SELECT * FROM `order` WHERE id=$id";
                        $res = mysqli_query($con, $sql);
                        $count = mysqli_num_rows($res);

                        if ($count == 1) {
                            $row = mysqli_fetch_assoc($res);
                            $food = $row['food'];
                            $price = $row['o_price'];
                            $qty = $row['o_qty'];
                            $status = $row['custatus'];
                            $customer_name = $row['customer_name'];
                            $customer_contact = $row['customer_contact'];
                            $customer_email = $row['customer_email'];
                            $customer_address = $row['customer_address'];
                        } else {
                            // not avialable
                            // header("Location: ./update_order.php");
                        }
                    } else {
                        // header("Location: ./Orders.php");
                    }
                    ?>
                    <tr>
                        <td>
                            FOOD NAME:
                        <td><b><?php echo $food ?></b></td>
                    </tr>

                    <td>
                        PRICE:
                    </td>
                    <td><b>Rs.<?php echo $price; ?></b></td>
                    </tr>

                    <tr>
                        <td>
                            QTY:
                        </td>
                        <td>
                            <input type="number" name="qty" value="<?php echo $qty; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Status:</td>
                        <td>
                            <select name="status" id="">
                                <option <?php if ($status == "ordered") {
                                            echo "selected";
                                        } ?> value="ordered">Ordered</option>
                                <option <?php if ($status == "On Delivery") {
                                            echo "selected";
                                        } ?> value="On Delivery">On Delivery</option>
                                <option <?php if ($status == "Delivered") {
                                            echo "selected";
                                        } ?> value="Delivered">Delivered</option>
                                <option <?php if ($status == "Cancelled") {
                                            echo "selected";
                                        } ?> value="Cancelled">Cancelled</option>
                            </select>
                        </td>
                    </tr>


                    <tr>
                        <td>Customer Name:</td>
                        <td>
                            <input type="text" name="customer_name" value="<?php echo $customer_name ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Contact:</td>
                        <td>
                            <input type="text" name="customer_contact" value="<?php echo $customer_contact  ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Email:</td>
                        <td>
                            <input type="text" name="customer_email" value="<?php echo $customer_email ?>">
                        </td>
                    </tr>

                    <tr>
                        <td>Customer Address:</td>
                        <td>
                            <textarea type="text" name="customer_address" value="" cols="30" rows="5"><?php echo $customer_address ?></textarea>
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <input type="submit" name="submit" class="btn btn-primary" value="update Order">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
        // Checking btn is working or not
        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
            $price = $_POST['price'];
            $qty = $_POST['qty'];
            $total =  $price * $qty;
            $status = $_POST['status'];

            $customer_name = $_POST['customer_name'];
            $customer_contact = $_POST['customer_contact'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];
            // $sql2 = "UPDATE order SET o_qty=$qty,o_total=$total,custatus='$status',customer_name='$customer_name',customer_contact='$customer_contact',customer_email='$customer_email',customer_address='$customer_address' WHERE id=$id";
            $sql2 = "UPDATE `order` SET `o_price`= $price,`o_qty`=$qty,`o_total`=$total,`custatus`='$status',`customer_name`='$customer_name',`customer_contact`='$customer_contact',`customer_email`='$customer_email',`customer_address`='$customer_address' WHERE id=$id;";
            $res2 = mysqli_query($con, $sql2);
            // echo $sql2;
            echo $sql2;

            if ($res2 == true) {
                $_SESSION['up_ok'] = "Successfully order updated";
                header("Location: Orders.php");
            } else {
                echo "False";
            }
        }
        ?>
    </div>
</div>