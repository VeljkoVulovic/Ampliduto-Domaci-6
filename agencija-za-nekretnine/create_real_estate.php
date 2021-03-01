<?php 
    include 'db_conn.php';
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
    <form action="./add_real_estate.php" method="POST" enctype="multipart/form-data" >
        <div class="row">
            <div class="col mt-3">
        <input class="form-control" type="number" name="size" placeholder="Unesite kvadraturu">
            </div>
            <div class="col mt-3">
        <input class="form-control" type="number" name="price" placeholder="Unesite cijenu">
            </div>
        </div>
        <div class="row">
            <div class="col mt-3">
        <input class="form-control" type="date" name="construction_year">
        </div>
            <div class="col mt-3">
        <input class="form-control" type="text" name="info" placeholder="Unesite opis">
        </div>
        </div>
        <div class="row">
        <div class="col mt-3">
        <select class="custom-select" name="city_id" id="" require>
            <option value="">izaberi grad</option>
            <?php
                $sql_city = "SELECT * FROM city ORDER BY name ASC";
                $result_city = mysqli_query($db_conn, $sql_city);
                while($row = mysqli_fetch_assoc($result_city)){
                    $temp_id = $row['id'];
                    $temp_name = $row['name'];
                    echo "<option value=\"$temp_id\" >$temp_name</option>";
                }
            ?>
        </select>
        </div>
            <div class="col mt-3">
        <select class="custom-select" name="ad_id" id="" require>
            <option value="">izaberi oglas</option>
            <?php
                $sql_ad = "SELECT * FROM ad ORDER BY name ASC";
                $result_ad = mysqli_query($db_conn, $sql_ad);
                while($row = mysqli_fetch_assoc($result_ad)){
                    $temp_id = $row['id'];
                    $temp_name = $row['name'];
                    echo "<option value=\"$temp_id\" >$temp_name</option>";
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
                while($row = mysqli_fetch_assoc($result_type)){
                    $temp_id = $row['id'];
                    $temp_name = $row['name'];
                    echo "<option value=\"$temp_id\" >$temp_name</option>";
                }
            ?>
        </select>
        </div>
        </div>
        <div class="row">
            <div class="col mt-3 mb-2 mr-3">
                <input type="file" name="image">
                <button class=" btn btn-info float-right mr-3">Dodaj</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>