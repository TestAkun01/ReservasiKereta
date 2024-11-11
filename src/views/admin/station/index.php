<div class=" bg-gray-100 flex justify-center p-6">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">All Stations</h1>
        <a href="/admin/station/create" class="inline-block py-2 px-4 mb-4 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">
            Add New Station
        </a>

        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-200">
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Name</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">City</th>
                    <th class="py-2 px-4 text-left text-sm font-medium text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data["stations"] as $station): ?>
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $station['id'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $station['name'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700"><?= $station['city'] ?></td>
                        <td class="py-2 px-4 text-sm text-gray-700">
                            <a href="/admin/station/edit/<?= $station['id'] ?>" class="text-blue-600 hover:text-blue-400">Edit</a>
                            <a href="/admin/station/delete/<?= $station['id'] ?>" class="text-red-600 hover:text-red-400">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>