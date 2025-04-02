<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Active</title>
</head>

<body>
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
                                    <button type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-1 mb-1 dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800" data-election-id="{{ $e->id }}">
                                        Vote
                                    </button>
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