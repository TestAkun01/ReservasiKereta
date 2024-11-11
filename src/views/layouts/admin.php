<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $title ?? 'Admin Dashboard'; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">
        <header class="bg-blue-600 p-4 text-white">
            <div class="max-w-7xl mx-auto flex justify-between items-center">
                <a href="/admin" class="text-2xl font-bold">Admin Dashboard</a>
                <nav>
                    <ul class="flex space-x-4">
                        <li><a href="/admin/user" class="hover:text-blue-300">Manage Users</a></li>
                        <li><a href="/admin/schedule" class="hover:text-blue-300">Manage Schedules</a></li>
                        <li><a href="/admin/train" class="hover:text-blue-300">Manage Trains</a></li>
                        <li><a href="/admin/station" class="hover:text-blue-300">Manage Station</a></li>
                        <li><a href="/logout" class="hover:text-blue-300">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <main>
            <?php echo $content; ?>
        </main>
    </div>

</body>

</html>