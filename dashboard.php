<?php

include "databaseFunction.php";

if(empty($_SESSION)){
    session_unset();
    session_destroy();
    header("Location: Login.php");
    die;
}

//echo $_SESSION['status'];

$posts_count = displayPostsCount();
//print_r($_SESSION['account_id']);
//print_r($posts_count);

$categories_count = displayCategoiesCount();
//print_r($categories_count);

$users_count = displayUsersCount();
//print_r($users_count);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

</head>
<body>
    <?php 
        include "header.php";
    ?>

    <div class="container-fluid bg-danger text-white">
        <h1 class="display-1"><i class="fas fa-user-cog"></i>Dashboard</h1>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
              <a href="addPost.php" class="text-white btn btn-primary btn-lg w-100" role="button">
                  <i class="fas fa-plus-circle"></i> Add Post
                </a>
            </div>
            <?php
                if($_SESSION['status'] == "A"){
            ?>
                <div class="col-md-4">
                    <a href="categories.php" class="text-white btn btn-success btn-lg w-100" role="button">
                        <i class="fas fa-folder-plus"></i>Add Categories
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="users.php" class="text-white btn btn-warning btn-lg w-100" role="button">
                        <i class="fas fa-user-plus"></i>Add Users
                    </a>
                </div>
            <?php
                }
            ?>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Categories</th>
                            <th>Posted Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                                $post_list = displayPosts();
                                //print_r($post_list);

                                if(empty($post_list)){ 
                            ?>
                                    <h1 display-4>THERE IS NOT YOUR POST DATA</h1>
                            <?php
                                }else{
                                    foreach($post_list as $post_details){
                            ?>
                                    <tr>
                                        <td><?php echo $post_details['post_id']; ?></td>
                                        <td><?php echo $post_details['post_title']; ?></td>
                                        <td><?php echo $post_details['category_name']; ?></td>
                                        <td><?php echo $post_details['date_posted']; ?></td>
                                        <td><a href="displayPostDetails.php?post_id=<?php echo $post_details['post_id'] ?>" class="btn btn-secondary text-white" role="button">Detail</a></td>
                                    </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4 d-flex flex-column">
                <a href="posts.php" class="text-white btn btn-primary btn-lg w-100 h-30" role="button">
                    Posts<br>
                    <i class="far fa-edit"></i> <?php echo $posts_count['COUNT(post_id)']; ?><br>
                    view<br>
                </a>
                <?php
                    if($_SESSION['status'] == "A"){
                ?>
                        <a href="categories.php" class="text-white btn btn-success btn-lg w-100 h-30 mt-3" role="button">
                            Categories<br>
                            <i class="far fa-folder-open"></i> <?php echo $categories_count['COUNT(category_id)']; ?><br>
                            view<br>
                        </a>
                        <a href="users.php" class="text-white btn btn-warning btn-lg w-100 h-30 mt-3" role="button">
                            Users<br>
                            <i class="fas fa-users"></i> <?php echo $users_count['COUNT(user_id)']; ?><br>
                            view<br>
                        </a>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>