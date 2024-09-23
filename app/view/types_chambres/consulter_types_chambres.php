<?php

$title = "Consulter Type Chambre";
require __DIR__."/../layout/header.php";

?>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-8">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Consulter Type Chambre</h1>
        
        <table class="w-full table-auto border-collapse border border-gray-200">
            <tr class="bg-gray-200">
                <th class="border px-4 py-2 text-left">ID Type Chambre</th>
                <td class="border px-4 py-2"><?= htmlspecialchars($data['obj_type_chambre']->id_type_chambre) ?></td>
            </tr>
            <tr>
                <th class="border px-4 py-2 text-left">Type Chambre</th>
                <td class="border px-4 py-2"><?= htmlspecialchars($data['obj_type_chambre']->type_chambre) ?></td>
            </tr>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2 text-left">Description Type</th>
                <td class="border px-4 py-2"><?= htmlspecialchars($data['obj_type_chambre']->description_type) ?></td>
            </tr>
            <tr>
                <th class="border px-4 py-2 text-left">Photo Type Chambre</th>
                <td class="border px-4 py-2">
                    <img src="/pictures/types_chambres/<?= htmlspecialchars($data['obj_type_chambre']->photo_type_chambre) ?>" alt="Photo de type chambre" class="rounded-lg" style="max-width: 300px;">
                </td>
            </tr>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2 text-left">Numéro Chambre ayant ce type</th>
                <td class="border px-4 py-2">
                    <?php foreach ($data['table_objs_chambre'] as $obj_chambre): ?>
                        <span class="mr-2"><?= htmlspecialchars($obj_chambre->numero_chambre) ?></span>
                    <?php endforeach; ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
