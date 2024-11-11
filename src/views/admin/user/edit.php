<div class="min-h-screen flex justify-center items-center bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
        <h1 class="text-3xl font-semibold text-center text-gray-800 mb-6">Edit User</h1>
        <form action="/admin/user/edit/<?= $data["user"]['id'] ?>" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username:</label>
                <input type="text" name="username" value="<?= $data['user']['username']; ?>"
                    class="w-full p-3 mt-1 border border-gray-300 rounded-md bg-gray-50 text-gray-500"
                    disabled>
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                <input type="text" name="password" value="<?= $data['user']['password']; ?>"
                    class="w-full p-3 mt-1 border border-gray-300 rounded-md bg-gray-50 text-gray-500"
                    disabled>
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700">Role:</label>
                <select name="role"
                    class="w-full p-3 mt-1 border border-gray-300 rounded-md bg-white text-gray-700">
                    <option value="">Select Role</option>
                    <option value="User" <?= ($data["user"]["role"] == 'User') ? 'selected' : null; ?>>User</option>
                    <option value="Admin" <?= ($data["user"]["role"] == 'Admin') ? 'selected' : null; ?>>Admin</option>
                </select>
            </div>

            <div class="mt-6">
                <button type="submit"
                    class="w-full py-3 px-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>