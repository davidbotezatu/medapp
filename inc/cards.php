<!-- Bara de cautare -->
<div class="card card-body bg-light">
    <h4>Cautare</h4>

    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Cautare" aria-label="Search">
        <button class="btn btn-secondary" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>
</div>

<!-- Navigare -->
<div class="card card-body bg-light mt-3">
    <div class="list-group">
        <a href="/medapp/index.php" class="list-group-item list-group-item-action <?php echo ($pag == "index.php") ? "active" : "" ?>">Pagina Principala</a>
        <a href="/medapp/html/medici.php" class="list-group-item list-group-item-action <?php echo ($pag == "medici.php") ? "active" : "" ?>">Medici</a>
        <a href="/medapp/html/pacienti.php" class="list-group-item list-group-item-action <?php echo ($pag == "pacienti.php") ? "active" : "" ?>">Pacienti</a>
        <a href="/medapp/html/consultatii.php" class="list-group-item list-group-item-action <?php echo ($pag == "consultatii.php") ? "active" : "" ?>">Consultatii</a>
        <a href="/medapp/html/plati.php" class="list-group-item list-group-item-action <?php echo ($pag == "plati.php") ? "active" : "" ?>">Plati</a>
        <a href="/medapp/html/programari.php" class="list-group-item list-group-item-action <?php echo ($pag == "programari.php") ? "active" : "" ?>">Programari</a>
        <a href="/medapp/html/catalog.php" class="list-group-item list-group-item-action <?php echo ($pag == "catalog.php") ? "active" : "" ?>">Catalog</a>
    </div>
</div>