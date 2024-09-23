<?php

$title = "Tarifs Chambres";
require __DIR__."/../layout/header.php";

?>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Tarifs Chambres</h1>
        
        <!-- Navigation Links -->
        <div class="mb-6">
            <a href="/dashboard" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Dashboard
            </a>
            <a href="/public/tarifs_chambres/add" class="inline-block px-4 py-2 ml-4 text-white bg-green-500 rounded-lg hover:bg-green-600">
                Add Tarif Chambre
            </a>
        </div>

        <!-- Tarifs Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">ID Tarif</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Prix Base Nuit</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Prix Base Passage</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Nouveau Prix Nuit</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Nouveau Prix Passage</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $obj_tarif) : ?>
                    <tr class="border-t">
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_tarif->id_tarif ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_tarif->prix_base_nuit ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_tarif->prix_base_passage ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_tarif->N_prix_nuit ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $obj_tarif->N_prix_passage ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b">
                            <a href="/tarifs_chambres/delete/<?= $obj_tarif->id_tarif ?>" class="text-red-600 hover:underline mr-4">Delete</a>
                            <a href="/tarifs_chambres/modify/<?= $obj_tarif->id_tarif ?>" class="text-blue-600 hover:underline">Modify</a>
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
