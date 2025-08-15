<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center min-h-screen p-4">
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8 space-y-6 border border-gray-100">
        <div class="text-center space-y-2">
            <h2 class="text-3xl font-bold text-gray-900">Create Account</h2>
            <p class="text-gray-500">Join us and start your journey</p>
        </div>

        <form action="{{ route('registrasi.submit') }}" method="POST" class="space-y-5">
            @csrf
                    <div class="space-y-1">
                <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                <input type="text"
                       id="name"
                       name="name"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 hover:bg-gray-100"
                       required>
            </div>

            <div class="space-y-1">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email"
                       id="email"
                       name="email"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 hover:bg-gray-100"
                       required>
            </div>

            <div class="space-y-1">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password"
                       id="password"
                       name="password"
                       class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition duration-200 bg-gray-50 hover:bg-gray-100"
                       required>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-lg hover:bg-blue-700 transform hover:scale-[1.02] transition-all duration-200 font-medium shadow-md hover:shadow-lg">
                Create Account
            </button>
        </form>

        <div class="text-center space-y-4">
            <p class="text-sm text-gray-600">
                Already have an account?
                <a href="/login" class="text-blue-600 hover:text-blue-700 font-medium hover:underline transition duration-200">Sign in</a>
            </p>

            <div class="flex items-center justify-center space-x-2 text-sm text-gray-500">
                <a href="#" class="hover:text-gray-700 transition duration-200">Privacy Policy</a>
                <span>•</span>
                <a href="#" class="hover:text-gray-700 transition duration-200">Terms of Service</a>
            </div>
        </div>
    </div>
</body>
</html>
