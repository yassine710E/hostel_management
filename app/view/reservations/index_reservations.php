<?php

$title = "Reservations";
require __DIR__."/../layout/header.php";

?>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-7xl mx-auto bg-white shadow-md rounded-lg p-8">
        <div class="flex justify-between items-center mb-6">
            <!-- Dashboard Button -->
            <a href="/dashboard" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Dashboard</a>
            <a href="/reservations/add" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600">Add Reservation</a>
        </div>

        <!-- Search Form -->
        <form action="" method="post" class="flex space-x-4 mb-8 ">
            <input type="date" name="date_debut" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="date" name="date_fin" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="text" name="numero_chambre" placeholder="Numéro Chambre" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            <input type="text" name="nom_complet" placeholder="Nom Complet" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-green-500">
            <!-- Smaller Search Button -->
            <button type="submit" name="search" class="bg-green-500 text-white rounded-lg hover:bg-green-600 px-4 py-2 w-1/2 ">Search</button>
        </form>

        <!-- Reservations Table -->
        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead class="bg-gray-200">
                <tr>
                    <th class="border px-4 py-2">Code Reservation</th>
                    <th class="border px-4 py-2">Date de reservation</th>
                    <th class="border px-4 py-2">Date Arrivee</th>
                    <th class="border px-4 py-2">Date Depart</th>
                    <th class="border px-4 py-2">Nombre de jours</th>
                    <th class="border px-4 py-2">Client</th>
                    <th class="border px-4 py-2">N° Telephone</th>
                    <th class="border px-4 py-2">Numéro de Chambre</th>
                    <th class="border px-4 py-2">Prix</th>
                    <th class="border px-4 py-2">Etat</th>
                    <th class="border px-4 py-2">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data['reservations'] as $obj) : ?>
                <tr>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->Code_reservation) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->date_heure_reservation) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->date_arrivee) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->date_depart) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->nbr_jours) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->nom_complet) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->telephone) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->numero_chambre) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->mantant_total) ?></td>
                    <td class="border px-4 py-2"><?= htmlspecialchars($obj->Etat) ?></td>
                    <td class="border px-4 py-2 space-x-2">
                        <a href="/reservations/delete/<?= $obj->id_reservation ?>" class="text-red-500 underline">Supprimer</a>
                        <a href="/reservations/modify/<?= $obj->id_reservation ?>" class="text-blue-500 underline">Modifier</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
