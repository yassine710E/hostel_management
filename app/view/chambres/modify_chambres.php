<?php

$title = "Modify Chambre";

require __DIR__."/../layout/header.php";

?>

<div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Modify Chambre</h2>
    <?php if (!empty($data['error'])): ?>
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> <?php echo htmlspecialchars($data['error']); ?>
    </div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">

        <!-- Numéro de la chambre -->
        <div class="mb-4">
            <label for="numero_chambre" class="block text-gray-700">Numéro de la chambre :</label>
            <input type="text" id="numero_chambre" name="numero_chambre" value="<?= $data['chambre']->numero_chambre ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
        </div>

        <!-- Type de la chambre -->
        <div class="mb-4">
            <label for="type_chambre" class="block text-gray-700">Type de la chambre :</label>
            <select id="type_chambre" name="id_type_chambre" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                <?php foreach ($data['type_chambre'] as $obj_type_chambre): ?>
                    <option value="<?= $obj_type_chambre->id_type_chambre ?>" <?php echo $data['chambre']->id_type_chambre == $obj_type_chambre->id_type_chambre ? "selected" : "" ?>><?= $obj_type_chambre->type_chambre ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Capacité de la chambre -->
        <div class="mb-4">
            <label for="capacite_chambre" class="block text-gray-700">Capacité de la chambre :</label>
            <select id="capacite_chambre" name="id_capacite" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                <?php foreach ($data['capacite_chambre'] as $obj_capacite_chambre): ?>
                    <option value="<?= $obj_capacite_chambre->id_capacite ?>" <?php echo $data['chambre']->id_capacite == $obj_capacite_chambre->id_capacite ? "selected" : "" ?>><?= $obj_capacite_chambre->numero_capacite ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Tarif de la chambre -->
        <div class="mb-4">
            <label for="tarif_chambre" class="block text-gray-700">Tarif de la chambre (par nuit) :</label>
            <select id="tarif_chambre" name="id_tarif" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
                <?php foreach ($data['tarif_chambre'] as $obj_tarif_chambre): ?>
                    <option value="<?= $obj_tarif_chambre->id_tarif ?>" <?php echo $data['chambre']->id_tarif == $obj_tarif_chambre->id_tarif ? "selected" : "" ?>><?php echo $obj_tarif_chambre->N_prix_nuit > 0 ? "prix de nuit :" . $obj_tarif_chambre->N_prix_nuit : "prix de nuit :" . $obj_tarif_chambre->prix_base_nuit ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Nombre de lits -->
        <div class="mb-4">
            <label for="nbr_lits_chambre" class="block text-gray-700">Nombre de lits :</label>
            <input type="number" id="nbr_lits_chambre" name="nbr_lits_chambre" min="1" value="<?= $data['chambre']->nbr_lits_chambre ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
        </div>

        <!-- Étage -->
        <div class="mb-4">
            <label for="etage_chambre" class="block text-gray-700">Étage :</label>
            <input type="number" id="etage_chambre" name="etage_chambre" min="0" value="<?= $data['chambre']->etage_chambre ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-500 focus:ring-opacity-50">
        </div>

        <!-- Nombre des personnes (Adultes / Enfants) -->
        <div class="mb-4">
            <label for="nombre_adultes_enfants_ch" class="block text-gray-700">Nombre de personnes (Adultes/Enfants) :</label>
            <input type="number" id="nombre_adultes_enfants_ch" name="nombre_adultes_enfants_ch" min="1" value="<?= $data['chambre']->nombre_adultes_enfants_ch ?>" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
        </div>

        <!-- Renfort chambre -->
        <div class="mb-4">
            <label for="renfort_chambre" class="inline-flex items-center text-gray-700">
                <input type="checkbox" id="renfort_chambre" name="renfort_chambre" value="1" <?php echo $data['chambre']->renfort_chambre == 1 ? "checked" : "" ?> class="mr-2">
                Renfort de chambre
            </label>
        </div>

        <!-- Photo de la chambre -->
        <div class="mb-4">
            <label for="photo_chambre" class="block text-gray-700">Photo de la chambre :</label>
            <input type="file" id="photo_chambre" name="photo_chambre" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 
                file:mr-4 file:py-2 file:px-4
                file:rounded-lg file:border-0
                file:text-sm file:font-semibold
                file:bg-green-500 file:text-white
                hover:file:bg-green-600">
            <img src="/pictures/chambres/<?= $data['chambre']->photo_chambre ?>" alt="photo chambre" class="mt-2 rounded-lg" style="max-width: 200px; max-height: 150px;">
        </div>

        <input type="submit" name="go" value="modify chambre" class="mt-4 w-full bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 cursor-pointer p-2">
    </form>
</div>

<?php

require __DIR__."/../layout/footer.php";
?>
