<?php include($_SERVER['DOCUMENT_ROOT'] .'/medapp/inc/header.php'); ?>

<div class="container">
    <h1>Catalog Interventii</h1>
</div>

<div class="container d-flex justify-content-center">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="mt-4 w-75" method="POST">
        <div class="mb-3">
            <label for="nume" class="form-label">Nume</label>
            <input type="text" class="form-control" name="nume">
        </div>
        <div class="mb-3">
            <label for="nume" class="form-label">Nume</label>
            <input type="text" class="form-control" name="nume2">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary w-100" name="submit" value="Adaugare">
        </div>
    </form>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] .'/medapp/inc/footer.php'); ?>