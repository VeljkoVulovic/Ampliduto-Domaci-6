<?php

    include 'db_conn.php';

    $where_arr = [];
    $where_arr[] = " 1=1 ";

    if( isset($_GET['size1']) && $_GET['size1'] != ""){
        $size1 = strtolower($_GET['size1']);
        $where_arr[] = " size >= $size1 ";
    }
    if( isset($_GET['size2']) && $_GET['size2'] != ""){
        $size2 = strtolower($_GET['size2']);
        $where_arr[] = " size <= $size2 ";
    }
    if( isset($_GET['price1']) && $_GET['price1'] != ""){
        $price1 = strtolower($_GET['price1']);
        $where_arr[] = " price >= $price1 ";
    }
    if( isset($_GET['price2']) && $_GET['price2'] != ""){
        $price2 = strtolower($_GET['price2']);
        $where_arr[] = " price <= $price2 ";
    }
    if( isset($_GET['date1']) && $_GET['date1'] != ""){
        $date1 = strtolower($_GET['date1']);
        $where_arr[] = " construction_year >= '$date1' ";
    }
    if( isset($_GET['date2']) && $_GET['date2'] != ""){
        $date2 = strtolower($_GET['date2']);
        $where_arr[] = " construction_year <= '$date2' ";
    }
    if( isset($_GET['city_id']) && $_GET['city_id'] != ""){
        $city_id = strtolower($_GET['city_id']);
        $where_arr[] = " lower(city_id) LIKE '%$city_id' ";
    }
    if( isset($_GET['ad_id']) && $_GET['ad_id'] != ""){
        $ad_id = strtolower($_GET['ad_id']);
        $where_arr[] = " lower(ad_id) LIKE '%$ad_id' ";
    }
    if( isset($_GET['type_of_real_estate_id']) && $_GET['type_of_real_estate_id'] != ""){
        $type_of_real_estate_id = strtolower($_GET['type_of_real_estate_id']);
        $where_arr[] = " lower(type_of_real_estate_id) LIKE '%$type_of_real_estate_id' ";
    } 

    $where_str = implode( "AND",$where_arr);

    $upit = "SELECT real_estate.*,
                    city.name as city_name,
                    ad.name as ad_name,
                    type_of_real_estate.name as type_of_real_estate_name
            FROM real_estate, city, ad, type_of_real_estate 
            WHERE $where_str 
            AND real_estate.city_id = city.id 
            AND real_estate.ad_id = ad.id 
            AND real_estate.type_of_real_estate_id = type_of_real_estate.id 
            ORDER BY real_estate.id ASC";

    // var_dump($upit);
    $result = mysqli_query($db_conn, $upit);
    $count = mysqli_num_rows($result);

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
            <a class="nav-link active" href="./manage_city.php">Gradovima</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="./manage_type_of_real_estate.php">Tip nekretnina</a>
        </li>
    </ul>
    <div class="container bg-light">
    <form action="./index.php" method="GET">
    <div class="row">
        <div class="col mt-3">
            <input class="form-control" type="number" name="size1" placeholder="Unesite kvadraturu od">
        </div>
        <div class="col mt-3">
            <input class="form-control" type="number" name="size2" placeholder="Unesite kvadraturu do">
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <input class="form-control" type="number" name="price1" placeholder="Unesite cijenu od">
        </div>
        <div class="col mt-3">
            <input class="form-control" type="number" name="price2" placeholder="Unesite cijenu do">
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
            <input class="form-control" type="date" name="date1" placeholder="Unesite datum od">
        </div>
        <div class="col mt-3">
            <input class="form-control" type="date" name="date2" placeholder="Unesite datum do">
        </div>
    </div>
    <div class="row">
        <div class="col mt-3">
        <select class="custom-select" name="city_id" id="">
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
        <select class="custom-select" name="ad_id" id="">
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
        <select class="custom-select" name="type_of_real_estate_id" id="">
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
            <a class="nav-link active mt-3 ml-3" href="./create_real_estate.php"><b>Dodaj nekretninu</b></a>
            <div class="col mb-2 mr-3">
                <button class=" btn btn-success mt-3 float-right mr-3">Pretrazi</button>
            </div>
        </div>
        </div>
    </form>
    </div>
    <div class="container mt-3">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Tip</th>
                <th>Oglas</th>
                <th>Kvadratura</th>
                <th>Cijena</th>
                <th>Grad</th>
                <th>Godina izgradnje</th>
                <th>Info</th>
                <th>Detalji</th>
                <th>Izmijeni</th>
                <th>Izbrisi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($row = mysqli_fetch_assoc($result) ){
                $temp_id = $row['id'];
                $linkDetails = "<a href=\"details_real_estate.php?id=$temp_id\">Details</a>";
                $linkEdit = "<a href=\"edit_form_real_estate.php?id=$temp_id\">Edit</a>";
                $linkDelete = "<a href=\"delete_real_estate.php?id=$temp_id\">Delete</a>";
                
                echo "<tr>";
                echo "  <td>".$row['id']."</td>";
                echo "  <td>".$row['type_of_real_estate_name']."</td>";
                echo "  <td>".$row['ad_name']."</td>";
                echo "  <td>".$row['size']."</td>";
                echo "  <td>".$row['price']."</td>";
                echo "  <td>".$row['city_name']."</td>";
                echo "  <td>".$row['construction_year']."</td>";
                echo "  <td>".$row['info']."</td>";
                echo "  <td>".$linkDetails."</td>";
                echo "  <td>".$linkEdit."</td>";
                echo "  <td>".$linkDelete."</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
    <p class="mt-3 mr-5 float-right">Ukupno: <?=$count?></p>
    </div>
    
</body>
</html>