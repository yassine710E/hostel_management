<?php

$title = "Types Chambres";

require __DIR__."/../layout/header.php";

?>

<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between mb-6">
    <a href="/dashboard" class="inline-block px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">
                Dashboard
            </a>
                    <a href="/types_chambres/add" class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600">Add Type Chambre</a>
    </div>

    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2 px-4 bg-gray-200 text-left">ID Type Chambre</th>
                <th class="py-2 px-4 bg-gray-200 text-left">Type Chambre</th>
                <th class="py-2 px-4 bg-gray-200 text-left">Description</th>
                <th class="py-2 px-4 bg-gray-200 text-left w-64">Photo Type Chambre</th> <!-- Increased width of this column -->
                <th class="py-2 px-4 bg-gray-200 text-left">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $type_chambre) : ?>
                <tr class="border-b">
                    <td class="py-2 px-4"><?= $type_chambre->id_type_chambre ?></td>
                    <td class="py-2 px-4"><?= $type_chambre->type_chambre ?></td>
                    <td class="py-2 px-4"><?= $type_chambre->description_type ?></td>
                    <td class="py-2 px-4">
                        <img src="/pictures/types_chambres/<?= $type_chambre->photo_type_chambre ?>" alt="Photo" class="w-48 h-32 object-cover rounded-lg"> <!-- Larger image size -->
                    </td>
                    <td class="py-2 px-4">
                        <a href="/public/types_chambres/delete/<?= $type_chambre->id_type_chambre ?>" class="text-red-500 hover:underline mr-2">Supprimer</a>
                        <a href="/public/types_chambres/modify/<?= $type_chambre->id_type_chambre ?>" class="text-blue-500 hover:underline mr-2">Modifier</a>
                        <a href="/public/types_chambres/consulter/<?= $type_chambre->id_type_chambre ?>" class="text-green-500 hover:underline">Consulter</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php

require __DIR__."/../layout/footer.php";
?>
