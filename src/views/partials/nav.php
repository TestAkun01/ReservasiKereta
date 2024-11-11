<nav class="bg-gray-800 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-white text-lg font-semibold tracking-wider hover:text-gray-300 transition duration-300">Train Reservation</a>
        <ul class="flex space-x-4">
            <?php if (isset($_SESSION['user'])): ?>
                <li class="text-white">Welcome, <?= htmlspecialchars($_SESSION['user']["username"]); ?></li>
                <li><a href="/user/logout" class="text-white hover:text-gray-300 transition duration-300">Logout</a></li>
                <li><a href="/user/dashboard" class="text-white hover:text-gray-300 transition duration-300">Dashboard</a></li>
            <?php else: ?>
                <li><a href="/user/auth" class="text-white hover:text-gray-300 transition duration-300">Login</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>