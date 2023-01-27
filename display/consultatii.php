<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php'); 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/consultatie_code.php');
?>

<a href="../forms/consultatie_form.php">
    <button class="btn btn-primary">Adaugare</button>
</a>

<div class="tableFixed mt-3">

    <?php 
        //daca nu avem date in urma unei cautari, afisam un mesaj
        if(!is_null($searchErr)) {
            echo "<span style='color: crimson;'>$searchErr</span>";
        }
    ?>


    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pacient</th>
                <th scope="col">Medic</th>
                <th scope="col">Data si Ora</th>
                <th scope="col">Observatii</th>
                <th scope="col">Pret Consultatie</th>
                <th scope="col">Optiuni</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if($rezultatSelect) {
                    while($rand = mysqli_fetch_assoc($rezultatSelect)) {
                        $id = $rand['id'];
                        $pacient = $rand['pacient'];
                        $medic = $rand['medic'];
                        $data = $rand['data_programarii'];
                        $obs = $rand['observatii'];

                        echo "<tr>
                                <th scope='row'>$id</th>
                                <td>$pacient</td>
                                <td>$medic</td>
                                <td>$data</td>
                                <td>$obs</td>
                                <td>" . getPretConsultatie($id) . "</td>
                                <td>
                                    <a href='../forms/consultatie_form.php?id=$id'>
                                        <button class='btn btn-success'>Modifica</button></a>
                                    <a href='interventii.php?id=$id'>
                                        <button class='btn btn-primary ms-3'>Interventii</button></a>
                                    <a href='plati.php?id=$id'>
                                        <button class='btn btn-danger ms-3'>Plati</button>
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