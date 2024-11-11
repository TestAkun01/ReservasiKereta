<div class="bg-black">
    <div class="bg-[url('/assets/images/keretaapibg.png')] h-screen bg-cover bg-center relative">
        <div class="container mx-auto pt-20 pb-10 px-4 md:px-8 lg:px-16 flex justify-between items-center h-full">
            <div class="text-white space-y-4 max-w-lg" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight">
                    Pesan tiket kereta api online dengan harga promo di tiketjoyo.com
                </h1>
                <p class="text-lg md:text-2xl">
                    Transportasi yang nyaman dan tepercaya
                </p>
            </div>
            <div class="bg-white bg-opacity-90 p-8 rounded-lg shadow-lg w-full max-w-md">
                <form action="/train/search#hasil" method="GET" class="space-y-6">
                    <div>
                        <label for="from_station" class="block text-sm font-medium text-gray-700">From Station</label>
                        <select id="from_station" name="from" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option disabled <?= !isset($_GET['from']) ? 'selected' : '' ?>>-- Select From Station --</option>
                            <?php foreach ($data['stations'] as $station): ?>
                                <option value="<?= $station['id']; ?>" <?= (isset($_GET['from']) && $_GET['from'] == $station['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($station['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="to_station" class="block text-sm font-medium text-gray-700">To Station</label>
                        <select id="to_station" name="to" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option disabled <?= !isset($_GET['to']) ? 'selected' : '' ?>>-- Select To Station --</option>
                            <?php foreach ($data['stations'] as $station): ?>
                                <option value="<?= $station['id']; ?>" <?= (isset($_GET['to']) && $_GET['to'] == $station['id']) ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($station['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div>
                        <label for="departure_date" class="block text-sm font-medium text-gray-700">Departure Date</label>
                        <input type="date" id="departure_date" name="date" value="<?= htmlspecialchars($_GET['date'] ?? '') ?>" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="number_of_ticket" class="block text-sm font-medium text-gray-700">Number of Tickets</label>
                        <input type="number" id="number_of_ticket" name="tickets" min="1" value="<?= htmlspecialchars($_GET['tickets'] ?? '') ?>" class="block w-full mt-1 p-2 border border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    </div>
                    <div>
                        <button type="submit" class="w-full bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg shadow hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-500 transition duration-300">
                            Search Tickets
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if (isset($data['schedules'])): ?>
        <div class="container mx-auto mt-12 px-4 md:px-8 lg:px-16" id="hasil">
            <?php $this->partial("resultSearch", $data); ?>
        </div>
    <?php endif; ?>
</div>