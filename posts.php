<?php
    include "databaseFunction.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>
<body>
    <?php 
        include "header.php";
    ?>

    <div class="container-fluid bg-info text-white">
        <h1 class="display-1"> <i class="fas fa-pen-nib"></i>Posts</h1>
    </div>

    <div class="container w-75 mt-5">
        <h1 dispaly-4>
            <a href="addPost.php" class="btn btn-info">
                <i class="far fa-edit"></i>Add Post
            </a>
        </h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Post ID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date Posted</th>
                    <th></th> <!--Details-->
                </tr>
            </thead>
            <tbody>
            <?php
                $post_list = displayPosts();
                //print_r($post_list);

                if(empty($post_list)){ 
            ?>
                <h1 display-4>THERE IS NO DATA IN POSTS TABLE</h1>
            <?php      
                }else{
                    foreach($post_list as $post_details){
            ?>
                    <tr>
                        <td><?php echo $post_details['post_id']; ?></td>
                        <td><?php echo $post_details['post_title']; ?></td>
                        <td><?php echo $post_details['category_name']; ?></td>
                        <td><?php echo $post_details['date_posted']; ?></td>
                        <td><a href="displayPostDetails.php?post_id=<?php echo $post_details['post_id'] ?>" class="btn btn-secondary" role="button">Detail</a></td>
                    </tr>
            <?php
                    }    
                }
            ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>