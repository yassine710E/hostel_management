<?php

$title="tarifs Chambres";

require __DIR__."/layout/header.php";

    
?>
<a href="/dashboard">Dashboard</a><br><br>
<a href="/public/tarifs_chambres/add">add tarif chambre</a>

<table>
    <tr>
        <th>ID tarif</th>
        <th>prix base nuit</th>
        <th>prix base passage</th>
        <th>Nouveau prix  nuit</th>
        <th>Nouveau prix passage</th>
        <th>options</th>
    </tr>
   <?php foreach ($data as $obj_tarif) : ?>
    <tr>
        <td><?= $obj_tarif->id_tarif ?></td>
        <td><?= $obj_tarif->prix_base_nuit ?></td>
        <td><?= $obj_tarif->prix_base_passage ?></td>
        <td><?= $obj_tarif->N_prix_nuit ?></td>
        <td><?= $obj_tarif->N_prix_passage ?></td>
        <td>
            <a href="/tarifs_chambres/delete/<?= $obj_tarif->id_tarif ?>">delete</a>
            <a href="/tarifs_chambres/modify/<?= $obj_tarif->id_tarif ?>">modify</a>
        </td>
    </tr>
   <?php endforeach ?>
</table>


<?php


require __DIR__."/layout/footer.php";
?>