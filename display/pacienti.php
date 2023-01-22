<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/pacient_code.php')
?>

<a href="../forms/pacient_form.php">
    <button class="btn btn-primary">Adaugare</button>
</a>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Nr Fisa</th>
                <th scope="col">Data Inregistrarii</th>
                <th scope="col">Nume</th>
                <th scope="col">Prenume</th>
                <th scope="col">Data Nasterii</th>
                <th scope="col">Adresa</th>
                <th scope="col">Numar Telefon</th>
                <th scope="col">Optiuni</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if($rezultatSelect) {
                    while($rand = mysqli_fetch_assoc($rezultatSelect)) {
                        $fisa = $rand['nr_fisa'];
                        $data_inreg = $rand['data_inregistrarii'];
                        $nume = $rand['nume'];
                        $prenume = $rand['prenume'];
                        $data_nasterii = $rand['data_nasterii'];
                        $adresa = $rand['adresa'];
                        $tel = $rand['numar_telefon'];

                        echo "<tr>
                                <th scope='row'>$fisa</th>
                                <td>$data_inreg</td>
                                <td>$nume</td>
                                <td>$prenume</td>
                                <td>$data_nasterii</td>
                                <td>$adresa</td>
                                <td>$tel</td>
                                <td>
                                    <a href='../forms/pacient_form.php?id=$fisa'>
                                        <button class='btn btn-success'>Modifica</button>
                                    </a>
                                </td>
                            </tr>"
                        ;
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>