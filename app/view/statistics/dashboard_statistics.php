<?php

$title="Dashboard";
require __DIR__."/../layout/header.php";
?>

<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Dashboard</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="/capacite_chambre" class="block p-4 bg-white rounded-lg shadow-md border-l-4 border-blue-500 hover:bg-gray-100">
                <span class="text-lg font-medium text-gray-700">Capacité de Chambre: </span>
                <span class="text-gray-500"><?= $data['capaciter_chambre'] ?></span>
            </a>
            <a href="/chambres" class="block p-4 bg-white rounded-lg shadow-md border-l-4 border-green-500 hover:bg-gray-100">
                <span class="text-lg font-medium text-gray-700">Chambre: </span>
                <span class="text-gray-500"><?= $data['chambre'] ?></span>
            </a>
            <a href="/clients" class="block p-4 bg-white rounded-lg shadow-md border-l-4 border-yellow-500 hover:bg-gray-100">
                <span class="text-lg font-medium text-gray-700">Client: </span>
                <span class="text-gray-500"><?= $data['client'] ?></span>
            </a>
            <a href="/reservations" class="block p-4 bg-white rounded-lg shadow-md border-l-4 border-red-500 hover:bg-gray-100">
                <span class="text-lg font-medium text-gray-700">Réservation: </span>
                <span class="text-gray-500"><?= $data['reservation'] ?></span>
            </a>
            <a href="/tarifs_chambres" class="block p-4 bg-white rounded-lg shadow-md border-l-4 border-purple-500 hover:bg-gray-100">
                <span class="text-lg font-medium text-gray-700">Tarif Chambre: </span>
                <span class="text-gray-500"><?= $data['tarif_chambre'] ?></span>
            </a>
            <a href="/types_chambres" class="block p-4 bg-white rounded-lg shadow-md border-l-4 border-indigo-500 hover:bg-gray-100">
                <span class="text-lg font-medium text-gray-700">Type Chambre: </span>
                <span class="text-gray-500"><?= $data['type_chambre'] ?></span>
            </a>
        </div>
        
        <div class="mt-12">
            <a href="/public/logout" class="inline-block px-6 py-2 text-white bg-red-600 rounded-lg hover:bg-red-700">
                Logout
            </a>
        </div>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
