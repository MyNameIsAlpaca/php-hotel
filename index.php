<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $parcheggio = isset($_GET['parcheggio']) ?$_GET['parcheggio'] :"";

    $rate = isset($_GET['rate']) ?$_GET['rate'] :"";


?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel BoVaGo</title>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <div class="hotel">
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza dal centro</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            foreach($hotels as $hotel){
                ?>
                    <tr class="<?php if($parcheggio == 'no' && $hotel['parking'] == true) {echo 'hidden';} elseif($parcheggio == 'yes' && $hotel['parking'] == false){echo 'hidden';}?> <?php if($rate > $hotel['vote']) { echo 'hidden';} ?>">
                        <th scope="row"><?php echo $hotel['name'] ?></th>
                        <td><?php echo $hotel['description'] ?></td>
                        <td><?php echo $hotel['parking'] ? 'Si' : 'No' ?></td>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] ?> Km</td>
                    </tr>
                </tbody>
                <?php
            }
            ?>
        </table>    
    </div>
    <div class="container">
        <h3>Filtra la tua ricerca</h3>
        <form action="index.php">
            <select name="parcheggio">
                <option value="both">Scegli un'opzione</option>
                <option value="yes">Solo hotel con parcheggio</option>
                <option value="no">Solo hotel senza parcheggio</option>
            </select>
            <select name="rate">
                <option value="0">Scegli un voto</option>
                <option value="1">Da 1 stella in su</option>
                <option value="2">Da 2 stelle in su</option>
                <option value="3">Da 3 stelle in su</option>
                <option value="4">Da 4 stelle in su</option>
                <option value="5">Da 5 stelle in su</option>
            </select>
            <button type="submit">Invia</button>
        </form>
    </div>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>