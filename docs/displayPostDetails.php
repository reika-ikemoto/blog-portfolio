<?php
    include "databaseFunction.php";
    
    $post_id = $_GET['post_id'];

    $post_details = getPostDetails($post_id);
    //print_r($post_details);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>updatePost</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-dark">
        <ul class="nav navbar-nav justify-content-start">
            <li class="nav-item">
                <a href="posts.php" class="nav-link text-white">< Go back to Posts</a>
            </li>
        </ul>
        <ul class="nav navbar-nav justify-content-end">
            <li class="nav-item">
                <a href="updatePost.php?post_id=<?php echo $post_details['post_id']; ?>" class="nav-link text-white">>Update Post Details</a>
            </li>
        </ul>
    </nav>

    <div class="container w-50 mt-5">
        <h1 class="display-4 text-center bg-info text-white"><i class="far fa-edit"></i>Post Details</h1>

        <div class="row">
            <div class="group col-md-6">
                <h6 class="display-4">Title:</h6>
            </div>
            <div class="group col-md-6">
                <h6 class="display-4"><?php echo $post_details['post_title'];?></h6>
            </div>
        </div>

        <div class="row">
            <div class="group col-md-6">
                <h6 class="display-4">First Name:</h6>
            </div>
            <div class="group col-md-6">
                <h6 class="display-4"><?php echo $post_details['first_name'];?></h6>
            </div>
        </div>
        <div class="row">
            <div class="group col-md-6">
                <h6 class="display-4">Last Name:</h6>
            </div>
            <div class="group col-md-6">
                <h6 class="display-4"><?php echo $post_details['last_name'];?></h6>
            </div>
        </div>

        <div class="row">
            <div class="group col-md-6">
                <h6 class="display-4">Date Posted:</h6>
            </div>
            <div class="group col-md-6">
                <h6 class="display-4"><?php echo $post_details['date_posted'];?></h6>
            </div>
        </div>
        <div class="row">
            <div class="group col-md-6">
                <h6 class="display-4">Category:</h6>
            </div>
            <div class="group col-md-6">
                <h6 class="display-4"><?php echo $post_details['category_name'];?></h6>
            </div>
        </div>
        <div class="row">
            <div class="group col-md-6">
                <h6 class="display-4">Message:</h6>
            </div>
            <div class="group col-md-6">
                <h6 class="display-4"><?php echo $post_details['post_message'];?></h6>
            </div>
        </div>


    </div>
    
</body>
</html>