<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'TeamFlow') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <div class="relative min-h-screen bg-gradient-to-b from-gray-100 to-gray-200 dark:from-gray-900 dark:to-gray-800">
        @if (Route::has('login'))
            <div class="p-6 text-right">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-[24px]">Explore TF</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center">
                <h1 class="text-5xl font-bold text-gray-900 dark:text-white sm:text-6xl md:text-7xl">
                    Team<span class="text-indigo-600 dark:text-indigo-400">Flow</span>
                </h1>
                <p class="mt-6 text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Elevate your team's productivity with our intuitive project management platform.
                    Built for modern teams who value efficiency and collaboration.
                </p>

                <div class="mt-12">
                    <div class="grid grid-cols-1 gap-8 sm:grid-cols-3">
                        <div
                            class="bg-white dark:bg-gray-800 rounded-xl p-8 shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <div class="text-indigo-500 dark:text-indigo-400 text-4xl mb-4">
                                <i class="bi bi-kanban"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Project Management</h3>
                            <p class="mt-4 text-gray-600 dark:text-gray-300">Organize projects with powerful tools for
                                planning, tracking, and delivery</p>
                        </div>

                        <div
                            class="bg-white dark:bg-gray-800 rounded-xl p-8 shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <div class="text-indigo-500 dark:text-indigo-400 text-4xl mb-4">
                                <i class="bi bi-list-check"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Task Management</h3>
                            <p class="mt-4 text-gray-600 dark:text-gray-300">Break down projects into manageable tasks
                                and track progress effortlessly</p>
                        </div>

                        <div
                            class="bg-white dark:bg-gray-800 rounded-xl p-8 shadow-lg transform hover:scale-105 transition-transform duration-300">
                            <div class="text-indigo-500 dark:text-indigo-400 text-4xl mb-4">
                                <i class="bi bi-people"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">Team Collaboration</h3>
                            <p class="mt-4 text-gray-600 dark:text-gray-300">Connect your team members and foster
                                effective communication</p>
                        </div>
                    </div>
                </div>

                <div class="mt-16">
                    <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-8">Why Choose TeamFlow?</h2>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">100%</div>
                            <div class="mt-2 text-gray-600 dark:text-gray-300">Cloud-based</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">24/7</div>
                            <div class="mt-2 text-gray-600 dark:text-gray-300">Availability</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">Real-time</div>
                            <div class="mt-2 text-gray-600 dark:text-gray-300">Updates</div>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">Secure</div>
                            <div class="mt-2 text-gray-600 dark:text-gray-300">Data Protection</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>