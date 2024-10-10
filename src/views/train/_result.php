<?php if (!empty($data['schedules'])): ?>
    <ul class="space-y-4">
        <!-- TO DO: ubah style jika ticket sudah habis atau ticket yang tersisa < ticket yang diminta maka ubah style nya -->
        <?php foreach ($data['schedules'] as $schedule): ?>
            <li class="bg-white p-6 rounded-lg shadow-lg">
                <p class="text-lg font-semibold">Train: <?= $schedule['train_name']; ?></p>
                <p>From: <?= $schedule['from_name']; ?>, <?= $schedule['from_city']; ?></p>
                <p>To: <?= $schedule['to_name']; ?>, <?= $schedule['to_city']; ?></p>
                <p>Price: <?= $schedule['price']; ?></p>
                <p>Departure Time: <?= date('H:i', strtotime($schedule['departure_time'])); ?></p>
                <p>Arrival Time: <?= date('H:i', strtotime($schedule['arrival_time'])); ?></p>
                <p>Available Seats: <?= $schedule['seats_left']; ?></p>

                <form action="/reservation" method="POST" class="mt-4">
                    <input type="hidden" name="schedule_id" value="<?= $schedule['id']; ?>">
                    <input type="hidden" name="tickets" value="<?= $data['tickets']; ?>">
                    <input type="hidden" name="user_id" value="<?= $_SESSION["user"]["id"] ?? null ?>">
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition">
                        Book This Train
                    </button>
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p class="text-center text-gray-600 italic mt-6">No available trains for the selected route and date.</p>
<?php endif; ?>