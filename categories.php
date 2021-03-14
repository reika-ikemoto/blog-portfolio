<?php
    include "databaseFunction.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>
<body>
    <?php
        include "header.php";
    ?>

    <div class="container-fluid bg-success text-white">
        <h1 class="display-1"><i class="far fa-folder-open"></i>Categories</h1>
    </div>

    <div class="container w-50 mt-5">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <h4>Add Category</h4>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="category_name" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <input type="submit" name="add" value="Add" class="form-control btn btn-success">
                </div>
            </div>
        </form>

        <?php
        if(isset($_POST['add'])){
            $category_name = $_POST['category_name'];

            addCategory($category_name);
        }
        ?>

        <table class="table">
            <thead class="bg-dark text-white">
                <tr>
                    <th>CATEGORY ID</th>
                    <th>CATEGORY NAME</th>
                    <th></th>
                    <th></th>
                </tr>
                <tbody>
                <?php
                    $category_list = displayCategory();
                    //print_r($category_list);

                    if(empty($category_list)){
                ?>
                        <h1 display-4>THERE IS NO DATA IN THE CATEGORIES TABLE</h1>
                <?php
                    }else{
                        foreach($category_list as $category_detail){
                ?>
                        <tr>
                            <td><?php echo $category_detail['category_id']; ?></td>
                            <td><?php echo $category_detail['category_name']; ?></td>
                            <td><a href="updateCategory.php?category_id=<?php echo $category_detail['category_id']?>" class="btn btn-warning text-white" role="button">UPDATE</a></td>
                            <td><a href="deleteCategory.php?category_id=<?php echo $category_detail['category_id']?>" class="btn btn-danger" role="button">DELETE</a></td>
                        </tr>
                <?php
                        }
                    }
                ?>
                </tbody>
            </thead>
        </tabel>
    </div>

    
            
</body>
</html>