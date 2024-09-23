<?php

$title="Capacité Chambre";
require __DIR__."/../layout/header.php";
?>

<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Capacité de Chambre</h1>
        
        <div class="mb-6">
            <a href="/dashboard" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Dashboard
            </a>
            <a href="/public/capacite_chambre/add" class="inline-block px-4 py-2 ml-4 text-white bg-green-500 rounded-lg hover:bg-green-600">
                Ajouter Capacité Chambre
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full bg-white table-auto border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">ID Capacité</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Titre Capacité</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Numéro Capacité</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $capacite) : ?>
                    <tr class="border-t">
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $capacite->id_capacite ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $capacite->titre_capacite ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $capacite->numero_capacite ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b">
                            <a href="/public/capacite_chambre/delete/<?= $capacite->id_capacite ?>" class="text-red-600 hover:underline mr-4">Supprimez</a>
                            <a href="/public/capacite_chambre/modify/<?= $capacite->id_capacite ?>" class="text-blue-600 hover:underline">Modifier</a>
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
