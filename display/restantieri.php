<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php'); 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/restantieri_code.php');
?>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pacient</th>
                <th scope="col">Medic</th>
                <th scope="col">Data si Ora Consultatiei</th>
                <th scope="col">Pret Consultatie</th>
                <th scope="col">Rest Plata</th>
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
                        $rest = $rand['rest_plata'];

                        if(is_null($rest)) {
                            $rest = getPretConsultatie($id);
                        }

                        if($rest != 0) {
                            echo "<tr>
                                    <th scope='row'>$id</th>
                                    <td>$pacient</td>
                                    <td>$medic</td>
                                    <td>$data</td>
                                    <td>" . getPretConsultatie($id) . "</td>
                                    <td>$rest</td>
                                    <td>
                                        <a href='plati.php?id=$id'>
                                            <button class='btn btn-danger ms-3'>Plati</button>
                                        </a>
                                    </td>
                                </tr>"
                            ;
                        }
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>