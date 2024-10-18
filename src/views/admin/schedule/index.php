<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Schedules</title>
</head>

<body>

    <h1>Train Schedules</h1>
    <a href="/admin/schedule/create">Add New Schedule</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Train ID</th>
                <th>From</th>
                <th>To</th>
                <th>Departure</th>
                <th>Arrival</th>
                <th>Seats Left</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["schedules"] as $schedule): ?>
                <tr>
                    <td><?= $schedule['id'] ?></td>
                    <td><?= $schedule['train_id'] ?></td>
                    <td><?= $schedule['station_from'] ?></td>
                    <td><?= $schedule['station_to'] ?></td>
                    <td><?= $schedule['departure_date'] ?> <?= $schedule['departure_time'] ?></td>
                    <td><?= $schedule['arrival_time'] ?></td>
                    <td><?= $schedule['seats_left'] ?></td>
                    <td><?= $schedule['price'] ?></td>
                    <td>
                        <a href="/admin/schedule/edit/<?= $schedule['id'] ?>">Edit</a> |
                        <a href="/admin/schedule/delete/<?= $schedule['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>