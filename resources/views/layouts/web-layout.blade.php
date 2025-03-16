<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-Shop - Products</title>
    <!-- Include Tailwind CSS -->

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#111827] text-white p-10">
    <!-- Navigation Bar -->
    <nav class="p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">E-Shop</div>
            <ul class="flex space-x-4">

                @auth
                    <li>
                        <a href="{{ url('/dashboard') }}" class="hover:text-blue-500">Dashboard</a>
                    </li>
                @else
                    <li>

                        <a href="{{ route('login') }}" class="hover:text-blue-500">Log
                            in</a>
                    </li>

                    @if (Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}" class="ml-4 hover:text-blue-500 ">Register</a>
                        </li>
                    @endif
                @endauth
            </ul>
        </div>
    </nav>



    <main>
        {{ $slot }}
    </main>



        <!-- Footer with background #111827 -->
        <footer class="bg-[#111827] p-4 text-center">
            <p>&copy; 2025 E-Shop. All rights reserved.</p>
        </footer>
    </body>
    
    </html>