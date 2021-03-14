<?php
    include "databaseFunction.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<div class="container w-50 mt-5">
    <div class="card mx-auto w-50 my-5 border border-0">
        <div class="card-header bg-white border-0 mx-auto">
            <h1 class="display-4">Login</h1>
        </div>

        <div class="card-body">
            <form action="" method="post">
                <div class="form-row">
                    <div class="form-group col-md-12 border-0">
                        <input type="text" name="username" class="form-control border-bottom" placeholder="Username" requied>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 border-0">
                        <input type="password" name="password" class="form-control border-bottom" placeholder="Password" requied>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="submit" value="ENTER" name="enter" class="form-control btn btn-dark">
                    </div>
                </div>
            </form>
        </div>

        <div class="card-footer bg-white border-0 justify-content-between">
            <div class="row">
                <div class="col-md-6">
                    <h6><a href="register.php" class="text-dark">Create an Account</a></h6>
                </div>
                <div class="col-md-6 text-right">
                    <h6>Recover Account</h6>
                </div>
            </div>
        </div>

        <?php
            if(isset($_POST['enter'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                $login_result = login($username, $password);
                //echo  $login_result;
            
                if($login_result == "Invalid Password"){
        ?>
                <div class="alert alert-danger">
                    <h3>Invalid Password</h3>
                </div>
        <?php
                }elseif($login_result == "Invalid Username"){
        ?>
                <div class="alert alert-danger">
                    <h3>Invalid Username</h3>
                </div>
        <?php
                }
            }

        ?>
    </div>
</div>
</body>
</html>