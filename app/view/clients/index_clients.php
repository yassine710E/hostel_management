<?php

$title = "Clients";
require __DIR__."/../layout/header.php";

?>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Clients</h1>
        
        <!-- Navigation Links -->
        <div class="mb-6">
            <a href="/dashboard" class="inline-block px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Dashboard
            </a>
            <a href="/clients/add" class="inline-block px-4 py-2 ml-4 text-white bg-green-500 rounded-lg hover:bg-green-600">
                Add Client
            </a>
            <a href="/clients/register" class="inline-block px-4 py-2 ml-4 text-white bg-purple-500 rounded-lg hover:bg-purple-600">
                Register Client
            </a>
        </div>

        <!-- Search Client Form -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-medium text-gray-800 mb-4">Search Client</h2>
            <form action="" method="post" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <input type="text" name="nom_complet" placeholder="Nom complet du client" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="text" name="pays" placeholder="Pays" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <input type="text" name="ville" placeholder="Ville" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    
                    <!-- Search Button -->
                    <div class="flex items-center">
                        <input type="submit" name="search" value="Search" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 cursor-pointer">
                    </div>
                </div>
            </form>
        </div>

        <!-- Clients Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Nom Complet</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Pays</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Ville</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Téléphone</th>
                        <th class="px-6 py-3 text-left text-gray-700 font-medium uppercase tracking-wider border-b">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $client) : ?>
                    <tr class="border-t">
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $client->nom_complet ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $client->pays ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $client->ville ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b"><?= $client->telephone ?></td>
                        <td class="px-6 py-4 whitespace-nowrap border-b">
                            <a href="/clients/delete/<?= $client->id_client ?>" class="text-red-600 hover:underline mr-4">Delete</a>
                            <a href="/clients/modify/<?= $client->id_client ?>" class="text-blue-600 hover:underline">Modify</a>
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
