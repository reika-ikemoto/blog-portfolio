<?php
    include "databaseFunction.php";

    $category_id = $_GET['category_id'];

    $category_details = getCategoryDetail($category_id);
    //print_r($category_details);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateCategory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <div class="container w-50 mt-5">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-12 text-center">
                   <h1 diplay-4>Update the category name</h1>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 mx-auto">
                    <input type="text" name="category_name" value="<?php echo $category_details['category_name'];?>" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 mx-auto">
                    <input type="submit" name="update" value="Update" class="form-control btn btn-warning text-white">
                </div>
            </div>
        </form>

        <?php
            if(isset($_POST['update'])){
                $category_name = $_POST['category_name'];

                $result = updateCategory($category_id, $category_name);

                if($result == 'False'){
        ?>
                <div class="alert alert-danger text-center" role="alert">
                    <p><strong>THERE WAS SOMETHING WRONG WITH THE UPDATE</strong></p>
                    <a href="categories.php" class="btn btn-danger">Go back to Categories</a>
                </div>
        <?php
                }
            }

        ?>
    </div>
</body>
</html>