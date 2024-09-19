<?php

$title="Reservations";

require __DIR__."/layout/header.php";

    
?>
<a href="/dashboard">Dashboard</a><br><br>

<form action="" method="post">

        <input type="date" name="date_debut" >

        <input type="date" name="date_fin" >

        <input type="text" name="numero_chambre">

        <input type="text" name="nom_complet">
        
        <input type="submit" name="search" value="search"  >

</form>

<a href="/reservations/add">add</a>

<table >
    <tr>
    <th>Code Reservation</th>
    <th>Date de reservation</th>
    <th>Date Arrivee</th>
    <th>Date Depart</th>
    <th>Nombre de jours</th>
    <th>Client</th>
    <th>N° Telephone</th>
    <th>Numero de Chambre</th>
    <th>Prix</th>
    <th>Etat</th>
    <th>Options</th>  
    </tr>
  <?php foreach ($data['reservations'] as  $obj) :?>
    <tr>
     <td><?= $obj->Code_reservation ?></td>
     <td><?= $obj->date_heure_reservation ?></td>
     <td><?= $obj->date_arrivee ?></td>
     <td><?= $obj->date_depart ?></td>
     <td><?= $obj->nbr_jours ?></td>
     <td><?= $obj->nom_complet?></td>
     <td><?= $obj->telephone?></td>
     <td><?= $obj->numero_chambre ?></td>
     <td><?= $obj->mantant_total ?></td>
     <td><?= $obj->Etat?></td>
     <td>
     
       <a href="/reservations/delete/<?= $obj->id_reservation ?>" >supprimer</a>
       <a href="/reservations/modify/<?= $obj->id_reservation ?>" >modifier</a>
       <a href="/reservations/plus_info/<?= $obj->id_reservation ?>" >Plus</a>
        
    </td>
    </tr>
  <?php endforeach ?>
</table>
