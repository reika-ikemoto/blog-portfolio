<?php
    include "databaseFunction.php";
    $account_id = $_SESSION['account_id'];

    $user_details = getUsersDetail($account_id);
    //print_r($user_details);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!--JS/BUNDLE copy-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-white">

    <?php 
        include "header.php";
    ?>
    
    <div class="container-fluid bg-secondary text-white">
        <h1 class="display-1"><i class="fas fa-user-cog"></i>Profile</h1>
    </div>

    <div class="container w-50 mt-5">
        <form action="" method="post">
            <div class="form-row">
                <div class="from-group col-md-6">
                    <div class="font-weight-light">First Name</div>
                    <input type="text" name="new_first_name" value="<?php echo $user_details['first_name']; ?>" class="form-control" placeholder="First Name" required>
                </div>
                <div class="from-group col-md-6">
                    <div class="font-weight-light">Last Name</div>
                    <input type="text" name="new_last_name" value="<?php echo $user_details['last_name']; ?>" class="form-control" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-4">
                    <div class="font-weight-light">Address</div>
                    <input type="text" name="new_address" value="<?php echo $user_details['address']; ?>" class="form-control" placeholder="Address" required>
                </div>
                <div class="form-group col-md-4">
                    <div class="font-weight-light">Contact Number</div>
                    <input type="text" name="new_contact_number" value="<?php echo $user_details['contact_number']; ?>" class="form-control" placeholder="Contactnumber" required>
                </div>
                <div class="form-group col-md-4">
                    <div class="font-weight-light">Email</div>
                    <input type="text" name="new_email" value="<?php echo $user_details['email']; ?>" class="form-control" placeholder="Email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <div class="font-weight-light">Username</div>
                    <input type="text" name="new_username" value="<?php echo $user_details['username']; ?>" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="form-row">
                <div class="from-group col-md-6">
                    <div class="font-weight-light">Password<span style="color:red">*</span></div>
                    <input type="password" name="new_password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                    <div class="font-weight-light">Comfirm Password<span style="color:red">*</span></div>
                    <input type="hidden" name="old_password" value="<?php echo $user_details['password']; ?>">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                </div>
            </div>
            <div class="form-row mt-3">
                <div class="form-group col-md-12">
                    <input type="button" name="update" value="UPDATE" class="form-control btn btn-primary" data-toggle="modal" data-target="#ModalCenter">
                </div>
                <!--JavaScript Modal-->
                    <div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="confirmOldPassword" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content text-dark">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="confirmOldPassword">CONFIRM YOUR OLD PASSWORD</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <input type="password" name="input_old_password" class="form-control" placeholder="Old Password">
                                </div>
                                <div class="modal-footer">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--JavaScript Modal-->
            </div>

            <?php
            //Modal Process
            if(isset($_POST['submit'])){

                $new_first_name = $_POST['new_first_name'];
                $new_last_name = $_POST['new_last_name'];
                $new_address = $_POST['new_address'];
                $new_contact_number = $_POST['new_contact_number'];
                $new_email = $_POST['new_email'];
                $new_username = $_POST['new_username'];
                $submit = $_POST['submit'];

                if(empty($_POST['new_password'] && $_POST['confirm_password'])){
                    $password = $_POST['old_password'];
                }elseif(!empty($_POST['new_password']) && $_POST['new_password'] === $_POST['confirm_password']){
                    $password = $_POST['new_password'];
                }


                if(password_verify($_POST['input_old_password'], $user_details['password']) && $_POST['new_password'] === $_POST['confirm_password']){
                    updateUserDetails($new_first_name, $new_last_name, $new_email, $new_contact_number, $new_address, $new_username, $password, $account_id, $submit);
                    // echo "SUCCESS";
                }elseif($_POST['new_password'] !== $_POST['confirm_password']){
                    echo "Confirm Password Mismatch";
                }else{
                    echo "Wrong Old Password";
                }

                /*if(empty($_POST['confirm_password'])){
                    $confirm_password = $_POST['old_password'];
                }else{
                    $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
                }*/

                
            
            }

        ?>

        </form>
    </div>
    
</body>
</html>