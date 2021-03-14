<?php
    include "databaseFunction.php";

    $account_id = $_GET['account_id'];

    deleteUser($account_id);
?>