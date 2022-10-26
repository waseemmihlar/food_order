<?php include '../../backend/config/dbconnect.php' ?>
<?php include '../main.php' ?>
<?php include './AdminSideNav.php' ?>
<?php include '../Icons.php' ?>
<?php include '../../backend/customerCount.php' ?>

<?php
$customer_query = "SELECT * FROM customer";
$customer_query_run = mysqli_query($con, $customer_query);
?>
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
                <h1 class="text-center">E-hungry CUSTOMERS</h1>
            </div>
        </div>

        <div class="row shadow p-3 mb-5 bg-body rounded count_orders text-center">
            <div class="col-4">
                <i class="fa fa-cube fa-2x mt-1" aria-hidden="true"></i>
            </div>
            <div class="col-5">
                <h5 class="mt-2">CUSTOMERS</h5>
            </div>
            <div class="col-3 mt-1">
                <H3><?php echo $row_count ?>
                </H3>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-end">
                <?php include '../Modal/dataAdd.php' ?>
            </div>
        </div>
        <div class="row table">
            <div class="col-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">NUMBER</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col ">EDIT</th>
                            <th scope="col ">DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rows = mysqli_fetch_assoc($customer_query_run)) {
                            $id = $rows['ID'];
                            $name = $rows['cName'];
                            $Email = $rows['Email'];
                            $number = $rows['Number'];
                            $password = $rows['Password'];
                        ?>
                            <tr>
                                <td><?php echo $id ?></td>
                                <td class="table-success "><?php echo $name ?></td>
                                <td class="table-success"><?php echo $Email ?></td>
                                <td class="table-success "><?php echo $number ?></td>
                                <td class="table-success "><?php echo $password ?></td>
                                <td class="table-success "><?php include '../Modal/Update.php' ?></td>
                                <td class="table-success "><?php include '../Modal/DeleteModal.php' ?></td>
                            </tr>
                    </tbody>
                <?php    } ?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>

