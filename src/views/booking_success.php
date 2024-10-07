<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-5">
    <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md text-center">
        <h1 class="text-2xl font-bold text-green-600">Booking Successful!</h1>
        <p class="text-gray-800 text-lg">You have successfully booked <?= htmlspecialchars($data['tickets']); ?> ticket(s) for your train.</p>
        <a href="/" class="mt-5 inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-500">Go Back to Train Search</a>
    </div>
</body>

</html>