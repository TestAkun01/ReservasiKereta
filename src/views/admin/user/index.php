<div class="bg-gray-100 flex justify-center p-6">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">All Users</h1>
        <a href="/user/auth" class="inline-block px-6 py-2 mb-4 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
            Add New User
        </a>


        <table class="min-w-full table-auto border-collapse mb-6">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 border-b">ID</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 border-b">Username</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 border-b">Password</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 border-b">Role</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 border-b">Created At</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 border-b">Updated At</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["users"] as $user): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $user['id'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $user['username'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700 truncate" style="max-width: 200px;"><?= $user['password'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $user['role'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $user['created_at'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $user['updated_at'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700">
                            <a href="/admin/user/edit/<?= $user['id'] ?>" class="text-blue-600 hover:text-blue-500 mr-2">Edit</a>
                            <a href="/admin/user/delete/<?= $user['id'] ?>" class="text-red-600 hover:text-red-500">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>