<?php

    include 'db_conn.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Error: No ID");

    $sql = "SELECT real_estate.*,
                   city.name as city_name,
                   ad.name as ad_name,
                   type_of_real_estate.name as type_of_real_estate_name
            FROM real_estate, city, ad, type_of_real_estate
            WHERE real_estate.id = $id 
            AND real_estate.city_id = city.id 
            AND real_estate.ad_id = ad.id 
            AND real_estate.type_of_real_estate_id = type_of_real_estate.id"; 

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
    <div class="row">
        <div class="col-6 mt-3 mb-3">
            <img src="<?=$image?>" alt="" width="500px">
        </div>
        <div class="col-1"></div>
        <div class="col-5 mt-3 mb-3">
            <p>#<?=$real_estate['id']?></p>
            <p>Kvadratura: <?=$real_estate['size']?></p>
            <p>Cijena: <?=$real_estate['price']?></p>
            <p>Godina izgradnje: <?=$real_estate['construction_year']?></p>
            <p>Info: <?=$real_estate['info']?></p>
            <p>Grad: <?=$real_estate['city_name']?></p>
            <p>Oglas: <?=$real_estate['ad_name']?></p>
            <p>Tip: <?=$real_estate['type_of_real_estate_name']?></p>
        </div>
    </div>
</body>
</html>