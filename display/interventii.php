<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/header.php'); 
    include($_SERVER['DOCUMENT_ROOT'] . '/medapp/php/interventie_code.php');

    if(empty($_SESSION['userid'])) {
        header("Location: ../index.php");
        die();
    }
?>

<a href="../forms/interventie_form.php">
    <button class="btn btn-primary">Adaugare</button>
</a>

<div class="tableFixed mt-3">
    <table class="table table-hover">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Nume Interventie</th>
                <th scope="col">Pret</th>
            </tr>
        </thead>

        <tbody>
            <?php
                if($rezultatSelect) {
                    while($rand = mysqli_fetch_assoc($rezultatSelect)) {
                        $nume = $rand['nume_interventie'];
                        $pret = $rand['pret_total'];

                        echo "<tr>
                                <th scope='row'>$nume</th>
                                <td>$pret</td>
                            </tr>"
                        ;
                    }
                }
            ?>
        </tbody>
    </table>
</div>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/medapp/inc/footer.php'); ?>