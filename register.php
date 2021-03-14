<?php
    include "databaseFunction.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body class="bg-dark text-white">
    <div class="container w-50 mt-5">
        <h1 class="display-4 text-center mb-5">Registeration</h1>
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <p class="font-weight-light">First Name <span style="color:red">*</span></p>
                    <input type="text" name="first_name" class="form-control bg-transparent border-bottom text-light" required> <!--rewuired = Must Be filled-->
                </div>
                <div class="form-group col-md-6">
                    <p class="font-weight-light">Last Name <span style="color:red">*</span></p>
                    <input type="text" name="last_name" class="form-control bg-transparent border-bottom text-light" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <p class="font-weight-light">Address</p>
                    <input type="text" name="address" class="form-control bg-transparent border-bottom text-light">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <p class="font-weight-light">Contact Number <span style="color:red">*</span></p>
                    <input type="text" name="contact_number" class="form-control bg-transparent border-bottom text-light" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <p class="font-weight-light">Email <span style="color:red">*</span></p>
                    <input type="text" name="email" class="form-control bg-transparent border-bottom text-light" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <p class="font-weight-light">UserName <span style="color:red">*</span></p>
                    <input type="text" name="username" class="form-control bg-transparent border-bottom text-light" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                <p class="font-weight-light">Password <span style="color:red">*</span></p>
                    <input type="password" name="password" class="form-control bg-transparent border-bottom text-light" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="submit" name="regist" value="Register" class="form-control btn btn-secondary">
                </div>
                <div class="form-group col-md-8 text-right">
                    <p class="font-weight-light">Do you already have an account ? 
                        <a href="login.php" class="text-primary">Sign in</a>
                    </p>
                </div>
            </div>
            
        </form>

        <?php
            if(isset($_POST['regist'])){

                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];
                $email = $_POST['email'];
                $contact_number = $_POST['contact_number'];
                $address = $_POST['address'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $submit = $_POST['regist'];
                //print_r($submit);

                addUser($first_name, $last_name, $email, $contact_number, $address, $username, $password, $submit);

            }
        ?>
    </div>
</body>
</html>