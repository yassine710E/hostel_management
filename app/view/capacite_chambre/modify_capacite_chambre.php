<?php

$title = "Modify Capacité Chambre";
require __DIR__."/../layout/header.php";


?>
<div class="min-h-screen bg-gray-100 p-6 flex items-center justify-center">
    <div class="bg-white shadow-md rounded-lg p-8 max-w-md w-full">
    <?php if (!empty($data['error'])): ?>
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> <?php echo htmlspecialchars($data['error']); ?>
    </div>
    <?php endif; ?>
        <h1 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Modify Capacité Chambre</h1>
        
        <form action="" method="post" class="space-y-4">
            <div>
                <label for="titre_capacite" class="block text-gray-700 font-medium mb-2">Titre Capacité</label>
                <input type="text" name="titre_capacite" id="titre_capacite" placeholder="Titre Capacité" value="<?= $data['info_id']->titre_capacite ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            
            <div>
                <label for="numero_capacite" class="block text-gray-700 font-medium mb-2">Numéro Capacité</label>
                <input type="number" name="numero_capacite" id="numero_capacite" placeholder="Numéro Capacité" value="<?= $data['info_id']->numero_capacite ?>" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="text-center">
                <input type="submit" name="go" value="Modify" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 cursor-pointer">
            </div>
        </form>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
