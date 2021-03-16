<?php
    //include "databaseFunction.php";
    //他ページで読み込んでいるからincludeすると二重になる

    //echo $_SESSION['status'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!--JS/BUNDLE copy-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="justify-content-stard">
            <a href="Dashboard.php" class="navbar-brand">
                Dashboard
            </a>
            <a href="Posts.php" class="navbar-brand">
                Posts
            </a>
        <?php
            if($_SESSION['status'] == "A"){
        ?>
            <a href="Categories.php" class="navbar-brand">
                Categories
            </a>
            <a href="Users.php" class="navbar-brand">
                Users
            </a>
        <?php
            }
        ?>
        </div>

        <!-- TOGGLER/CPLLAPSE BUTTON -->
        <!--humbarger menu-->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu_content">
            <!--data-toggle class-->
            <!--data-target id   #:selecter-->
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="menu_content">
            <ul class="nav navbar-nav text-right">
                <li class="nav-item">
                    <a href="profile.php" class="nav-link">
                        <i class="fas fa-user text-primary"> Hello, <?php echo $_SESSION['username']; ?></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="Logout.php" class="nav-link" >
                        <i class="fas fa-user-times text-danger"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    
</body>
</html><!--common navbar-->
