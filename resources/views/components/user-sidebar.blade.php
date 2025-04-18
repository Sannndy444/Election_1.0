<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <title>Laravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased dark:bg-gray-500 dark:text-white/50">
    <div class="p-6">
        <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>

        <aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidenav">
            <div class="overflow-y-auto py-5 px-3 h-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('user.home') }}" class="flex items-center p-2 text-base font-normal @if(Request::routeIs('user.home')) rounded-lg bg-gray-200 dark:bg-gray-700 @endif hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-house"></i>
                            <span class="ml-3">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.candidate.index') }}" class="flex items-center p-2 text-base font-normal @if(Request::routeIs('user.candidate.index')) rounded-lg bg-gray-200 dark:bg-gray-700 @endif hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <i class="fa-solid fa-users"></i>
                            <span class="ml-3">Candidate</span>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="flex items-center p-2 w-full text-base font-normal text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
                            <i class="fa-solid fa-users-rectangle"></i>
                            <span class="flex-1 ml-3 text-left whitespace-nowrap">Election</span>
                            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-pages" class="hidden py-2 space-y-2">
                            <li>
                                <a href="{{ route('user.election.draft') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal @if(Request::routeIs('user.election.draft')) rounded-lg bg-gray-200 dark:bg-gray-700 @endif hover:bg-gray-100 dark:hover:bg-gray-700 group">Draft</a>
                            </li>
                            <li>
                                <a href="{{ route('user.election.active') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal @if(Request::routeIs('user.election.active')) rounded-lg bg-gray-200 dark:bg-gray-700 @endif hover:bg-gray-100 dark:hover:bg-gray-700 group">Active</a>
                            </li>
                            <li>
                                <a href="{{ route('user.election.history') }}" class="flex items-center p-2 pl-11 w-full text-base font-normal @if(Request::routeIs('user.election.history')) rounded-lg bg-gray-200 dark:bg-gray-700 @endif hover:bg-gray-100 dark:hover:bg-gray-700 group">History</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="pt-5 mt-5 space-y-2 border-t border-gray-200 dark:border-gray-700">
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg transition duration-75 hover:bg-gray-100 dark:hover:bg-gray-700 dark:text-white group">
                                <button type="submit">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                    <span class="ml-3">Log Out</span>
                                </button>
                            </div>
                        </form>
                    </li>
                </ul>
            </div>
        </aside>
    </div>
</body>

</html>