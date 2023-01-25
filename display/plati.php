<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php'); 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/plata_code.php');

    //Afisam butonul de adaugare plati doar daca mai avem plati de facut. Daca am achitat tot, nu mai afisam butonul de delete.
    if($rest_plata > 0 || is_null($rest_plata)) {
        echo "<a href='../forms/plata_form.php'>
                <button class='btn btn-primary'>Adaugare</button>
            </a>"
        ;
    }
?>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Suma Platita</th>
                <th scope="col">Data Platii</th>
                <th scope="col">Rest de Plata</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if($rezultatSelect) {
                    while($rand = mysqli_fetch_assoc($rezultatSelect)) {
                        $suma = $rand['suma'];
                        $data = $rand['data_platii'];
                        $rest = $rand['rest_plata'];

                        echo "<tr>
                                <td>$suma</td> 
                                <td>$data</td> 
                                <td>$rest</td>
                            </tr>"
                        ;
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>