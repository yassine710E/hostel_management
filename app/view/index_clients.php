<?php

$title="Clients";

require __DIR__."/layout/header.php";

    
?>
<a href="/dashboard">Dashboard</a><br><br>

<!-- frame of searching client -->
<form action="" method="post">
    <fieldset>
        <legend>search client</legend>
    <input type="text" name="nom_complet" placeholder="nom complet du client">
    <input type="text" name="pays" placeholder="pays">
    <input type="text" name="ville" placeholder="ville">

    <input type="submit" name="search" value="search">
    </fieldset>
</form>

<a href="/clients/add">add</a>
<a href="/clients/register">register</a>
<table>
    <tr>
        <th>Nom Complet</th>
        <th>Pays de Client </th>
        <th>ville de client</th>
        <th>Numero de telephone</th>
        <th>options</th>
    </tr>
    <?php foreach ($data as  $client) : ?>
    <tr>
        <td><?= $client->nom_complet ?></td>
        <td><?= $client->pays ?></td>
        <td><?= $client->ville ?></td>
        <td><?= $client->telephone ?></td>
        <td>
            <a href="/clients/delete/<?= $client->id_client ?>">delete</a>
            <a href="/clients/modify/<?= $client->id_client ?>">modify</a>

        </td>
    </tr>  
    <?php endforeach ?>    
</table>

<?php


require __DIR__."/layout/footer.php";
?>