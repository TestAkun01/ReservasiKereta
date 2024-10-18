<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Train</title>
</head>

<body>
    <h1>Edit Train</h1>
    <form action="/admin/train/edit/<?= $data["train"]['id'] ?>" method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $data['train']['name']; ?>"></br>

        <label>Total Seats:</label>
        <input type="number" name="total_seats" value="<?= $data['train']['total_seats']; ?>"></br>

        <label>Class:</label>
        <select name="class">
            <option value="">Select Class</option>
            <option value="Economy" <?= ($data["train"]["class"] == 'Economy') ? 'selected' : null; ?>>Economy</option>
            <option value="Business" <?= ($data["train"]["class"] == 'Business') ? 'selected' : null; ?>>Business</option>
            <option value="Executive" <?= ($data["train"]["class"] == 'Executive') ? 'selected' : null; ?>>Executive</option>
        </select></br>

        <label>Carriage:</label>
        <input type="number" name="carriage" value="<?= $data['train']['carriage']; ?>"></br>

        <label>Status:</label>
        <select name="status">
            <option value="">Select Status</option>
            <option value="Active" <?= ($data["train"]["status"] ==  "Active") ? "selected" : null ?>>Active</option>
            <option value="Inactive" <?= ($data["train"]["status"] ==  "Inactive") ? "selected" : null ?>>Inactive</option>
        </select></br>

        <button type="submit">Update</button>
    </form>

</body>

</html>