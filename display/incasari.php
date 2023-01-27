<?php
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/incasari_code.php');
$date = date("Y-m-d");
?>

<form action='<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>' class="was-validated" method='post'>
    <div class="row">
        <div class="col">
            <div class="form-floating mt-3">
                <input type="date" class="form-control is-invalid" name="data" placeholder="data" value="<?php echo $date ?>" required>
                <label for="data" class="form-label">Data</label>
            </div>
        </div>
        <div class="col mt-2 form-check">
            <div>
                <input type="radio" class="form-check-input" name="radio" id="radioTotal" value="1" checked>
                <label for="radioTotal" class="form-check-label">Full DB</label>
            </div>

            <div>
                <input type="radio" class="form-check-input" name="radio" id="radioZi" value="2">
                <label for="radioZi" class="form-check-label">Zi</label>
            </div>

            <div>
                <input type="radio" class="form-check-input" name="radio" id="radioLuna" value="3">
                <label for="radioLuna" class="form-check-label">Luna</label>
            </div>
        </div>
        <div class="col">
            <input class="btn btn-danger float-end mt-4" type="submit" name="submit" value="Afisare"></button>
        </div>
    </div>
</form>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Suma</th>
                <th scope="col">Data Platii</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if($rezultatSelect) {
                    while($rand = mysqli_fetch_assoc($rezultatSelect)) {
                        $suma = $rand['suma'];
                        $data = $rand['data_platii'];

                        echo "<tr>
                                <td>$suma</td>
                                <td>$data</td>
                            </tr>"
                        ;
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>