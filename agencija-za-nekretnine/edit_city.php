<?php

    include 'db_conn.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : exit("Error: No ID");
    $name = $_POST['name'];
    

    $sql = "UPDATE city SET city.name = '$name' WHERE id = $id";

    $result = mysqli_query($db_conn, $sql);

    if($result) {
        header("location: ./manage_city.php?msg=ok");
    }else{
        header("location: ./manage_city.php?msg=error");
    }

?>