<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>

    <body>
        <!-- Meniu Navigare -->
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <div class="container-fluid">
                <a href="/medapp/index.php" class="navbar-brand">MedApp</a>
                
                <!-- Buton ascundere meniu cand e ecranul prea mic -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Optiuni Meniu -->
                <div class="collapse navbar-collapse" id="navmenu">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="/medapp/html/medici.php" class="nav-link">Medici</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/pacienti.php" class="nav-link">Pacienti</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/consultatii.php" class="nav-link">Consultatii</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/plati.php" class="nav-link">Plati</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/catalog.php" class="nav-link">Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a href="/medapp/html/programari.php" class="nav-link">Programari</a>
                        </li>
                    </ul>
                </div>

                <!-- Search bar -->
                <div class="collapse navbar-collapse justify-content-end" id="navmenu">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>

            </div>
        </nav>