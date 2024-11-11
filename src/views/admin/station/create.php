<div class="min-h-screen bg-gray-100 flex justify-center items-center p-6">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Add New Station</h1>

        <form action="/admin/station/create" method="POST" class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">City:</label>
                <input type="text" name="city" id="city" class="mt-1 p-2 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="flex justify-center">
                <button type="submit" class="py-2 px-6 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Create</button>
            </div>
        </form>
    </div>
</div>