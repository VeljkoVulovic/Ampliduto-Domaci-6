<?php

    include 'db_conn.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : exit("Error: No ID");
    $name = $_POST['name'];
    

    $sql = "UPDATE type_of_real_estate SET type_of_real_estate.name = '$name' WHERE id = $id";

    $result = mysqli_query($db_conn, $sql);

    if($result) {
        header("location: ./manage_type_of_real_estate.php?msg=ok");
    }else{
        header("location: ./manage_type_of_real_estate.php?msg=error");
    }

?>