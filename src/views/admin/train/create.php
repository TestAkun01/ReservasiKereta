<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Train</title>
</head>

<body>

    <h1>Add New Train</h1>
    <form action="/admin/train/create" method="POST">
        <label>Name:</label>
        <input type="text" name="name"></br>

        <label>Total Seats:</label>
        <input type="number" name="total_seats"></br>

        <label>Class:</label>
        <select name="class">
            <option value="">Select Class</option>
            <option value="Economy">Economy</option>
            <option value="Business">Business</option>
            <option value="Executive">Executive</option>
        </select></br>

        <label>Carriage:</label>
        <input type="number" name="carriage"></br>

        <label>Status:</label>
        <select name="status">
            <option value="">Select Status</option>
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select></br>

        <button type="submit">Update</button>
    </form>


</body>

</html>