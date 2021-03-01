<?php

    include 'db_conn.php';
    include 'functions.php';

    isset($_POST['size']) ? $size = $_POST['size'] : $size = "Nepoznato";
    isset($_POST['price']) ? $price = $_POST['price'] : $price = "Nepoznato";
    isset($_POST['construction_year']) ? $construction_year = $_POST['construction_year'] : $construction_year = "Nepoznato";
    isset($_POST['info']) ? $info = $_POST['info'] : $info = "Nepoznato";
    isset($_POST['city_id']) && is_numeric($_POST['city_id']) ? $city_id = $_POST['city_id'] : $city_id = "Null";
    isset($_POST['ad_id']) && is_numeric($_POST['ad_id']) ? $ad_id = $_POST['ad_id'] : $ad_id = "Null";
    isset($_POST['type_of_real_estate_id']) && is_numeric($_POST['type_of_real_estate_id']) ? $type_of_real_estate_id = $_POST['type_of_real_estate_id'] : $type_of_real_estate_id = "Null";

    if(isset($_FILES['image']) && $_FILES['image']['tmp_name'] != ""){
        $new_file_name_col = ",image";
        $new_file_name_val = ",'".uploadImage('image')."'";
    }else{
        $new_file_name_col = "";
        $new_file_name_val = "";
    }

    $sql = "INSERT INTO real_estate ( size, 
                                      price, 
                                      construction_year, 
                                      info,
                                      city_id, 
                                      ad_id, 
                                      type_of_real_estate_id
                                      $new_file_name_col
                                    ) 
                            VALUES  ('$size',
                                     '$price',
                                     '$construction_year',
                                     '$info',
                                     '$city_id',
                                     '$ad_id',
                                     '$type_of_real_estate_id'
                                     $new_file_name_val
                                    )";

    $result = mysqli_query($db_conn, $sql);

    if($result) {
        header("location: ./index.php?msg=ok");
    }else{
        header("location: ./index.php?msg=error");
    }

?>