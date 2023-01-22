<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php'); 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/catalog_code.php');
?>

<a href="../forms/catalog_form.php" class="text-light">
    <button class="btn btn-primary">Adaugare</button>
</a>

<div class="tableFixed mt-3">
    <table class="table table-hover" >
        <thead class="table-secondary">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Interventie</th>
                <th scope="col">Pret materiale</th>
                <th scope="col">Pret manopera</th>
                <th scope="col">Pret Total</th>
                <th scope="col">Optiuni</th>
            </tr>
        </thead>

        <tbody>
            <?php 
                if($rezultatSelect) {
                    while($rand = mysqli_fetch_assoc($rezultatSelect)) {
                        $id = $rand['id'];
                        $nume = $rand['nume_interventie'];
                        $pretMat = $rand['cost_materiale'];
                        $pretMan = $rand['pret_manopera'];
                        $pretTot = $rand['pret_total'];
                        
                        echo "<tr>
                                <th scope='row'>$id</th>
                                <td>$nume</td>
                                <td>$pretMat</td>
                                <td>$pretMan</td>
                                <td>$pretTot</td>
                                <td>
                                    <a href='../forms/catalog_form.php?id=$id'>
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