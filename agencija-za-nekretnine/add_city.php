<?php

    include 'db_conn.php';
    
    isset($_POST['name']) ? $name = $_POST['name'] : exit("Morate unijeti ime");

    $sql = "INSERT INTO city (name) VALUES ('$name')";
    $result = mysqli_query($db_conn, $sql);

    if($result) {
        header("location: ./manage_city.php?msg=ok");
    }else{
        header("location: ./manage_city.php?msg=error");
    }

?>