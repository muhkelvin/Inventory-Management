<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Inventory Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Tambahkan Tailwind CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<!-- Navbar -->
<nav class="bg-blue-500 p-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ url('/') }}" class="text-white text-lg font-bold">
            Inventory Management
        </a>
        <div class="flex space-x-4">
            <a href="{{ route('products.index') }}" class="text-white">Products</a>
            <a href="{{ route('suppliers.index') }}" class="text-white">Suppliers</a>
            <a href="{{ route('orders.index') }}" class="text-white">Orders</a>
        </div>
    </div>
</nav>

<!-- Content Section -->
<div class="container mx-auto my-8">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        @yield('content')
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 p-4 text-center text-white">
    <p>&copy; {{ date('Y') }} Inventory Management System</p>
</footer>

</body>
</html>
