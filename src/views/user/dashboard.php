<h1 class="text-2xl font-bold text-center text-gray-800 mb-6">User Dashboard</h1>

<?php if (!empty($data['reservations'])): ?>
    <table class="min-w-full bg-white border border-gray-200">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Schedule ID</th>
                <th class="py-2 px-4 border-b">Train Name</th>
                <th class="py-2 px-4 border-b">Departure Date</th>
                <th class="py-2 px-4 border-b">Departure Time</th>
                <th class="py-2 px-4 border-b">Number of Tickets</th>
                <th class="py-2 px-4 border-b">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['reservations'] as $reservation): ?>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border-b"><?= $reservation['schedule_id']; ?></td>
                    <td class="py-2 px-4 border-b"><?= $reservation['train_name']; ?></td>
                    <td class="py-2 px-4 border-b"><?= date('Y-m-d', strtotime($reservation['departure_date'])); ?></td>
                    <td class="py-2 px-4 border-b"><?= date('H:i', strtotime($reservation['departure_time'])); ?></td>
                    <td class="py-2 px-4 border-b"><?= $reservation['num_tickets']; ?></td>
                    <td class="py-2 px-4 border-b">
                        <a href="/reservation/cancel/<?= $reservation['id']; ?>" class="text-red-500 hover:underline">Cancel</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p class="text-center text-gray-600 italic mt-6">You have no reservations yet.</p>
<?php endif; ?>