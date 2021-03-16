<?php
    require_once "connection.php";

    session_start();

    function addUser($first_name, $last_name, $email, $contact_number, $address, $username, $password, $submit){

        $conn = db_connect();

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql1 = "INSERT INTO accounts (username, password) VALUES ('$username', '$password')";

        if($conn->query($sql1)){

            $user_account_id = $conn->insert_id;
            $sql2 = "INSERT INTO users (first_name, last_name, email, contact_number, address, account_id) VALUES ('$first_name', '$last_name', '$email', '$contact_number', '$address', '$user_account_id')";

                if($conn->query($sql2)){
                    if($submit == "Register"){
                        header("Location: login.php");
                    }elseif($submit == "Add"){
                        //header("Location: ");
                        echo "<script>location.href='users.php'</script>";
                    }
                }else{
                    die("ERROR INSERT INTO USERS TABLE.$conn->error");
                    $conn->close();
                }

        }else{
                    die("ERROR INSERT INTO ACCOUNTS TABLE.$conn->error");
                    $conn->close();
        }

    }

    function login($username, $password){
        $conn = db_connect();
        
        $sql = "SELECT * FROM users INNER JOIN accounts ON users.account_id = accounts.account_id WHERE accounts.username = '$username'";

        $result = $conn->query($sql);

        //print_r($result);

        if($result->num_rows == 1){
            $row = $result->fetch_assoc();
            //print_r($row);

            if(password_verify($password, $row['password'])){
            //$row['password]: made by password_hash() function
                
                $_SESSION['username'] = $row['username'];
                $_SESSION['account_id'] = $row['account_id'];
                $_SESSION['status'] = $row['status'];

                if($_SESSION['status'] == "A"){
                    header("Location: dashboard.php");
                }else{
                    header("Location: profile.php");
                }

            }else{
                return "Invalid Password";
            }
        }else{
            return "Invalid Username";
        }

    }

    function displayPostsCount(){
        $conn = db_connect();

        $account_id = $_SESSION['account_id'];

        if($_SESSION['status'] == "A"){
            $sql = "SELECT COUNT(post_id) FROM posts";
        }else{
            $sql = "SELECT COUNT(post_id) FROM posts WHERE posts.account_id = '$account_id'";
        }
        

        $result = $conn->query($sql);
        //print_r($result);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

    function displayCategoiesCount(){
        $conn = db_connect();

        $sql = "SELECT COUNT(category_id) FROM categories";

        $result = $conn->query($sql);
        //print_r($result);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

    function displayUsersCount(){
        $conn = db_connect();

        $sql = "SELECT COUNT(user_id) FROM users";

        $result = $conn->query($sql);
        //print_r($result);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

/*
CATEGORIES
*/
    function addCategory($category_name){
        $conn = db_connect();

        $sql = "INSERT INTO categories (category_name) VALUES ('$category_name')";

        if($conn->query($sql)){
           header("Location: ");
           //$_SERVER['PHP_SELF']
        }else{
            die("ERROR INSERT INTO CATEGORIES TABLE.$conn->error");
            $conn->close();
        }
    }

    function displayCategory(){
        $conn = db_connect();

        $sql = "SELECT * FROM categories";
        $result = $conn->query($sql);
        //print_r($result);

        $rows = [];

        if($result->num_rows > 0){
            while($category_list = $result->fetch_assoc()){
                $rows[] = $category_list;
            }
            //print_r($rows);

            return $rows;
        }else{
            return false;
        }

    }

    function getCategoryDetail($category_id){
        $conn = db_connect();

        $sql = "SELECT * FROM categories WHERE categories.category_id = '$category_id'";
        $result = $conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();

        }else{
            return false;
        }
    }

    function updateCategory($category_id, $category_name){
        $conn = db_connect();

        $sql = "UPDATE categories SET categories.category_name = '$category_name' WHERE categories.category_id = '$category_id'";

        if($conn->query($sql)){
            header("Location: categories.php");
        }else{
            return false;
        }

    }

    function deleteCategory($category_id){
        $conn = db_connect();

        $sql = "DELETE FROM categories WHERE categories.category_id = '$category_id'";

        if($conn->query($sql)){
            header("Location: categories.php");
        }else{
            return false;
        }
    }

/*
USERS
*/

    function displayUsers(){
        $conn = db_connect();

        $sql = "SELECT * FROM users INNER JOIN accounts ON users.account_id = accounts.account_id";
        $result = $conn->query($sql);
        //print_r($result);

        $rows = [];

        if($result->num_rows > 0){
            while($users_list = $result->fetch_assoc()){
                $rows[] = $users_list;
            }
            //print_r($rows);

            return $rows;
        }else{
            return false;
        }

    }

    function getUsersDetail($account_id){
        $conn = db_connect();

        $sql = "SELECT * FROM users INNER JOIN accounts ON users.account_id = accounts.account_id WHERE users.account_id = '$account_id'";
        $result = $conn->query($sql);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

    function updateUserDetails($new_first_name, $new_last_name, $new_email, $new_contact_number, $new_address, $new_username, $new_password, $account_id, $submit){
        $conn = db_connect();

        $sql = "UPDATE users INNER JOIN accounts ON users.account_id = accounts.account_id
                SET users.first_name = '$new_first_name',
                    users.last_name = '$new_last_name',
                    users.email = '$new_email',
                    users.contact_number = '$new_contact_number',
                    users.address = '$new_address',
                    accounts.username = '$new_username',
                    accounts.password = '$new_password'
                WHERE users.account_id = '$account_id'";

        //print_r($sql);

        //$result = $conn->query($sql);
        //print_r($result);

        if($conn->query($sql)){
            if($submit == "Update"){
                header("Location: users.php");
            }elseif($submit == "Submit"){
                echo "<script>location.href='profile.php'</script>";
            }
        }else{
            return false;
        }

    }

    function deleteUser($account_id){
        $conn = db_connect();

        $sql = "DELETE users, accounts FROM users INNER JOIN accounts ON users.account_id = accounts.account_id WHERE users.account_id = '$account_id'";

        if($conn->query($sql)){
            header("Location: users.php");
        }else{
            return false;
        }
    }
    

/*
POSTS
*/

    function displayPosts(){
        $conn = db_connect();

        $account_id = $_SESSION['account_id'];

        if($_SESSION['status'] == "A"){
            $sql = "SELECT * FROM posts INNER JOIN categories ON posts.category_id = categories.category_id";
        }else{
            $sql = "SELECT * FROM posts INNER JOIN categories ON posts.category_id = categories.category_id WHERE posts.account_id = '$account_id'";
        }
        
        $result = $conn->query($sql);
        //print_r($result);

        $rows = [];

        if($result->num_rows > 0){
            while($users_list = $result->fetch_assoc()){
                $rows[] = $users_list;
            }
            //print_r($rows);

            return $rows;
        }else{
            return false;
        }

    }

    function addPost($title, $date, $category_id, $message, $account_id){
        $conn = db_connect();

        $sql = "INSERT INTO posts (post_title, date_posted, category_id, post_message, account_id) 
                VALUES ('$title', '$date', '$category_id', '$message', '$account_id')";
        
        //print_r($sql);

        //$result = $conn->query($sql);
        //print_r($result);

        if($conn->query($sql)){
            // header("Location: posts.php");
            echo "<script>location.href='posts.php'</script>";
        }else{
            die("ERROR INSERT INTO POSTS TABLE.$conn->error");
            $conn->close();
        }
        
    }

    function getPostDetails($post_id){
        $conn = db_connect();

        $sql ="SELECT * FROM posts 
                INNER JOIN categories ON posts.category_id = categories.category_id 
                INNER JOIN users ON posts.account_id = users.account_id
               WHERE posts.post_id = '$post_id'";

        $result = $conn->query($sql);
        //print_r($result);

        if($result->num_rows == 1){
            return $result->fetch_assoc();
        }else{
            return false;
        }
    }

    function updatePost($new_title, $new_date, $new_category_id, $new_message, $post_id){
        $conn = db_connect();

        $sql = "UPDATE posts 
                SET posts.post_title = '$new_title',
                posts.date_posted = '$new_date',
                posts.category_id = '$new_category_id',
                posts.post_message = '$new_message'
                WHERE posts.post_id = '$post_id'";

        if($conn->query($sql)){
            //header("Location: posts.php");
            echo "<script>location.href='posts.php'</script>";
        }else{
            return false;
        }
        
    }


?>