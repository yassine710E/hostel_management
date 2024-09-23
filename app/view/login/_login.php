<?php

$title = "Login Page";

require __DIR__."/../layout/header.php";

?>

<div class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-sm w-full">
    <?php if (!empty($data['error'])): ?>
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
        <span class="font-medium">Danger alert!</span> <?php echo htmlspecialchars($data['error']); ?>
    </div>
    <?php endif; ?>
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
        <form action="" method="post" class="space-y-6">
            <div>
                <label class="block text-gray-700">Username</label>
                <input type="text" name="username" placeholder="Enter username"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" placeholder="Enter password"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>
            <div>
                <input type="submit" name="go" value="Login"
                    class="w-full bg-green-500 text-white p-3 rounded-lg hover:bg-green-600 transition duration-300 cursor-pointer">
            </div>
        </form>
    </div>
</div>

<?php

require __DIR__."/../layout/footer.php";
?>
