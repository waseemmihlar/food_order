<?php include '../main.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Awesome Search Box</title>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/search.css">
</head>
<!-- Coded with love by Mutiullah Samim-->

<body>
    <div class="container h-100">
        <div class="d-flex justify-content-center">
            <form action="../Modal/Foods/SearchFood.php" method="POST">
                <div class="searchbar">
                    <input class="search_input" type="text" name="search" placeholder="Search...">
                    <a href="../Modal/Foods/SearchFood.php" class="search_icon"><i class="fas fa-search"></i></a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>