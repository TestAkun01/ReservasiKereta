<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Schedules</title>
</head>

<body>

    <h1>Add New Train Schedule</h1>
    <form action="/admin/schedule/create" method="POST">
        <label>Train:</label>
        <select name="train_id">
            <option value="">Select Station</option>
            <?php foreach ($data["trains"] as $train) : ?>
                <option value="<?= $train['id']; ?>"><?= $train['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Station From:</label>
        <select name="station_from">
            <option value="">Select Station</option>
            <?php foreach ($data["stations"] as $station) : ?>
                <option value="<?= $station['id']; ?>"><?= $station['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Station To:</label>
        <select name="station_to">
            <option value="">Select Station</option>
            <?php foreach ($data["stations"] as $station) : ?>
                <option value="<?= $station['id']; ?>"><?= $station['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label>Departure Date:</label>
        <input type="date" name="departure_date"></br>

        <label>Departure Time:</label>
        <input type="time" name="departure_time"></br>

        <label>Arrival Time:</label>
        <input type="time" name="arrival_time"></br>

        <label>Price:</label>
        <input type="text" name="price"></br>

        <button type="submit">Save</button>
    </form>


</body>

</html>