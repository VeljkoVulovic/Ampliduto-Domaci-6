<?php
  
    include 'db_conn.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Error: No ID");

    $sql = "SELECT * FROM real_estate WHERE id = $id"; 
    $result = mysqli_query($db_conn, $sql);

    if( mysqli_num_rows($result) == 0) {
        exit("Nekretnina ne postoji...") ;
    }

    $real_estate = mysqli_fetch_assoc($result);

    if($real_estate['image'] == "" || $real_estate['image'] == null) {
        $image = "./uploads/no_image.png";
    }else{
        $image = $real_estate['image'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'bootstrap.php' ?>
    <title>Agencija za nekretnine</title>
</head>
<body>
    <ul class="nav justify-content-center mt-2 mb-3">
        <li class="nav-item">
            <a class="nav-link active" href="./index.php">Pocetna</a>
        </li>
    </ul>
    <div class="container bg-light">
    <form action="./edit_real_estate.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="row">
            <div class="col mt-3">
                <input class="form-control" type="text" name="size" placeholder="Size" value="<?=$real_estate['size']?>">
            </div>
            <div class="col mt-3">
                <input class="form-control" type="text" name="price" placeholder="Price" value="<?=$real_estate['price']?>">
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
        <input class="form-control" type="date" name="construction_year" value="<?=$real_estate['construction_year']?>">
            </div>
            <div class="col mt-3">
        <input class="form-control" type="text" name="info" value="<?=$real_estate['info']?>">
            </div>
        </div>
        <div class="row">
        <div class="col mt-3">
        <select class="custom-select" name="city_id" id="">
            <option value="">izaberi grad</option>
            <?php
                $sql_city = "SELECT * FROM city ORDER BY name ASC";
                $result_city = mysqli_query($db_conn, $sql_city);
                $city_id = $real_estate['city_id'];
                while($row = mysqli_fetch_assoc($result_city)){
                    $temp_id = $row['id'];
                    $temp_name = $row['name'];
                    $selected = "";
                    if($city_id == $temp_id){
                        $selected = "selected";
                    }
                    echo "<option value=\"$temp_id\" $selected >$temp_name</option>";
                }
            ?>
        </select>
        </div>
            <div class="col mt-3">
        <select class="custom-select" name="ad_id" id="">
            <option value="">izaberi oglas</option>
            <?php
                $sql_ad = "SELECT * FROM ad ORDER BY name ASC";
                $result_ad = mysqli_query($db_conn, $sql_ad);
                $ad_id = $real_estate['ad_id'];
                while($row = mysqli_fetch_assoc($result_ad)){
                    $temp_id = $row['id'];
                    $temp_name = $row['name'];
                    $selected = "";
                    if($ad_id == $temp_id){
                        $selected = "selected";
                    }
                    echo "<option value=\"$temp_id\" $selected >$temp_name</option>";
                }
            ?>
        </select>
        </div>
            <div class="col mt-3">
        <select class="custom-select" name="type_of_real_estate_id" id="" require>
            <option value="">izaberi tip</option>
            <?php
                $sql_type = "SELECT * FROM type_of_real_estate ORDER BY name ASC";
                $result_type = mysqli_query($db_conn, $sql_type);
                $type_of_real_estate_id = $real_estate['type_of_real_estate_id'];
                while($row = mysqli_fetch_assoc($result_type)){
                    $temp_id = $row['id'];
                    $temp_name = $row['name'];
                    $selected = "";
                    if($type_of_real_estate_id == $temp_id){
                        $selected = "selected";
                    }
                    echo "<option value=\"$temp_id\" $selected >$temp_name</option>";
                }
            ?>
        </select>
        </div>
        </div>
        <div class="row">
            <div class="col mt-3 mb-2 mr-3">
                <img src="<?=$image?>" alt="" width="300px">
            </div>
        </div>
        <div class="row">
            <div class="col mb-2 mr-3">
                <input type="file" name="image">
                <button class=" btn btn-info float-right mr-3">Izmijeni</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>