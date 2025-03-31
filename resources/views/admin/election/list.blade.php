<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Election</title>
</head>

<body>
    <div class="flex">
        <x-adminsidebar></x-adminsidebar>

        <div class="flex-1 p-6 ml-56">
            <div class="block max-w-2xlg h-full p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">List Election</h5>
                <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">

                <!-- Card Candidate anjeng -->
                <div class="flex flex-wrap justify-start gap-8 px-6 pb-6">
                    @foreach ($election as $e)
                    <div class="w-full sm:w-1/2 md:w-full lg:w-64 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-400">
                        <div>
                            <img class="rounded-t-lg w-full h-48 object-cover" src="{{ asset('storage/photo/' . $e->photo_election) }}" alt="" />
                        </div>
                        <div class="p-5">
                            <a href="#">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $e->title }}</h5>
                            </a>
                            <div class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                <table class="w-full">
                                    <tr>
                                        <td class="py-4">
                                            @if($e->candidatesOne)
                                            <p>{{ $e->candidatesOne->name }}</p>
                                            @else
                                            <p>No candidate found</p>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center">Vs</td>
                                        <td class="py-4 text-right">
                                            @if($e->candidatesTwo)
                                            <p>{{ $e->candidatesTwo->name }}</p>
                                            @else
                                            <p>No candidate found</p>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                @if ($e->status === 'draft')
                                <button type="button" class="text-blue-700 border border-blue-700  focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Draft</button>
                                @elseif ($e->status === 'active')
                                <button type="button" class="text-yellow-400 border border-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Active</button>
                                @elseif ($e->status === 'finished')
                                <button type="button" class="text-green-700 border border-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Finished</button>
                                @endif
                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>