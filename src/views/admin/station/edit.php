<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Station</title>
</head>

<body>
    <h1>Edit Station</h1>
    <form action="/admin/station/edit/<?= $data["station"]["id"] ?>>" method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $data["station"]["name"] ?>"></br>

        <label>City:</label>
        <input type="text" name="city" value="<?= $data["station"]["city"] ?>"></br>

        <button type="submit">Update</button>
    </form>

</body>

</html>