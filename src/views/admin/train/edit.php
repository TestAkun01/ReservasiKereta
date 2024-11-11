<div class="min-h-screen bg-gray-100 flex justify-center items-center p-6">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Edit Train</h1>

        <form action="/admin/train/edit/<?= $data['train']['id'] ?>" method="POST">
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" id="name" name="name" value="<?= $data['train']['name']; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="total_seats" class="block text-sm font-medium text-gray-700">Total Seats:</label>
                <input type="number" id="total_seats" name="total_seats" value="<?= $data['train']['total_seats']; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="class" class="block text-sm font-medium text-gray-700">Class:</label>
                <select name="class" id="class" class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select Class</option>
                    <option value="Economy" <?= ($data['train']['class'] == 'Economy') ? 'selected' : ''; ?>>Economy</option>
                    <option value="Business" <?= ($data['train']['class'] == 'Business') ? 'selected' : ''; ?>>Business</option>
                    <option value="Executive" <?= ($data['train']['class'] == 'Executive') ? 'selected' : ''; ?>>Executive</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="carriage" class="block text-sm font-medium text-gray-700">Carriage:</label>
                <input type="number" id="carriage" name="carriage" value="<?= $data['train']['carriage']; ?>" class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Status:</label>
                <select name="status" id="status" class="mt-1 p-2 w-full border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                    <option value="">Select Status</option>
                    <option value="Active" <?= ($data['train']['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                    <option value="Inactive" <?= ($data['train']['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                </select>
            </div>

            <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                Update
            </button>
        </form>
    </div>
</div>