<?php

$title = "Add Clients";
require __DIR__."/../layout/header.php";

?>
<div class="min-h-screen bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-lg">
    <?php if (!empty($data['error'])): ?>
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> <?php echo htmlspecialchars($data['error']); ?>
    </div>
    <?php endif; ?>
        <h1 class="text-2xl font-semibold text-gray-800 mb-6">Add Client</h1>

        <form action="" method="post" class="space-y-6">
            <!-- Full Name -->
            <div>
                <label for="nom_complet" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text" id="nom_complet" name="nom_complet" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Gender -->
            <div>
                <label for="sexe" class="block text-sm font-medium text-gray-700">Gender</label>
                <select id="sexe" name="sexe" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <!-- Date of Birth -->
            <div>
                <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date of Birth</label>
                <input type="date" id="date_naissance" name="date_naissance" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Age -->
            <div>
                <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                <input type="number" id="age" name="age" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Country -->
            <div>
                <label for="pays" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="pays" name="pays" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- City -->
            <div>
                <label for="ville" class="block text-sm font-medium text-gray-700">City</label>
                <input type="text" id="ville" name="ville" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Address -->
            <div>
                <label for="adresse" class="block text-sm font-medium text-gray-700">Address</label>
                <input type="text" id="adresse" name="adresse" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Telephone -->
            <div>
                <label for="telephone" class="block text-sm font-medium text-gray-700">Telephone</label>
                <input type="tel" id="telephone" name="telephone" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <!-- Other Details -->
            <div>
                <label for="autres_details" class="block text-sm font-medium text-gray-700">Other Details</label>
                <textarea id="autres_details" name="autres_details" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <input type="submit" value="Add Client" name="go" class="w-full px-4 py-2 bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600 cursor-pointer">
            </div>
        </form>
    </div>
</div>

<?php
require __DIR__."/../layout/footer.php";
?>
