<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Trains</title>
</head>

<body>

    <h1>All Train</h1>
    <a href="/admin/train/create">Add New Train</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Total Seats</th>
                <th>Class</th>
                <th>Carriage</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["trains"] as $train): ?>
                <tr>
                    <td><?= $train['id'] ?></td>
                    <td><?= $train['name'] ?></td>
                    <td><?= $train['total_seats'] ?></td>
                    <td><?= $train['class'] ?></td>
                    <td><?= $train['carriage'] ?></td>
                    <td><?= $train['status'] ?></td>
                    <td>
                        <a href="/admin/train/edit/<?= $train['id'] ?>">Edit</a> |
                        <a href="/admin/train/delete/<?= $train['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>