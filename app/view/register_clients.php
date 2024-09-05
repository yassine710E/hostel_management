<?php
$title="register clients";
require __DIR__."/layout/header.php";
?>
<a href="/clients">go back</a>
<!-- frame of searching client -->
<form action="" method="post">
    <fieldset>
        <legend>search client</legend>
    <input type="text" name="nom_complet" placeholder="nom complet du client">
    <input type="date" name="date_debut" >
    <input type="date" name="date_fin" >

    <input type="submit" name="search" value="search">
    </fieldset>
</form>

<table>
    <tr>
        <th>ID client</th>
        <th>Nom Complet</th>
        <th>Sexe</th>
        <th>Age</th>
        <th>Date d’arrivée</th>
        <th>Date de départ</th>
        <th>Numero de Chambre</th>
        <th>Prix Chambre</th>
    </tr>
    <?php foreach ($data as  $obj) :?>
        <tr>
            <td><?= $obj->id_client ?></td>
            <td><?= $obj->nom_complet ?></td>
            <td><?= $obj->sexe ?></td>
            <td><?= $obj->age ?></td>
            <td><?= $obj->date_arrivee ?></td>
            <td><?= $obj->date_depart ?></td>
            <td><?= $obj->numero_chambre ?></td>
            <td><?php
            echo $obj->N_prix_nuit>0 ?$obj->N_prix_nuit:$obj->prix_base_nuit;
            ?></td>
            

        </tr>
    <?php endforeach ?>
</table>
<?php
require __DIR__."/layout/footer.php";
?>