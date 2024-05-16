

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/9120ee6edc.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <p class="lead"><b>artur.ee</b></p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="PHPKT.php"><b>Avaleht</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pood.php"><b>Pood</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt.php"><b>Kontakt</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="admin.php"><b>Admin</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa-solid fa-bag-shopping"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<h2>Lisa uus kaup</h2>
<form action="töötlus.php" method="post">
    Pilt (lisa pildi url): <input type="text" name="pilt"><br>
    Nimetus: <input type="text" name="nimetus"><br>
    Hind: <input type="text" name="hind"><br>
    <input type="submit" value="Lisa">
</form>

<?php
// Funktsioon, et kustutada kirje CSV-failist
function kustutaKirje($index) {
    // CSV-faili asukoht
    $csv_file = 'asjad.csv';

    // Loeme CSV-faili ridadeks
    $read = file($csv_file);

    // Eemaldame kirje, mis vastab antud indeksile
    unset($read[$index]);

    // Kirjutame faili uuesti
    file_put_contents($csv_file, $read);

    echo "Kirje on edukalt kustutatud!";
}

// Kontrollime, kas on vajutatud kustutamisnuppu
if (isset($_GET['delete'])) {
    // Kui nuppu vajutati, kutsu kustutaKirje funktsiooni antud indeksiga
    kustutaKirje($_GET['delete']);
}
?>

<br>
<br>
<br>
<br>
<br>



<h2>Kaubad</h2>
<table class="table">
    <thead>
        <tr>
            <th>Pilt</th>
            <th>Nimetus</th>
            <th>Hind</th>
            <th>Kustuta</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Loeme CSV-faili
        $rows = array_map('str_getcsv', file('asjad.csv'));
        // Käime läbi iga rida
        foreach ($rows as $index => $row) {
            // Väljastame andmed tabelis
            echo "<tr>";
            echo "<td><img src='" . $row[0] . "' alt='Pilt'></td>";
            echo "<td>" . $row[1] . "</td>";
            echo "<td>" . $row[2] . "</td>";
            echo "<td><a href='?delete=$index'>Kustuta</a></td>";
            echo "</tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
