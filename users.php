<?php
    include "databaseFunction.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>
<body>
    <?php 
        include "header.php";
    ?>

    <div class="container-fluid bg-warning text-white">
        <h1 class="display-1"> <i class="fas fa-users"></i>Users</h1>
    </div>

    <div class="container w-50 mt-5">
        <form action="" method="post">
            <h1 display-4>Add Users</h1>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="contact_number" class="form-control" placeholder="Contact Number">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="address" class="form-control" placeholder="Address">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group col-md-6">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6 mx-auto">
                    <input type="submit" value="Add" name="add" class="form-control btn btn-warning text-white">
                </div>
            </div>
        </form>

        <?php
            if(isset($_POST['add'])){
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $contact_number = $_POST['contact_number'];
                $address = $_POST['address'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $submit = $_POST['add'];
                //print_r($submit);
                
                addUser($first_name, $last_name, $email, $contact_number, $address, $username, $password, $submit);
                //print_r($result);
            }
        ?>
    </div>
    <div class="container w-75 mt-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>USER ID</th>
                    <th>FULL NAME</th>
                    <th>EMAIL</th>
                    <th>CONTACT NUMBER</th>
                    <th>ADDRESS</th>
                    <th>USERNAME</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                    $user_list = displayUsers();

                    if(empty($user_list)){
            ?>
                    <h1 display-4>THERE IS NO DATA IN THE USERS TABLE</h1>
            <?php
                    }else{
                        foreach($user_list as $user_detail){
            ?>
                <tr>
                    <td><?php echo $user_detail['user_id']; ?></td>
                    <td><?php echo $user_detail['first_name']; ?> <?php echo $user_detail['last_name']; ?></td>
                    <td><?php echo $user_detail['email']; ?></td>
                    <td><?php echo $user_detail['contact_number']; ?></td>
                    <td><?php echo $user_detail['address']; ?></td>
                    <td><?php echo $user_detail['username']; ?></td>
                    <td><a href="updateUser.php?account_id=<?php echo $user_detail['account_id']?>" class="btn btn-warning text-white" role="button">UPDATE</a></td>
                    <td><a href="deleteUser.php?account_id=<?php echo $user_detail['account_id']?>" class="btn btn-danger" role="button">DELETE</a></td>
                </tr>
            <?php
                        }
                    }
            ?>
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
</html>