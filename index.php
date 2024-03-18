<!-- Descrizione
Partiamo da questo array di hotel. https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo, da bravi sviluppatori, aggiungete Bootstrap e mostrate le informazioni con una tabella.

Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
3 - Fare tutto in un'unica pagina: nella stessa pagina verrà mostrato l'elenco di tutti gli hotel e in base alla compilazione del form verrà mostrato al di sotto (dopo il refresh della pagina) l'elenco di hotel filtrato correttamente
NOTA: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel. (modificato)  -->

<?php
$vote = $_GET['vote'];
$parking = $_GET['parking'];




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

    if ($parking) {
        $hotels = array_filter($hotels, function($hotel) {
            return $hotel['parking'];
        });

    };

    // inserisco il vote filter
    if (!is_null($vote)) {
        $hotels = array_filter($hotels, function($hotel) use ($vote) {
            return $hotel['vote'] >= $vote;
        });
    };

    if (!$parking && is_null($vote)) {
        $hotels = $hotels;    

    }


?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP- Hotels</title>
</head>
<body>
<div class="container">
    <h1>Hotel Filter</h1>

    <form>

        <div class="mb-3">
            <label for="vote" class="form-label">Numero di stelle richiesto</label>
            <input type="form-control" name="vote" class="form-control" id="vote">
        </div>


        <div class="mb-3 form-check">
            <input type="checkbox" name="parking" class="form-check-input" id="parking">
            <label class="form-check-label" for="parking">Parcheggio in struttura</label>
        </div>
        <button type="submit" class="btn btn-primary">Invia</button>

    </form>

    <table class="table bg-primary ">

        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Parking</th>
                <th>Vote</th>
                <th>Distance to Center</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($hotels as $selHotel) {
                    echo "<tr>";
                    foreach($selHotel as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>

    </table>
    </div>


<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>