<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedules</title>
</head>

<body>
    <h1>Edit Train Schedule</h1>
    <form action="/admin/schedule/edit/<?= $data["schedule"]['id'] ?>" method="POST">

        <label>Train:</label>
        <select name="train_id">
            <option value="">Select Train</option>
            <?php foreach ($data["trains"] as $train) : ?>
                <option value="<?= $train['id']; ?>" <?= ($train['id'] == $data['schedule']['train_id']) ? 'selected' : '' ?>>
                    <?= $train['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Station From:</label>
        <select name="station_from">
            <option value="">Select Station</option>
            <?php foreach ($data["stations"] as $station) : ?>
                <option value="<?= $station['id']; ?>" <?= ($station['id'] == $data['schedule']['station_from']) ? 'selected' : '' ?>>
                    <?= $station['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Station To:</label>
        <select name="station_to">
            <option value="">Select Station</option>
            <?php foreach ($data["stations"] as $station) : ?>
                <option value="<?= $station['id']; ?>" <?= ($station['id'] == $data['schedule']['station_to']) ? 'selected' : '' ?>>
                    <?= $station['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Departure Date:</label>
        <input type="date" name="departure_date" value="<?= $data['schedule']['departure_date']; ?>"></br>

        <label>Departure Time:</label>
        <input type="time" name="departure_time" value="<?= $data['schedule']['departure_time']; ?>"></br>

        <label>Arrival Time:</label>
        <input type="time" name="arrival_time" value="<?= $data['schedule']['arrival_time']; ?>"></br>

        <label>Seats Left:</label>
        <input type="number" name="seats_left" value="<?= $data['schedule']['seats_left']; ?>"></br>

        <label>Price:</label>
        <input type="text" name="price" value="<?= $data['schedule']['price']; ?>"></br>

        <button type="submit">Update</button>
    </form>

</body>

</html>