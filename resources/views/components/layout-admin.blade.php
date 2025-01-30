<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <x-admin-navbar />
        <x-admin-sidebar />
        <x-main-admin>{{ $slot }}</x-main-admin>
    </div>
</body>

</html>
