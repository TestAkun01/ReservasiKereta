<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Stations</title>
</head>

<body>

    <h1>All Station</h1>
    <a href="/admin/station/create">Add New Station</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data["stations"] as $station): ?>
                <tr>
                    <td><?= $station['id'] ?></td>
                    <td><?= $station['name'] ?></td>
                    <td><?= $station['city'] ?></td>
                    <td>
                        <a href="/admin/station/edit/<?= $station['id'] ?>">Edit</a> |
                        <a href="/admin/station/delete/<?= $station['id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>