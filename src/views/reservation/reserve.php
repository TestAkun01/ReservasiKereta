<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Tiket Kereta</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-glass {
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-[url('/assets/images/keretaapibg.png')] bg-cover bg-center">
    <div class="container mx-auto px-4">
        <div class="bg-glass p-8 rounded-lg shadow-lg max-w-lg mx-auto">
            <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Reservasi Tiket Kereta</h1>
            <form action="/reservation/create" method="POST" class="space-y-4">
                <input type="hidden" name="schedule_id" value="<?= htmlspecialchars($data['schedule_id']); ?>">
                <input type="hidden" name="tickets" value="<?= htmlspecialchars($data['tickets']); ?>">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($data['user_id']); ?>">

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama:</label>
                    <input type="text" name="name" id="name" placeholder="Masukkan nama" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="identity" class="block text-sm font-medium text-gray-700">Identitas (No. KTP/Paspor):</label>
                    <input type="text" name="identity" id="identity" placeholder="Masukkan nomor identitas" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="contact" class="block text-sm font-medium text-gray-700">Kontak (No. Telepon):</label>
                    <input type="tel" name="contact" id="contact" placeholder="Masukkan nomor telepon" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Masukkan email" required
                        class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <button type="submit"
                    class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-indigo-700 transition-colors">
                    Pesan Tiket
                </button>
            </form>

            <?php if (isset($_GET['error'])): ?>
                <div class="mt-4 text-red-500 text-center">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
