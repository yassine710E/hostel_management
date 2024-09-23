<?php

$title = "Add Type Chambre";
require __DIR__."/../layout/header.php";

?>

<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white shadow-md rounded-lg p-8">
    <?php if (!empty($data['error'])): ?>
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">Error alert!</span> <?php echo htmlspecialchars($data['error']); ?>
        </div>
    <?php endif; ?>
    
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Add Type Chambre</h1>
        
        <form action="" method="post" enctype="multipart/form-data" class="space-y-4">
            <fieldset>
                <legend class="text-xl font-medium text-gray-800 mb-4">Enter Type Chambre Details</legend>

                <!-- Type Chambre Input -->
                <input type="text" name="type_chambre" placeholder="Type Chambre" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4">

                <!-- Description Textarea -->
                <textarea name="description_chambre" placeholder="Description" cols="60" rows="10" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 mb-4"></textarea>

                <!-- Photo Upload -->
                <input type="file" name="photo" accept="image/*" class="w-full text-sm text-gray-500 
                    file:mr-4 file:py-2 file:px-4
                    file:rounded-full file:border-0
                    file:text-sm file:font-semibold
                    file:bg-green-500 file:text-white
                    hover:file:bg-green-600 mb-4">

                <!-- Submit Button -->
                <input type="submit" name="go" value="Add Type Chambre" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 cursor-pointer">
            </fieldset>
        </form>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
