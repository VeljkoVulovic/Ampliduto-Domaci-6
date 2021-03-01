<?php

    include 'db_conn.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Error: No ID");

    $sql = "DELETE FROM real_estate WHERE id = $id"; 
    $result = mysqli_query($db_conn, $sql);

    if($result){
        header("location: index.php?msg=ok");
    }else{
        header("location: index.php?msg=error");
    }
?>