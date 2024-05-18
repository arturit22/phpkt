<!DOCTYPE html>
<html lang="et">
<head>
    <title>Title</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <style>
        .banner1, .banner2 {
            height: 300px;
            width: 100%;
            object-fit: cover;
            background-position: center;
            border-radius: 0;
            margin-top: 15px;
        }
        .bg-lightgrey {
            background-color: #d3d3d3 !important; 
            padding: 20px 0; 
        }
    </style>

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

    <?php
     $pilt = ["b17.jpg", "b10.jpg", "b4.jpg", "b7.jpg", "b18.jpg"];
     $text = ["<p class='card-text text-light mb-0'><b>parim pakkumine</b></p>
     <h2 class='card-text text-light mb-0'>osta 1 saad 1</h2>
     <p class='card-text text-light mb-0'>The best classic dress is on sale at cora</p>", "<p class='card-text text-light mb-0'><b>kevad/suvi</b></p>
     <h2 class='card-text text-light mb-0'>kõik rohelised</h2>
     <p class='card-text text-light mb-0'>20% soodsamalt</p>", "<p class='card-text text-light mb-0'><b>sügis/talv</b></p>
     <h2 class='card-text text-light mb-0'>ägedad jalatsid</h2>
     <p class='card-text text-light mb-0'>40% soodsamalt</p>", "<p class='card-text text-light mb-0'><b>aksessuaarid</b></p>
     <h2 class='card-text text-light mb-0'>ägedad mütsid</h2>
     <p class='card-text text-light mb-0'>väga soojad</p>", "<p class='card-text text-light mb-0'><b>osta 2 saad 1</b></p>
     <h2 class='card-text text-light mb-0'>sokid</h2>
     <p class='card-text text-light mb-0'>mustad ja valged</p>"];
     $randpilt = $pilt[array_rand($pilt)];
     $randpilt2 = $pilt[array_rand($pilt)];
     $randtext = $text[array_rand($text)];
     $randtext2 = $text[array_rand($text)];
    ?>
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="card border-1 banner1" style="background-image: url('<?php echo $randpilt; ?>');">

                    <div class="card-img-overlay d-flex flex-column justify-content-center">
                        <div>
                            <?php echo $randtext2; ?>
                            <a href="#" class="btn btn-outline-light mt-3 rounded-0">vaata lähemalt</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card border-1 banner2" style="background-image: url('<?php echo $randpilt2; ?>');">

                    <div class="card-img-overlay d-flex flex-column justify-content-center">
                        <div>
                            <?php echo $randtext; ?>
                            <a href="#" class="btn btn-outline-light mt-3 rounded-0">tutvu lähemalt</a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <br>
    <h1 class="text-center"><b>Parimad pakkumised</b></h1>

    <div class="container mt-5">
        <div class="row">


        <?php
$csv = "asjad.csv";
if (($handle = fopen($csv, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $pilt2 = $data[0];
        $nimi = $data[1];
        $hind = $data[2];
        $pilt2 = str_replace("https://localhost/", "", trim($pilt2));
        echo '
        <div class="col-md-3 mb-4">
            <div class="card border-1 p-2">
                <img src="' . htmlspecialchars($pilt2) . '" class="card-img-top rounded-3" alt="' . htmlspecialchars($nimi) . '">
                <div class="card-body">
                    <h5 class="card-title mb-0"><b>' . htmlspecialchars($nimi) . '</b></h5>
                    <p class="card-text"><b>' . htmlspecialchars($hind) . '€</b></p>
                </div>
            </div>
        </div>';
    }
    fclose($handle);
}
?>


        <div class="bg-lightgrey container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>artur</p>
                    <br>
                    <br>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"    crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    </body>
</html>
