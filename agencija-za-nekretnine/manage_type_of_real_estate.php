<?php
    include 'db_conn.php';

    $upit = "SELECT * FROM type_of_real_estate";
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
            <a class="nav-link active" href="./index.php">Pocetna</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="./create_type_of_real_estate.php"><b>Dodaj tip nekretnine</b></a>
        </li>
    </ul>
    <div class="container">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Ime</th>
                <th>Izmijeni</th>
                <th>Izbrisi</th>
            </tr>
        </thead>
        <tbody>
        <?php
            while($row = mysqli_fetch_assoc($result) ){
                $temp_id = $row['id'];
                $linkEdit = "<a href=\"edit_form_type_of_real_estate.php?id=$temp_id\">Edit</a>";
                $linkDelete = "<a href=\"delete_type_of_real_estate.php?id=$temp_id\">Delete</a>";
                
                echo "<tr>";
                echo "  <td>".$row['id']."</td>";
                echo "  <td>".$row['name']."</td>";
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