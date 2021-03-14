<?php
    include "databaseFunction.php";

    $post_id = $_GET['post_id'];

    $post_details = getPostDetails($post_id);
    //print_r($post_details);

    $category_details = displayCategory();
    //print_r($category_details);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdatePost</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item">
            <a href="displayPostDetails.php?post_id=<?php echo $post_details['post_id']; ?>" class="nav-link text-white">< Update Post Details</a>
            </li>
        </ul>
    </nav>

    <div class="container w-50 mt-5">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-12 text-center">
                   <h1 diplay-4><i class="far fa-edit"></i>Update the post details</h1>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="text" name="title" value="<?php echo $post_details['post_title']; ?>" class="form-control" placeholder="Tilte" requied>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <input type="date" name="date" value="<?php echo $post_details['date_posted']; ?>" class="form-control" placeholder="yy/mm/dd" requied>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <select name="category_id" class="form-control" >
                        <option selected value="<?php echo $post_details['category_id']; ?>"><?php echo $post_details['category_name']; ?></option>
                        <?php
                            foreach($category_details as $category_list){
                        ?>
                            <option value="<?php echo $category_list['category_id']; ?>" >
                                <?php echo $category_list['category_name']; ?>
                            </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <!---->
                    <textarea class="form-control" name="message"  cols="20" rows="5" placeholder="Messasge" requied><?php echo $post_details['post_message']; ?></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="fomr-group col-md-12">
                    <input type="submit" value="Update" name="update" class="form-control btn btn-warning text-white">
                </div>
            </div>

        </form>

        <?php
            if(isset($_POST['update'])){
                $new_title = $_POST['title'];
                $new_date = $_POST['date'];
                $new_category_id = $_POST['category_id'];
                $new_message = $_POST['message'];

                $result = updatePost($new_title, $new_date, $new_category_id, $new_message, $post_id);

                if($result == 'False'){
        ?>
                <div class="alert alert-danger text-center" role="alert">
                    <p><strong>THERE WAS SOMETHING WRONG WITH THE UPDATE</strong></p>
                    <a href="posts.php" class="btn btn-danger">Go back to Posts</a>
                </div>
        <?php
                }
            }

        ?>
    </div>
</body>
</html>