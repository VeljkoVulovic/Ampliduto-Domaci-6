<?php

    include 'db_conn.php';
    include 'functions.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : exit("Error: No ID");
    $size = $_POST['size'];
    $price = $_POST['price'];
    $construction_year = $_POST['construction_year'];
    $info = $_POST['info'];
    $city_id = $_POST['city_id'];
    $ad_id = $_POST['ad_id'];
    $type_of_real_estate_id = $_POST['type_of_real_estate_id'];

    if(isset($_FILES['image']) && $_FILES['image']['tmp_name'] != ""){
        $new_file_name = uploadImage('image');
        $update_image = " ,image = '$new_file_name' ";

        $old_image = mysqli_fetch_row(mysqli_query($db_conn, "SELECT real_estate.image FROM real_estate WHERE id = $id"))[0];
        unlink($old_image);
    }else{
        $update_image = "";
    }

    $sql = "    UPDATE real_estate SET 
                                   size = '$size',
                                   price = '$price',
                                   construction_year = '$construction_year',
                                   info = '$info',
                                   city_id = '$city_id',
                                   ad_id = '$ad_id',
                                   type_of_real_estate_id = '$type_of_real_estate_id'
                                   $update_image
                WHERE id = $id";

    $result = mysqli_query($db_conn, $sql);

    if($result) {
        header("location: ./index.php?msg=ok");
    }else{
        header("location: ./index.php?msg=error");
    }

?>