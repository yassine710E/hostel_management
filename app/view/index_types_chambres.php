<?php

$title="Types Chambres";

require __DIR__."/layout/header.php";

    
?>
<a href="/dashboard">Dashboard</a><br><br>

<a href="/types_chambres/add">add</a>
<table>
    <tr>
        <th>ID Type Chambre</th>
        <th>Type Chambre</th>
        <th>Description</th>
        <th>Photo Type Chambre</th>
        <th>options</th>
    </tr>
    <?php foreach ($data as  $type_chambre) :?>
        <tr>

            <td><?= $type_chambre->id_type_chambre ?></td>
            <td><?= $type_chambre->type_chambre?></td>
            <td><?= $type_chambre->description_type?></td>
            <td>

                <img src="/pictures/types_chambres/<?= $type_chambre->photo_type_chambre ?>" alt="Photo" style="max-width: 200px; max-height: 150px;">
            </td>            
            <td>
            <a href="/public/types_chambres/delete/<?= $type_chambre->id_type_chambre ?>">supprimez</a>
            <a href="/public/types_chambres/modify/<?= $type_chambre->id_type_chambre ?>">modifier</a>
            <a href="/public/types_chambres/consulter/<?= $type_chambre->id_type_chambre ?>">consulter type chambre</a>
            </td>

        </tr>
    <?php endforeach?>
</table>
<?php


require __DIR__."/layout/footer.php";
?>