<?php

$title = "Chambres";
require __DIR__."/../layout/header.php";

?>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="w-full max-w-full mx-auto bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Chambres</h1>
        
        <!-- Navigation Links -->
        <div class="mb-6">
            <a href="/dashboard" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">Dashboard</a>
            <a href="/chambres/add" class="inline-block px-4 py-2 ml-4 text-white bg-green-500 rounded-lg hover:bg-green-600">Add Chambre</a>
        </div>

        <!-- Search Form -->
        <form action="" method="post" class="mb-6">
            <fieldset class="border p-4 rounded-lg bg-white shadow-md">
                <legend class="text-xl font-medium text-gray-800 mb-4">Search Chambre</legend>
                <div class="flex flex-wrap gap-4">
                    <input type="text" name="numero_chambre" placeholder="Numéro de la chambre" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="text" name="type_chambre" placeholder="Type de la chambre" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="number" name="numero_capacite" placeholder="Capacité de la chambre" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" name="search" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 cursor-pointer">Search</button>
                </div>
            </fieldset>
        </form>

        <!-- Chambres Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Numéro de Chambre</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Type De Chambre</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Prix de Nuit</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Prix de Passage</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Capacité Chambre</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Nombre de Lits</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Étage</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Nombre de Personnes (Adultes/Enfants)</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Photo Chambre</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $obj_chambre) : ?>
                    <tr class="border-t">
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_chambre->numero_chambre ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_chambre->type_chambre ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_chambre->N_prix_nuit > 0.00 ? $obj_chambre->N_prix_nuit : $obj_chambre->prix_base_nuit ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_chambre->N_prix_passage > 0.00 ? $obj_chambre->N_prix_passage : $obj_chambre->prix_base_passage ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_chambre->numero_capacite ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_chambre->nbr_lits_chambre ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_chambre->etage_chambre ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_chambre->nombre_adultes_enfants_ch ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b">
                        <img src="/pictures/chambres/<?= $obj_chambre->photo_chambre ?>" alt="photo chambre" class="max-w-full h-auto rounded-lg" style="max-width: 200px; max-height: 150px;">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap border-b">
                            <a href="/chambres/delete/<?= $obj_chambre->id_chambre ?>" class="text-red-600 hover:underline">Delete</a>
                            <a href="/chambres/modify/<?= $obj_chambre->id_chambre ?>" class="text-blue-600 hover:underline">Modify</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
