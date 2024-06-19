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

// var_dump($hotels)
// foreach ($hotels as $key => $hotelList) {
//     echo '<hr>';
//     foreach ($hotelList as $key => $hotel) {
//         echo $hotel;
//     }
// }


// assegno alla variabile il valore della select:
$park_selected = $_GET['parking'];
// definisco una fariabile dove ciclare gli hotel filtrati dalla select:
$filteredHotels = [];

// condizione per filtrare gli hotel:
if ($park_selected !== '') {
    $park_select = $park_selected === '1' ? true : false;
    foreach ($hotels as $hotelList) {
        if ($hotelList['parking'] == $park_select) {
            $filteredHotels[] = $hotelList;
        }
    }
} else {
    $filteredHotels = $hotels;
}

// var_dump($filteredHotels);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- css -->
    <link rel="stylesheet" href="./style.css" type="text/css">
    <title>PHP Hotel</title>
</head>

<body>
    <section class="mt-5">
        <div class="container">
            <h1 class="text-center mb-5">Hotels</h1>

            <!-- Form per il filtro -->
            <form method="GET" action="">
                <div class="d-flex my-5">
                    <div class="form-group col-3">
                        <label class="mb-2 mt-5" for="parking">Filtro Parcheggio:</label>
                        <select name="parking" id="parking" class="form-control blue-select">
                            <option value="">Tutti</option>
                            <option value="1" <?php if (isset($_GET['parking']) && $_GET['parking'] == '1') echo 'selected'; ?>>Sì</option>
                            <option value="0" <?php if (isset($_GET['parking']) && $_GET['parking'] == '0') echo 'selected'; ?>>No</option>
                        </select>
                    </div>
                    <div class="col-1 align-content-end ps-3">
                        <button type="submit" class="btn btn-primary">Filtra</button>
                    </div>
                </div>
            </form>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name Hotel</th>
                        <th scope="col">Descriptio</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Vote</th>
                        <th scope="col">Distance to Center</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filteredHotels as $key => $hotelList) : ?>
                        <tr>
                            <th scope="row"><?php echo $key + 1; ?></th>
                            <?php foreach ($hotelList as $key => $hotel) : ?>
                                <?php if ($key === 'parking') : ?>
                                    <td><?php echo $hotel ? 'Sì' : 'No'; ?></td>
                                <?php else : ?>
                                    <td><?php echo $hotel; ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </section>

</body>

</html>