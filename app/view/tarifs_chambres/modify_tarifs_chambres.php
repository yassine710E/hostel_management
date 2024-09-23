<?php

$title = "Modify Tarifs Chambres";
require __DIR__."/../layout/header.php";

?>

<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-8">
        <?php if (!empty($data['error'])): ?>
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Danger alert!</span> <?php echo htmlspecialchars($data['error']); ?>
        </div>
        <?php endif; ?>
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Modify Tarif Chambre</h1>
        
        <form action="" method="post" class="space-y-4">
            <fieldset>
                <legend class="text-xl font-medium text-gray-800 mb-4">Modify Tarif Details</legend>
                
                <input type="text" name="prix_base_nuit" placeholder="Prix Base Nuit" value="<?= $data['info_id']->prix_base_nuit ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">
                <input type="text" name="prix_base_passage" placeholder="Prix Base Passage" value="<?= $data['info_id']->prix_base_passage ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">
                <input type="text" name="N_prix_nuit" placeholder="Nouveau Prix de Nuit" value="<?= $data['info_id']->N_prix_nuit ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">
                <input type="text" name="N_prix_passage" placeholder="Nouveau Prix de Passage" value="<?= $data['info_id']->N_prix_passage ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">

                <input type="submit" name="go" value="Modify Tarif Chambre" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 cursor-pointer">
            </fieldset>
        </form>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
