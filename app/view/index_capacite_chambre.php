<?php

$title="Capacite chambre";

require __DIR__."/layout/header.php";

    
?>
<a href="/dashboard">Dashboard</a><br><br>
<a href="/public/capacite_chambre/add">add capacite chambre</a>

<table>
    <tr>
        <th>ID Capacite</th>
        <th>Titre Capacite</th>
        <th>numero Capacite</th>
        <th>options</th>
    </tr>
    <?php foreach ($data as  $capacite) :?>
        <tr>
            <td><?= $capacite->id_capacite ?></td>
            <td><?= $capacite->titre_capacite?></td>
            <td><?= $capacite->numero_capacite?></td>
            <td><a href="/public/capacite_chambre/delete/<?= $capacite->id_capacite ?>">supprimez</a>
            <a href="/public/capacite_chambre/modify/<?= $capacite->id_capacite ?>">modifier</a>
             </td>

        </tr>
    <?php endforeach?>
</table>

<?php


require __DIR__."/layout/footer.php";
?>