<?php session_start() ?>
<?php include '../main.php' ?>
<?php include './AdminSideNav.php' ?>
<?php include '../Icons.php' ?>
<?php include '../../backend/config/dbconnect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/orders.css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">E-hungry ORDERS</h1>
            </div>
        </div>

        <div class="row shadow p-3 mb-5 bg-body rounded count_orders text-center">
            <div class="col-4">
                <i class="fa fa-cube fa-2x mt-1" aria-hidden="true"></i>
            </div>
            <div class="col-5">
                <h5 class="mt-2">ORDERS</h5>
            </div>
            <!-- Alert -->

          
        </div>
        <?php
        if (isset($_SESSION['up_ok'])) {
        ?>
            <div class="alert-success" role="alert">
                <strong>Hey!</strong> <?= $_SESSION['up_ok']; ?>

            </div>
        <?php
            unset($_SESSION['up_ok']); // When refresh the webpage this alert is disrepair
        }
        ?>
        <div class="row table">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Food</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Update</th>
                            <th scope="col">Delete</th>
                            <th scope="col">View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `order` ";
                        $res = mysqli_query($con, $sql);

                        $count = mysqli_num_rows($res);
                        $sn = 1;
                        if ($count > 0) {
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $food = $row['food'];
                                $o_price = $row['o_price'];
                                $o_qty = $row['o_qty'];
                                $o_total = $row['o_total'];
                                $cdate = $row['cdate'];
                                $custatus = $row['custatus'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];

                        ?>
                                <tr>
                                    <th scope="row"><?php echo $sn++ ?></th>
                                    <td class="table-success"><?php echo $food; ?></td>
                                    <td class="table-success"><?php echo $o_price; ?></td>
                                    <td class="table-success"><?php echo $o_qty; ?></td>
                                    <td class="table-success">Rs.<?php echo $o_total; ?></td>
                                    <td class="table-success"><?php echo $cdate ?></td>
                                    <td class="table-success"><?php echo $custatus; ?></td>
                                    <td class="table-success"><?php echo $customer_name; ?></td>
                                    <td class="table-success"><?php echo $customer_contact; ?></td>
                                    <td class="table-success"><?php echo $customer_email; ?></td>
                                    <td class="table-success"><?php echo $customer_address; ?></td>
                                    <td class="table-success"><a href="./update_order.php?order_id=<?php echo $id; ?>" type="submit" class="btn btn-outline-success">Update Order</a></td>
                                </tr>
                        <?php
                            }
                        } else {
                            echo "Data is Empty";
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>


    </div>

</body>

</html>