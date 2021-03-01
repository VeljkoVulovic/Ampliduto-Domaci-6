<?php

    function uploadImage($image){
        $original_name = $_FILES[$image]['name'];
        $temp_name = $_FILES[$image]['tmp_name'];

        $temp_arr = explode(".", $original_name);
        $ext = $temp_arr[count($temp_arr) -1];

        $new_file_name = "./uploads/".uniqid().".".$ext;
        copy($temp_name, $new_file_name);
        
        return $new_file_name;
    }

?>