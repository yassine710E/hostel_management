<?php
$title = "Register Clients";
require __DIR__."/../layout/header.php";
?>

<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg">
        <div class="mb-6">
            <a href="/clients" class="text-green-500 hover:underline">&larr; Go back</a>
        </div>

        <!-- Search Form -->
        <form action="" method="post" class="mb-8">
            <fieldset class="border border-gray-300 p-4 rounded-md">
                <legend class="text-xl font-semibold mb-4">Search Client</legend>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <input type="text" name="nom_complet" placeholder="Full Name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <input type="date" name="date_debut" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <input type="date" name="date_fin" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <input type="submit" name="search" value="Search" class="w-full bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 cursor-pointer">
                    </div>
                </div>
            </fieldset>
        </form>

        <!-- Clients Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-50">
                        <th class="text-left px-6 py-3 text-gray-600">ID Client</th>
                        <th class="text-left px-6 py-3 text-gray-600">Full Name</th>
                        <th class="text-left px-6 py-3 text-gray-600">Gender</th>
                        <th class="text-left px-6 py-3 text-gray-600">Age</th>
                        <th class="text-left px-6 py-3 text-gray-600">Arrival Date</th>
                        <th class="text-left px-6 py-3 text-gray-600">Departure Date</th>
                        <th class="text-left px-6 py-3 text-gray-600">Room Number</th>
                        <th class="text-left px-6 py-3 text-gray-600">Room Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $obj) : ?>
                        <tr class="border-t">
                            <td class="px-6 py-4"><?= $obj->id_client ?></td>
                            <td class="px-6 py-4"><?= $obj->nom_complet ?></td>
                            <td class="px-6 py-4"><?= $obj->sexe ?></td>
                            <td class="px-6 py-4"><?= $obj->age ?></td>
                            <td class="px-6 py-4"><?= $obj->date_arrivee ?></td>
                            <td class="px-6 py-4"><?= $obj->date_depart ?></td>
                            <td class="px-6 py-4"><?= $obj->numero_chambre ?></td>
                            <td class="px-6 py-4">
                                <?= $obj->N_prix_nuit > 0 ? $obj->N_prix_nuit : $obj->prix_base_nuit ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
