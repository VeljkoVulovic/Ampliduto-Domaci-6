<?php

    include 'db_conn.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Error: No ID");

    $sql = "DELETE FROM type_of_real_estate WHERE id = $id"; 
    $result = mysqli_query($db_conn, $sql);

    if($result){
        header("location: manage_type_of_real_estate.php?msg=ok");
    }else{
        header("location: manage_type_of_real_estate.php?msg=error");
    }
?>