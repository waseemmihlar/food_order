<!-- Get The message -->
<?php
if (isset($_SESSION['passwordError'])) {
?>
    <h4></h4>
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['passwordError']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['passwordError']); // When refresh the webpage this alert is disrepair
}
?>
<!-- ------------------------------------------------------------------------------------------------------------------------------ -->


<!-- Login Message -->
<?php
if (isset($_SESSION['Lmessage_error'])) {
?>
    <div class="alert alert-success" role="alert">
        <strong>Hey!</strong> <?= $_SESSION['Lmessage_error']; ?>
    </div>
<?php
    unset($_SESSION['Lmessage_error']); // When refresh the webpage this alert is disrepair
}
?>

<?php
if (isset($_SESSION['cat_add_error'])) {
?>


<?php
    unset($_SESSION['cat_add_error']); // When refresh the webpage this alert is disrepair
}
?>



<?php
