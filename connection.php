<?php
    function db_connect(){
        $server_name = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "blog";

        $conn = new mysqli($server_name, $db_username, $db_password, $database);

        if($conn->connect_error){
            die("Connection Faild: ".$conn->connect_error);
        }else{
            return $conn;
            //echo "Success";
        }
    }

?>