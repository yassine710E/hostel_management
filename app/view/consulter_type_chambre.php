<?php

$title="Consulter Type Chambre";

require __DIR__."/layout/header.php";

    
?>
<table>

    <tr>
        <th>ID type Chambre</th>
        <td><?= $data['obj_type_chambre']->id_type_chambre ?></td>
    </tr>

    <tr>
        <th>type chambre</th>
        <td><?= $data['obj_type_chambre']->type_chambre ?></td>
    </tr>

    <tr>
        <th>description type</th>
        <td><?= $data['obj_type_chambre']->description_type ?></td>    
    </tr>

    <tr>
        <th>Photo Type Chambre</th>
        <td><img src="/pictures/types_chambres/<?= $data['obj_type_chambre']->photo_type_chambre ?>" alt="dfsdfdsf"></td>
    </tr>

    <tr>
        <th>Numero Chambre ayant ce type </th>
        <td><?php foreach ($data['table_objs_chambre'] as  $obj_chambre) {
           print $obj_chambre->numero_chambre." ";
         } ?></td>
    </tr>
</table>
<?php


require __DIR__."/layout/footer.php";
?>
