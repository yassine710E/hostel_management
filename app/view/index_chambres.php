<?php

$title="Chambres";

require __DIR__."/layout/header.php";

    
?>
<a href="/dashboard">Dashboard</a><br><br>
<form action="" method="post" >
<fieldset>
<input type="text" name="numero_chambre" placeholder="Numéro de la chambre">
<input type="text" name="type_chambre" placeholder="type de la chambre">
<input type="number" name="numero_capacite"  placeholder="Capacité de la chambre">


<input type="submit" name="search" value="search">

</fieldset>
</form>
<a href="/chambres/add">add</a>
<table>
<tr>
    <th>Numero de Chambre</th>
    <th>Type De Chambre</th>
    <th>prix de nuit</th>
    <th>prix de passage</th>
    <th>Capacite Chambre</th>
    <th>Nombre de lits</th>
    <th>Etage</th>
    <th> Nombre des personnes de la chambre (Adultes /Enfants)</th>
    <th>photo Chambre</th>
    <th>option</th>
</tr>
<?php foreach ($data as  $obj_chambre)  :?>
<tr>
    <th><?= $obj_chambre->numero_chambre ?></th>
    <th><?= $obj_chambre->type_chambre ?></th>
    <th><?php echo  $obj_chambre->N_prix_nuit>0.00?$obj_chambre->N_prix_nuit:$obj_chambre->prix_base_nuit ?></th>
    <th><?php echo  $obj_chambre->N_prix_passage>0.00?$obj_chambre->N_prix_passage:$obj_chambre->prix_base_passage ?></th>
    <th><?= $obj_chambre->numero_capacite ?></th>
    <th><?= $obj_chambre->nbr_lits_chambre ?></th>
    <th><?= $obj_chambre->etage_chambre ?></th>
    <th><?= $obj_chambre->nombre_adultes_enfants_ch ?></th>
    <th>
        <img src="/pictures/chambres/<?= $obj_chambre->	photo_chambre ?>" alt="photo chambre" style="max-width: 200px; max-height: 150px;">
    </th>
    <th>
        <a href="/chambres/delete/<?= $obj_chambre->id_chambre ?>">delete</a>
        <a href="/chambres/modify/<?= $obj_chambre->id_chambre ?>">modify</a>

    </th>
</tr>
<?php endforeach ?>
</table>

<?php


require __DIR__."/layout/footer.php";
?>