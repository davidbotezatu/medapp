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
        <link rel="stylesheet" type="text/css" href="/medapp/inc/styles.css">
    </head>

    <body>
        <!-- Meniu Navigare -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="/medapp/index.php" class="navbar-brand" <?php echo ($pag == "index.php") ? 'style = "color: aqua;"' : "" ?>>MedApp</a>
                
                <!-- Buton ascundere meniu cand e ecranul prea mic -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Optiuni Meniu -->
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/medapp/display/medici.php" class="nav-link" <?php echo ($pag == "medici.php") ? 'style = "color: aqua;"' : "" ?>>Medici</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/display/pacienti.php" class="nav-link" <?php echo ($pag == "pacienti.php") ? 'style = "color: aqua;"' : "" ?>>Pacienti</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/display/consultatii.php" class="nav-link" <?php echo ($pag == "consultatii.php") ? 'style = "color: aqua;"' : "" ?>>Consultatii</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/display/plati.php" class="nav-link" <?php echo ($pag == "plati.php") ? 'style = "color: aqua;"' : "" ?>>Plati</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/display/catalog.php" class="nav-link" <?php echo ($pag == "catalog.php") ? 'style = "color: aqua;"' : "" ?>>Catalog</a>
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
            <div class="row my-5 text-center">
                <?php 
                    switch($pag) {
                        case 'medici.php';
                            echo '<h1>Medici</h1>';
                            break;
                        case 'pacienti.php';
                            echo '<h1>Pacienti</h1>';
                            break;
                        case 'consultatii.php';
                            echo '<h1>Consultatii</h1>';
                            break;
                        case 'plati.php';
                            echo '<h1>Plati</h1>';
                            break;
                        case 'catalog.php';
                            echo '<h1>Catalog Servicii</h1>';
                            break;
                        case 'catalog_form.php';
                            echo '<h1>Interventie</h1>';
                            break;
                        case 'medici_form.php';
                            echo '<h1>Medic</h1>';
                            break;
                        case 'pacient_form.php';
                            echo '<h1>Pacient</h1>';
                            break;
                        case 'programare_form.php';
                            echo '<h1>Programare</h1>';
                            break;
                        case 'consultatie_form.php';
                            echo '<h1>Consultatie</h1>';
                            break;
                        default;
                            echo '<h1>' . $pag . '</h1>';
                            break;
                    }
                ?>
            </div>
        </div>

        <div class="container">      
            <div class="row">
                <div class="bg-light rounded-3 col-md-12">
                    <div class="container-fluid my-3">