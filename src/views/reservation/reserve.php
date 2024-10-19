<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Tiket</title>
</head>

<body>
    <div class="container">
        <h1>Reservasi Tiket Kereta</h1>
        <form action="/reservation/create" method="POST">
            <input type="hidden" name="schedule_id" value="<?= htmlspecialchars($data['schedule_id']); ?>">
            <input type="hidden" name="tickets" value="<?= htmlspecialchars($data['tickets']); ?>">
            <input type="hidden" name="user_id" value="<?= htmlspecialchars($data['user_id']); ?>">

            <div class="form-group">
                <label for="name">Nama:</label>
                <input type="text" name="name" id="name" required>
            </div>

            <div class="form-group">
                <label for="identity">Identitas (No. KTP/Paspor):</label>
                <input type="text" name="identity" id="identity" required>
            </div>

            <div class="form-group">
                <label for="contact">Kontak (No. Telepon):</label>
                <input type="tel" name="contact" id="contact" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <button type="submit">Pesan Tiket</button>
        </form>

        <?php if (isset($_GET['error'])): ?>
            <div class="error-message">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>