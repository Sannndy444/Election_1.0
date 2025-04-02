<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Active</title>
</head>

<body>
    @if (session('success'))
    <div id="alert-3" class="fixed top-4 left-45 right-4 z-50 flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-600 dark:text-green-400" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Success</span>
        <div class="ms-3 text-sm font-medium">
            <a href="#" class="font-semibold underline hover:no-underline">Succes</a>. {{ session('success') }}.
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-600 dark:text-green-400" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <div class="flex">
        <x-user-sidebar></x-user-sidebar>
        <div class="flex-1 p-6 ml-56">
            <div class="block max-w-2xlg h-full p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">List Election Active</h5>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                <div class="flex flex-wrap justify-start gap-8 px-6 pb-6">
                    @if ($election->isEmpty())
                    <p>
                        No Data Found
                    </p>
                    @else
                    @foreach ($election as $e)
                    <div class="w-full sm:w-1/2 md:w-full lg:w-64 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-400">
                        <div>
                            <img class="rounded-t-lg w-full h-48 object-cover" src="{{ asset('storage/photo/' . $e->photo_election) }}" alt="" />
                        </div>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $e->title }}</h5>
                            </a>
                            <div class="mb-2 flex justify-between">
                                <p class="mb-3 text-left font-normal text-gray-700 dark:text-gray-400">
                                    @if ($e->candidatesOne)
                                    {{ $e->candidatesOne->name }}
                                    @else
                                    No Candidate Found
                                    @endif
                                </p>

                                <p>
                                    |
                                </p>

                                <p class="mb-3 text-right font-normal text-gray-700 dark:text-gray-400">
                                    @if ($e->candidatesTwo)
                                    {{ $e->candidatesTwo->name }}
                                    @else
                                    No Candidate Found
                                    @endif
                                </p>
                            </div>
                            <div class="mb-2">
                                <div class="flex justify-center justify-between">
                                    <p class="mb-3 text-left font-normal text-gray-700 dark:text-gray-400">
                                        End
                                    </p>

                                    <p>
                                        :
                                    </p>
                                    <p class="mb-3 text-right font-normal text-gray-700 dark:text-gray-400">
                                        {{ $e->end_date }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-center justify-between">
                                <div>
                                    <a href="{{ route('user.election.vote', $e->id) }}">
                                        <button type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-1 mb-1 dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800" data-election-id="{{ $e->id }}">
                                            Vote
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <button type="button" class="text-yellow-400 border border-yellow-400 font-medium rounded-lg px-3 py-2 text-center me-1 mb-1">Active</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>

            </div>
        </div>
</body>

</html>