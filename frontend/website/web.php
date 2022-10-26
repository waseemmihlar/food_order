<?php session_start() ?>
<?php include '../main.php' ?>
<?php require_once '../main.php' ?>
<?php require_once '../NavBar/nav.php' ?>


<div class="" style="width: 100%;">
    <div class="row">
        <div class="col-12">
            <?php require_once '../Home/Home.php' ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <?php require_once '../Menue/Menue.php' ?>
        </div>
    </div>

    <div class="row  mx-auto d-block">
        <div class="col-12">
            <?php require_once '../DeliveryDesc/deliveryD.php' ?>

        </div>
    </div>
    <div class="row  mx-auto d-block">
        <div class="col-12">
            <?php require_once './footer.php' ?>

        </div>
    </div>


    <!-- footer -->



</div>