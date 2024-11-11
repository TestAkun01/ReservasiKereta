<div class=" bg-gray-100 flex justify-center p-6">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">All Trains</h1>
        <a href="/admin/train/create" class="inline-block py-2 px-4 mb-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
            Add New Train
        </a>

        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 ">ID</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 ">Name</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 ">Total Seats</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 ">Class</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 ">Carriage</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 ">Status</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700 ">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["trains"] as $train): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $train['id'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $train['name'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $train['total_seats'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $train['class'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $train['carriage'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $train['status'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700">
                            <a href="/admin/train/edit/<?= $train['id'] ?>" class="text-blue-600 hover:text-blue-500">Edit</a>
                            <a href="/admin/train/delete/<?= $train['id'] ?>" class="text-red-600 hover:text-red-500">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>