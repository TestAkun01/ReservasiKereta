<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Train Reservation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

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
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <div class="bg-[url('/assets/images/keretaapibg.png')] h-[550px] bg-cover bg-center ">
        <div class="container mx-auto pt-[60px]  ">
            <div class="flex justify-between">
                <div class="w-[700px] self-center">
                    <p class="text-[50px] font-bold text-white" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);">
                        Pesan tiket kereta api online dengan harga promo di tiketjoyo.com
                    </p>
                    <p class="text-[30px] text-white" style="text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);">
                        Transportasi yang nyaman dan tepercaya
                    </p>
                </div>

                <div class="w-[400px]">
                    <div class="border-2 border-black p-8 rounded-lg bg-[#ffffff] shadow-md">
                        <form action="/train/search" method="GET" class="space-y-6">
                            <!-- From Station -->
                            <div>
                                <label for="from_station" class="block text-sm font-medium text-gray-700">From Station</label>
                                <select id="from_station" name="from" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option disabled selected>-- Select From Station --</option>
                                    <?php foreach ($data['stations'] as $station): ?>
                                        <option value="<?= $station['id']; ?>"><?= $station['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- To Station -->
                            <div>
                                <label for="to_station" class="block text-sm font-medium text-gray-700">To Station</label>
                                <select id="to_station" name="to" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <option disabled selected>-- Select To Station --</option>
                                    <?php foreach ($data['stations'] as $station): ?>
                                        <option value="<?= $station['id']; ?>"><?= $station['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- Departure Date -->
                            <div>
                                <label for="departure_date" class="block text-sm font-medium text-gray-700">Departure Date</label>
                                <input type="date" id="departure_date" name="date" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <!-- Number Of Ticket -->
                            <div>
                                <label for="number_of_ticket" class="block text-sm font-medium text-gray-700">Number of Tickets</label>
                                <input type="number" id="number_of_ticket" name="tickets" min="1" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit" class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500">
                                    Search Tickets
                                </button>
                            </div>
                        </form> 
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>