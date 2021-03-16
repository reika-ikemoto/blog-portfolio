<?php
    include "databaseFunction.php";

    $category_list = displayCategory();
    //print_r($category_list);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>addPost</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a href="posts.php" class="nav-link text-white">< Go back to posts</a>
            </li>
        </ul>
    </nav>
<div class="container w-50 mt-5 mx-auto">
    <h1 class="display-4 text-center"><i class="far fa-edit"></i>Add Post</h1>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" name="title" class="form-control" placeholder="Tilte">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="date" name="date" class="form-control" placeholder="yy/mm/dd">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <select class="form-control" name="category_id">
                        <option selected disabled>Choose Category</option>
                        <?php  
                            foreach ($category_list as $category){
                        ?>
                            <option value="<?php echo $category['category_id']; ?>">
                                <?php echo $category['category_name'];?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <textarea class="form-control" name="message" cols="20" rows="5" placeholder="Messasge" requied></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-dark text-white" id="basic-addon1">Author:</span>
                        </div>
                        <input type="text" class="form-control" placeholder="<?php echo $_SESSION['username']; ?>" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="submit" value="Add" name="add" class="form-control btn btn-info">
                </div>
            </div>
        </form>
        <?php

            if(isset($_POST['add'])){
                $title = $_POST['title'];
                $date = $_POST['date'];
                $category_id = $_POST['category_id'];
                $message = $_POST['message'];
                $account_id = $_SESSION['account_id'];

                addPost($title, $date, $category_id, $message, $account_id);
                //print_r($result);
            }
        ?>
</div>    
</body>
</html>