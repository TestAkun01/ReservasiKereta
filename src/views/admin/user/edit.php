<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <h1>Edit User</h1>
    <form action="/admin/user/edit/<?= $data["user"]['id'] ?>" method="POST">
        <label>Username:</label>
        <input type="text" name="username" value="<?= $data['user']['username']; ?>" disabled></br>

        <label>Password:</label>
        <input type="text" name="password" value="<?= $data['user']['password']; ?>" disabled></br>

        <label>Role:</label>
        <select name="role">
            <option value="">Select Class</option>
            <option value="User" <?= ($data["user"]["role"] == 'User') ? 'selected' : null; ?>>User</option>
            <option value="Admin" <?= ($data["user"]["role"] == 'Admin') ? 'selected' : null; ?>>Admin</option>
        </select></br>

        <button type="submit">Update</button>
    </form>

</body>

</html>