<div class="container mx-auto space-y-6">
    <section class="bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-gray-700">Dashboard Overview</h2>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            <div class="stat-item bg-gray-50 p-4 rounded-lg shadow">
                <h3 class="text-xl font-medium text-gray-800">Total Trains</h3>
                <p class="text-2xl font-bold text-blue-600"><?php echo $data["totalTrains"]; ?></p>
            </div>
            <div class="stat-item bg-gray-50 p-4 rounded-lg shadow">
                <h3 class="text-xl font-medium text-gray-800">Total Schedules</h3>
                <p class="text-2xl font-bold text-blue-600"><?php echo $data["totalSchedules"]; ?></p>
            </div>
            <div class="stat-item bg-gray-50 p-4 rounded-lg shadow">
                <h3 class="text-xl font-medium text-gray-800">Total Stations</h3>
                <p class="text-2xl font-bold text-blue-600"><?php echo $data["totalStations"]; ?></p>
            </div>
            <div class="stat-item bg-gray-50 p-4 rounded-lg shadow">
                <h3 class="text-xl font-medium text-gray-800">Total Reservations</h3>
                <p class="text-2xl font-bold text-blue-600"><?php echo $data["totalReservations"]; ?></p>
            </div>
            <div class="stat-item bg-gray-50 p-4 rounded-lg shadow">
                <h3 class="text-xl font-medium text-gray-800">Total Users</h3>
                <p class="text-2xl font-bold text-blue-600"><?php echo $data["totalUsers"]; ?></p>
            </div>
        </div>
    </section>

    <section class="bg-white p-6 rounded-lg shadow-md mt-6">
        <h2 class="text-2xl font-semibold text-gray-700">Recent Reservations</h2>
        <table class="min-w-full table-auto mt-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left text-gray-700">Reservation ID</th>
                    <th class="px-4 py-2 text-left text-gray-700">Name</th>
                    <th class="px-4 py-2 text-left text-gray-700">Train</th>
                    <th class="px-4 py-2 text-left text-gray-700">Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["recentReservations"] as $reservation): ?>
                    <tr class="border-t">
                        <td class="px-4 py-2"><?php echo htmlspecialchars($reservation['id']); ?></td>
                        <td class="px-4 py-2"><?php echo htmlspecialchars($reservation['name']); ?></td>
                        <td class="px-4 py-2"><?php echo htmlspecialchars($reservation['train_name']); ?></td>
                        <td class="px-4 py-2"><?php echo htmlspecialchars($reservation['created_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
</div>