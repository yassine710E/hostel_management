<?php

$title="Modify Chambre";

require __DIR__."/layout/header.php";

    
?>

<form action="" method="post" enctype="multipart/form-data">


        <!-- Numéro de la chambre -->
        <label for="numero_chambre">Numéro de la chambre :</label>
        <input type="text" id="numero_chambre" name="numero_chambre" value="<?= $data['chambre']->numero_chambre ?>" ><br><br>

        <!-- Type de la chambre -->
        <label for="type_chambre">Type de la chambre :</label>
        <select id="type_chambre" name="id_type_chambre" >
            <?php foreach($data['type_chambre'] as $obj_type_chambre): ?>
                <option value="<?= $obj_type_chambre->id_type_chambre?>" <?php echo $data['chambre']->id_type_chambre==$obj_type_chambre->id_type_chambre?"selected":"" ?>><?= $obj_type_chambre->type_chambre ?> </option>
            <?php endforeach ?>
        </select><br><br>

        <!-- Capacité de la chambre -->
        <label for="capacite_chambre">Capacité de la chambre :</label>
        <select id="capacite_chambre" name="id_capacite">
        <?php foreach($data['capacite_chambre'] as $obj_capacite_chambre): ?>
            <option value="<?= $obj_capacite_chambre->id_capacite?>" <?php echo $data['chambre']->id_capacite==$obj_capacite_chambre->id_capacite?"selected":"" ?> ><?= $obj_capacite_chambre->numero_capacite ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <!-- Tarif de la chambre -->
        <label for="tarif_chambre">Tarif de la chambre (par nuit) :</label>
        <select id="tarif_chambre" name="id_tarif" >
        <?php foreach($data['tarif_chambre'] as $obj_tarif_chambre): ?>
            <option value="<?= $obj_tarif_chambre->id_tarif ?>" <?php echo $data['chambre']->id_tarif==$obj_tarif_chambre->id_tarif?"selected":"" ?> ><?php echo $obj_tarif_chambre->N_prix_nuit>0?"prix de nuit :".$obj_tarif_chambre->N_prix_nuit:"prix de nuit :".$obj_tarif_chambre->prix_base_nuit ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <!-- Nombre de lits -->
        <label for="nbr_lits_chambre">Nombre de lits :</label>
        <input type="number" id="nbr_lits_chambre" name="nbr_lits_chambre" min="1"  value="<?= $data['chambre']->nbr_lits_chambre ?>"><br><br>

        <!-- Étage -->
        <label for="etage_chambre">Étage :</label>
        <input type="number" id="etage_chambre" name="etage_chambre" min="0" value="<?= $data['chambre']->etage_chambre ?>" ><br><br>

        <!-- Nombre des personnes (Adultes / Enfants) -->
        <label for="nombre_adultes_enfants_ch">Nombre de personnes (Adultes/Enfants) :</label>
        <input type="number" id="nombre_adultes_enfants_ch" name="nombre_adultes_enfants_ch" min="1" value="<?= $data['chambre']->nombre_adultes_enfants_ch ?>" ><br><br>

        <!-- Renfort chambre -->
        <label for="renfort_chambre">Renfort de chambre :</label>
        <input type="checkbox" id="renfort_chambre" name="renfort_chambre" value="1" <?php echo $data['chambre']->renfort_chambre==1 ? "checked" : ""  ?>><br><br>

        <!-- Photo de la chambre -->
        <label for="photo_chambre">Photo de la chambre :</label>
        <input type="file" id="photo_chambre" name="photo_chambre" accept="image/*">
        
        <img src="/pictures/chambres/<?= $data['chambre']->photo_chambre ?>" alt="photo chambre" style="max-width: 200px; max-height: 150px;">

        
        <br><br>



        <input type="submit" name="go" value="modify chambre">
    </form>

<?php


require __DIR__."/layout/footer.php";
?>

