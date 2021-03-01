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
    <form action="./add_type_of_real_estate.php" method="POST">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mt-3">
        <input class="form-control" type="text" name="name" placeholder="Unesite tip">
        </div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6 mb-2 mr-3">
                <button class=" btn btn-success mt-3 float-right">Dodaj</button>
            </div>
            <div class="col-3"></div>
        </div>
    </form>
    </div>
</body>
</html>