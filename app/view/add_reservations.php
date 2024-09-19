<?php

$title="add reservations";

require __DIR__."/layout/header.php";

?>
<form action="" method="post">
    <fieldset>
        <legend>add reservation</legend>
        
        <input type="text" name="Code_reservation" placeholder="Code reservation" ><br><br>
        
        <select name="id_type_chambre">
            <?php foreach ($data['type_chambre'] as $obj) :?>
                <option value="<?= $obj->id_type_chambre ?>"><?= $obj->type_chambre ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
    
        <select name="id_client" >
            <?php foreach ($data['clients'] as $obj) :?>
                <option value="<?= $obj->id_client ?>"><?= $obj->nom_complet ?></option>
            <?php endforeach; ?>
        </select>
        <br><br>
        <input type="number" name="nbr_adultes_enfants" placeholder="Nombre adultes enfants de chambre" >
        <br><br>
        <input type="date" name="date_arrivee" >
 
        <input type="date" name="date_depart" >
        <br><br>
        <input type="submit" value="add" id="submit" name="go" >
        <input type="hidden" id="id_chambre" name="id_chambre" value="">
    </fieldset>
</form>

<?php if (isset($data['table_chambre'])) : ?>
    <table>
        <tr>
        <table>
            <tr>
                <th>Image Chambre</th>
                <th>Numero de chambre</th>
                <th>type de la chambre</th>
                <th>Nombre adultes enfants de chambre</th>
                <th>renfort Chambre (+ 1 lits)</th>
                <th>Option</th>
            </tr>
            <?php foreach($data['table_chambre'] as $obj_chambre): ?>
                <tr>
                    <td><img src="/pictures/chambres/<?= $obj_chambre->photo_chambre ?>" width="300" height="200"></td>
                    <td><?= $obj_chambre->numero_chambre ?></td>
                    <td><?= $obj_chambre->type_chambre ?></td>
                    <td><?= $obj_chambre->nombre_adultes_enfants_ch ?></td>
                    <td><?php echo $obj_chambre->renfort_chambre == 1 ? "Renfortable" : "Pas Renfortable"; ?></td>
                    
                    <td>
                        <a href="/reservations/validee/<?= $obj_chambre->id_chambre ?>/<?= $_POST['id_client'] ?>/<?= $_POST['Code_reservation']  ?>/<?= $_POST['date_depart'] ?>/<?= $_POST['date_arrivee'] ?>/<?= $_POST['nbr_adultes_enfants'] ?>">valider</a>
     
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        </tr>
    </table>
<?php endif; ?>



<?php
require __DIR__."/layout/footer.php";
?>
