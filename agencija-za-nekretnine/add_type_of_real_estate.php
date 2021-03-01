<?php

    include 'db_conn.php';
    
    isset($_POST['name']) ? $name = $_POST['name'] : exit("Enter correct name");

    $sql = "INSERT INTO type_of_real_estate (name) VALUES ('$name')";
    $result = mysqli_query($db_conn, $sql);

    if($result) {
        header("location: ./manage_type_of_real_estate.php?msg=ok");
    }else{
        header("location: ./manage_type_of_real_estate.php?msg=error");
    }

?>