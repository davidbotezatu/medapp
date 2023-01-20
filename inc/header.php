<?php 
    $pag = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
    </head>

    <body>
        <!-- Meniu Navigare -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="/medapp/index.php" class="navbar-brand <?php echo ($pag == "index.php") ? "active" : "" ?>">MedApp</a>
                
                <!-- Buton ascundere meniu cand e ecranul prea mic -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Optiuni Meniu -->
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/medapp/html/medici.php" class="nav-link <?php echo ($pag == "medici.php") ? "active" : "" ?>">Medici</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/pacienti.php" class="nav-link <?php echo ($pag == "pacienti.php") ? "active" : "" ?>">Pacienti</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/consultatii.php" class="nav-link <?php echo ($pag == "consultatii.php") ? "active" : "" ?>">Consultatii</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/plati.php" class="nav-link <?php echo ($pag == "plati.php") ? "active" : "" ?>">Plati</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/programari.php" class="nav-link <?php echo ($pag == "programari.php") ? "active" : "" ?>">Programari</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/catalog.php" class="nav-link <?php echo ($pag == "catalog.php") ? "active" : "" ?>">Catalog</a>
                        </li>
                    </ul>
                </div>

                <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <div class="container">      
            <div class="row mt-5">
                <div class="bg-light rounded-3 col-md-12">
                    <div class="container-fluid py-5 p-5">