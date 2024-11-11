<div class="bg-gray-100 flex justify-center  p-6">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Train Schedules</h1>
        <a href="/admin/schedule/create" class="inline-block py-2 px-6 bg-blue-600 text-white font-semibold rounded-lg mb-6 hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400">Add New Schedule</a>

        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Train ID</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">From</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">To</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Departure</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Arrival</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Seats Left</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Price</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["schedules"] as $schedule): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $schedule['id'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $schedule['train_id'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $schedule['station_from'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $schedule['station_to'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $schedule['departure_date'] ?> <?= $schedule['departure_time'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $schedule['arrival_time'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $schedule['seats_left'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $schedule['price'] ?></td>
                        <td class="py-2 px-4 text-sm">
                            <a href="/admin/schedule/edit/<?= $schedule['id'] ?>" class="text-blue-600 hover:text-blue-500">Edit</a>
                            <a href="/admin/schedule/delete/<?= $schedule['id'] ?>" class="text-red-600 hover:text-red-500">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>