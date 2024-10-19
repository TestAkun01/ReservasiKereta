<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>

<body>
    <header>
        <h1>Welcome to Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="/admin/train">Manage Trains</a></li>
                <li><a href="/admin/schedule">Manage Schedules</a></li>
                <li><a href="/admin/user">Manage Users</a></li>
                <li><a href="/logout">Logout</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Dashboard Overview</h2>
        <div class="stats">
            <div class="stat-item">
                <h3>Total Trains</h3>
                <p><?php echo $data["totalTrains"]; ?></p>
            </div>
            <div class="stat-item">
                <h3>Total Trains</h3>
                <p><?php echo $data["totalSchedules"]; ?></p>
            </div>
            <div class="stat-item">
                <h3>Total Trains</h3>
                <p><?php echo $data["totalStations"]; ?></p>
            </div>
            <div class="stat-item">
                <h3>Total Reservations</h3>
                <p><?php echo $data["totalReservations"]; ?></p>
            </div>
            <div class="stat-item">
                <h3>Total Users</h3>
                <p><?php echo $data["totalUsers"]; ?></p>
            </div>
        </div>

        <h2>Recent Reservations</h2>
        <table>
            <thead>
                <tr>
                    <th>Reservation ID</th>
                    <th>Name</th>
                    <th>Train</th>
                    <th>Departure Date</th>
                    <th>Departure Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["recentReservations"] as $reservation): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($reservation['id']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['name']);
                            ?></td>
                        <td><?php echo htmlspecialchars($reservation['train_name']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['departure_date']); ?></td>
                        <td><?php echo htmlspecialchars($reservation['departure_time']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </main>
</body>

</html>