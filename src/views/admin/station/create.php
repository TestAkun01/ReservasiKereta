<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Station</title>
</head>

<body>

    <h1>Add New Station</h1>
    <form action="/admin/station/create" method="POST">
        <label>Name:</label>
        <input type="text" name="name"></br>

        <label>City:</label>
        <input type="text" name="city"></br>

        <button type="submit">Update</button>
    </form>


</body>

</html>