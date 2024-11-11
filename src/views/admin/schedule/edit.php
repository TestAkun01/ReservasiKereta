<div class="min-h-screen bg-gray-100 flex justify-center items-center p-6">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Train Schedule</h1>

        <form action="/admin/schedule/edit/<?= $data["schedule"]['id'] ?>" method="POST">

            <div class="mb-4">
                <label for="train_id" class="block text-sm font-medium text-gray-700">Train</label>
                <select name="train_id" id="train_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                    <option value="">Select Train</option>
                    <?php foreach ($data["trains"] as $train) : ?>
                        <option value="<?= $train['id']; ?>" <?= ($train['id'] == $data['schedule']['train_id']) ? 'selected' : '' ?>>
                            <?= $train['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="station_from" class="block text-sm font-medium text-gray-700">Station From</label>
                <select name="station_from" id="station_from" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                    <option value="">Select Station</option>
                    <?php foreach ($data["stations"] as $station) : ?>
                        <option value="<?= $station['id']; ?>" <?= ($station['id'] == $data['schedule']['station_from']) ? 'selected' : '' ?>>
                            <?= $station['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="station_to" class="block text-sm font-medium text-gray-700">Station To</label>
                <select name="station_to" id="station_to" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
                    <option value="">Select Station</option>
                    <?php foreach ($data["stations"] as $station) : ?>
                        <option value="<?= $station['id']; ?>" <?= ($station['id'] == $data['schedule']['station_to']) ? 'selected' : '' ?>>
                            <?= $station['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-4">
                <label for="departure_date" class="block text-sm font-medium text-gray-700">Departure Date</label>
                <input type="date" name="departure_date" id="departure_date" value="<?= $data['schedule']['departure_date']; ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="departure_time" class="block text-sm font-medium text-gray-700">Departure Time</label>
                <input type="time" name="departure_time" id="departure_time" value="<?= $data['schedule']['departure_time']; ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="arrival_time" class="block text-sm font-medium text-gray-700">Arrival Time</label>
                <input type="time" name="arrival_time" id="arrival_time" value="<?= $data['schedule']['arrival_time']; ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
            </div>

            <div class="mb-4">
                <label for="seats_left" class="block text-sm font-medium text-gray-700">Seats Left</label>
                <input type="number" name="seats_left" id="seats_left" value="<?= $data['schedule']['seats_left']; ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
            </div>

            <div class="mb-6">
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <input type="text" name="price" id="price" value="<?= $data['schedule']['price']; ?>" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent">
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-50">
                Update Schedule
            </button>
        </form>
    </div>
</div>