
<?php
include './config/dbconnect.php';
if (isset($_POST["insertdata"])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = $_POST['pass'];

    $insert_query = "INSERT INTO  customer (`cName`, `Email`, `Number`, `Password`) 
    VALUES ('$name','$email','$number','$password')";

    $insert_query_run = mysqli_query($con, $insert_query);

    if ($insert_query_run) {
       
        header('Location: ../frontend/AdmiUi/Customers.php') ;
        echo $insert_query;

    } else {
        echo "Your Data Was Not Saved";
    }
}
?>