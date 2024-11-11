<div class="max-w-md mx-auto mt-10 p-8 bg-white bg-opacity-90 rounded-lg shadow-lg text-center transform transition-all hover:scale-105 hover:shadow-xl">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m1 10H5a2 2 0 01-2-2V5a2 2 0 012-2h14a2 2 0 012 2v14a2 2 0 01-2 2z" />
    </svg>
    <h1 class="text-3xl font-semibold text-green-700 mb-2">Booking Successful!</h1>
    <p class="text-gray-700 text-lg mb-4">You have successfully booked <span class="font-bold"><?= htmlspecialchars($data['tickets']); ?></span> ticket(s) for your train journey.</p>
    <a href="/" class="mt-6 inline-block w-full px-5 py-3 bg-green-600 text-white font-medium rounded-lg shadow-md hover:bg-green-500 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
        Go Back to Train Search
    </a>
</div>