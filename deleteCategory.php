<?php
    include "databaseFunction.php";

    $category_id = $_GET['category_id'];

    deleteCategory($category_id);
?>