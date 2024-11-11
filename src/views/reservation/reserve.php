<style>
    .bg-glass {
        background-color: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(15px);
    }
</style>

<div class="min-h-screen flex flex-col bg-[url('/assets/images/keretaapibg.png')] bg-cover bg-center">
    <div class="flex-grow flex items-center justify-center">
        <div class="container mx-auto px-4">
            <div class="bg-glass p-10 rounded-lg shadow-2xl max-w-lg mx-auto">
                <h1 class="text-4xl font-extrabold text-center mb-8 text-gray-800">Reservasi Tiket Kereta</h1>
                <form action="/reservation/create" method="POST" class="space-y-6">
                    <input type="hidden" name="schedule_id" value="<?= htmlspecialchars($data['schedule_id']); ?>">
                    <input type="hidden" name="tickets" value="<?= htmlspecialchars($data['tickets']); ?>">
                    <input type="hidden" name="user_id" value="<?= htmlspecialchars($data['user_id']); ?>">

                    <div>
                        <label for="name" class="block text-lg font-semibold text-gray-700">Nama:</label>
                        <input type="text" name="name" id="name" placeholder="Masukkan nama" required
                            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="identity" class="block text-lg font-semibold text-gray-700">Identitas (No. KTP/Paspor):</label>
                        <input type="text" name="identity" id="identity" placeholder="Masukkan nomor identitas" required
                            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="contact" class="block text-lg font-semibold text-gray-700">Kontak (No. Telepon):</label>
                        <input type="tel" name="contact" id="contact" placeholder="Masukkan nomor telepon" required
                            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <div>
                        <label for="email" class="block text-lg font-semibold text-gray-700">Email:</label>
                        <input type="email" name="email" id="email" placeholder="Masukkan email" required
                            class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <button type="submit"
                        class="w-full bg-indigo-600 text-white font-semibold py-3 px-4 rounded-lg hover:bg-indigo-700 transition-colors text-lg shadow-lg">
                        Pesan Tiket
                    </button>
                </form>

                <?php if (isset($_GET['error'])): ?>
                    <div class="mt-4 text-red-600 text-center font-semibold">
                        <?php echo htmlspecialchars($_GET['error']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>