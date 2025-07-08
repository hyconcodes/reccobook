<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Navigation -->
                <nav class="bg-white dark:bg-gray-800 shadow-lg">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex items-center">
                                <span class="text-xl font-bold text-green-600 dark:text-green-400">{{ config('app.name') }}</span>
                            </div>
                            <div class="flex items-center">
                                @auth
                                    <a href="{{ url('/home') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Home</a>
                                @else
                                    <a href="{{ url('login') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </nav>

            <!-- Hero Section -->
            <div class="relative">
                <div class="absolute inset-0">
                    <img src="{{ asset('assets/img/edubook.jpg') }}" alt="Background" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
                </div>
                <div class="relative max-w-7xl mx-auto py-24 px-4 sm:py-32 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                            Welcome to <span class="text-green-400">EduBook</span>
                        </h1>
                        <p class="mt-3 max-w-md mx-auto text-base text-gray-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                            Your ultimate platform for educational resources and learning materials.
                        </p>
                        <p class="mt-3 max-w-md mx-auto text-base text-gray-300 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                            Educational Resource Recommender is a web-based platform designed to help students discover the right learning materials effortlessly. By selecting their academic interests or departments, users receive personalized book and video recommendations tailored to their needs.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Features Section -->
            <div class="bg-gray-50 dark:bg-gray-900 py-12">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
                        <!-- Feature 1 -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                            <div class="bg-green-500 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Digital Library</h3>
                            <p class="text-gray-600 dark:text-gray-400">Access thousands of educational books and resources.</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                            <div class="bg-green-500 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Interactive Learning</h3>
                            <p class="text-gray-600 dark:text-gray-400">Engage with interactive content and learning materials.</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6">
                            <div class="bg-green-500 rounded-full w-12 h-12 flex items-center justify-center mb-4">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Community Learning</h3>
                            <p class="text-gray-600 dark:text-gray-400">Connect with other learners and share knowledge.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-800">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between items-center">
                        <div class="text-gray-500 dark:text-gray-400">
                            &copy; 2023 EduBook. All rights reserved.
                        </div>
                        <div class="text-gray-500 dark:text-gray-400">
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>
