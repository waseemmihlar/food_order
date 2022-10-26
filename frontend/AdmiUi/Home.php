<?php include './AdminSideNav.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rounded Clock</title>

    <link rel="stylesheet" href="../style/Clockstyle.css">
</head>

<body onload="resizeClock()">
    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-light fw-bold"style="font-size:48px;">WELCOME TO E-hungry Admin Panel</h1>
            </div>
        </div>
        <div class="box">
            <svg class="clock-container">
                <circle class="clock-shape"></circle>
                <circle class="clock-shape main-circle"></circle>
            </svg>
            <div class="content">
                <span class="time hour">
                    12
                </span>
                <b class="colon">:</b>
                <span class="time min">
                    00
                </span>
            </div>
        </div>
    </main>
    <script src="../Js/clock.js"></script>
</body>

</html>