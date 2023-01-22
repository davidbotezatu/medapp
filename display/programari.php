<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/programare_code.php');
?>

<a href="../forms/programare_form.php">
    <button class="btn btn-primary">Adaugare</button>
</a>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nume Pacient</th>
                <th scope="col">Nume Medic</th>
                <th scope="col">Data si Ora</th>
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

                        echo "<tr>
                                <th scope='row'>$id</th>
                                <td>" . specificSelect($pacient, "p") ."</td>
                                <td>" . specificSelect($medic, "m") . "</td>
                                <td>$data</td>
                                <td>
                                    <a href='../forms/programare_form.php?id=$id'>
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