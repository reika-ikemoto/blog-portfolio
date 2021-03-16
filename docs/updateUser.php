<?php
    include "databaseFunction.php";

    $account_id = $_GET['account_id'];

    $user_details = getUsersDetail($account_id);
    //print_r($user_details);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateUser</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a href="users.php" class="nav-link text-white">< Go back to users</a>
            </li>
        </ul>
    </nav>
    <div class="container w-50 mt-5">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-12 text-center">
                   <h1 diplay-4>Update user's information</h1>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="new_first_name" class="form-control" value="<?php echo $user_details['first_name']; ?>" placeholder="First Name">
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="new_last_name" class="form-control" value="<?php echo $user_details['last_name']; ?>" placeholder="Last Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="new_email" class="form-control" value="<?php echo $user_details['email']; ?>" placeholder="Email">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="new_contact_number" value="<?php echo $user_details['contact_number']; ?>" class="form-control" placeholder="Contact Number">
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="new_address" value="<?php echo $user_details['address']; ?>" class="form-control" placeholder="Address">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="new_username" value="<?php echo $user_details['username']; ?>" class="form-control" placeholder="Username">
                </div>
                <div class="form-group col-md-6">
                    <input type="hidden" name="old_password" value="<?php echo $user_details['password']; ?>">
                    <input type="password" name="new_password" class="form-control" placeholder="Password">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 mx-auto">
                    <input type="submit" name="update_user" value="Update" class="form-control btn btn-warning text-white">
                </div>
            </div>
        </form>

        <?php
            if(isset($_POST['update_user'])){

                $new_first_name = $_POST['new_first_name'];
                $new_last_name = $_POST['new_last_name'];
                $new_email = $_POST['new_email'];
                $new_contact_number = $_POST['new_contact_number'];
                $new_address = $_POST['new_address'];
                $new_username = $_POST['new_username'];
                $submit = $_POST['update_user'];
                //print_r($submit);

                if(empty($_POST['new_password'])){
                    $new_password = $_POST['old_password'];
                }else{
                    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
                }

                //echo "hello";
                
                $result = updateUserDetails($new_first_name, $new_last_name, $new_email, $new_contact_number, $new_address, $new_username, $new_password, $account_id, $submit);
                print_r($result);

                if($result == 'False'){
        ?>
                <div class="alert alert-danger text-center" role="alert">
                    <p><strong>THERE WAS SOMETHING WRONG WITH THE UPDATE</strong></p>
                    <a href="categories.php" class="btn btn-danger">Go back to Users</a>
                </div>
        <?php
                }
                
            }
        ?>
    </div>
</body>
</html>