<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Reservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-100 to-blue-50 p-6">

    <nav class="bg-gray-800 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-lg font-semibold tracking-wider hover:text-gray-300 transition duration-300">Train Reservation</a>
            <ul class="flex space-x-4">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="text-white">Welcome, <?= $_SESSION['user']["username"]; ?></li>
                    <li><a href="/user/logout" class="text-white hover:text-gray-300 transition duration-300">Logout</a></li>
                    <li><a href="/user/dashboard" class="text-white hover:text-gray-300 transition duration-300">Dashboard</a></li>
                <?php else: ?>
                    <li><a href="/user/login" class="text-white hover:text-gray-300 transition duration-300">Login</a></li>
                    <li><a href="/user/register" class="text-white hover:text-gray-300 transition duration-300">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-lg shadow-2xl">
        <h1 class="text-3xl font-semibold mb-6 text-gray-700 text-center">Search Train Schedule</h1>
        <form action="/train/search" method="GET" class="space-y-6">
            <div>
                <label for="from" class="block text-gray-600 mb-2">From Station:</label>
                <select id="from" name="from" required class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400">
                    <option value="">Select Station</option>
                    <?php foreach ($data['stations'] as $station): ?>
                        <option value="<?= $station['id']; ?>"><?= $station['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="to" class="block text-gray-600 mb-2">To Station:</label>
                <select id="to" name="to" required class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400">
                    <option value="">Select Station</option>
                    <?php foreach ($data['stations'] as $station): ?>
                        <option value="<?= $station['id']; ?>"><?= $station['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="date" class="block text-gray-600 mb-2">Departure Date:</label>
                <input type="date" id="date" name="date" required class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400">
            </div>

            <div>
                <label for="tickets" class="block text-gray-600 mb-2">Number of Tickets:</label>
                <input type="number" id="tickets" name="tickets" min="1" required class="block w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-400" placeholder="Enter number of tickets">
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-md hover:bg-blue-600 transition duration-300 shadow-md">Search</button>
        </form>
    </div>

</body>

</html>