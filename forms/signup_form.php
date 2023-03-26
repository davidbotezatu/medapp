<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php'); ?>

<section>
    <form action="signup_code.php" method="post" class="was-validated">
        <div class="form-floating mb-3">
            <input type="text" class="form-control is-invalid" name="username" placeholder="username" required>
            <label for="username" class="form-label">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control is-invalid" name="email" placeholder="email" required>
            <label for="email" class="form-label">Email</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control is-invalid" name="parola" placeholder="parola" required>
            <label for="parola" class="form-label">Parola</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control is-invalid" name="reintroducereparola" placeholder="reintroducereparola" required>
            <label for="reintroducereparola" class="form-label">Repeta Parola</label>
        </div>

        <div class="mb-3">
            <button class="btn btn-primary" type="submit" name="submit">Inregistrare</button>
        </div>
    </form>
</section>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>