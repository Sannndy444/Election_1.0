<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Election</title>
</head>

<body>
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <div id="alert-2" class="fixed top-4 left-45 right-4 z-50 flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-600 dark:text-red-400" role="alert">
        <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="sr-only">Error</span>
        <div class="ms-3 text-sm font-medium">
            <a href="#" class="font-semibold underline hover:no-underline">Error!</a>. {{ $error }}.
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-600 dark:text-red-400" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endforeach
    @endif

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

    <div id="electionModal" class="fixed inset-0 flex items-center justify-center bg-gray-500 bg-opacity-75 hidden">
        <div class="bg-white text-black p-6 rounded-lg shadow-lg">
            <h2 id="modalTitle" class="text-2xl font-bold"></h2>
            <p id="modalCandidateOne"></p>
            <p id="modalCandidateTwo"></p>
            <p id="modalStartDate"></p>
            <p id="modalEndDate"></p>
            <p id="modalDescription"></p>
            <p id="modalStatus"></p>
            <button id="closeModal" class="mt-4 bg-blue-500 text-white py-2 px-4 rounded">Close</button>
        </div>
    </div>

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
                                <h5 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $e->title }}</h5>
                            </a>
                            <div class="font-normal text-gray-700 dark:text-gray-400">
                                <table class="w-full">
                                    <tr>
                                        <td class="py-4 pr-1 text-left">
                                            @if($e->candidatesOne)
                                            <p>{{ $e->candidatesOne->name }}</p>
                                            @else
                                            <p>No candidate found</p>
                                            @endif
                                        </td>
                                        <td class="py-4 text-center">Vs</td>
                                        <td class="py-4 pl-1 text-right">
                                            @if($e->candidatesTwo)
                                            <p>{{ $e->candidatesTwo->name }}</p>
                                            @else
                                            <p>No candidate found</p>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                <div class="flex justify-center justify-between">
                                    <div class="">
                                        <form action="{{ route('admin.election.showDetail', $e->id) }}" method="get">
                                            @csrf
                                            <button type="button" class="text-gray-900 hover:text-white border border-gray-800 hover:bg-gray-900 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-1 mb-1 dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-800" data-election-id="{{ $e->id }}">
                                                Detail
                                            </button>
                                        </form>

                                    </div>
                                    <div>
                                        <form action="{{ route('admin.election.destroy', $e->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-900 hover:text-red border border-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2.5 text-center me-1 mb-1 dark:border-red dark:text-red-600 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-800">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="">
                                        @if ($e->status === 'draft')
                                        <button type="button" class="text-blue-700 border border-blue-700 font-medium rounded-lg text-sm px-3 py-2 text-center me-1 mb-1">Draft</button>
                                        @elseif ($e->status === 'active')
                                        <button type="button" class="text-yellow-400 border border-yellow-400 font-medium rounded-lg px-3 py-2 text-center me-1 mb-1">Active</button>
                                        @elseif ($e->status === 'finished')
                                        <button type="button" class="text-green-700 border border-green-700 font-medium rounded-lg px-3 py-2 text-center me-1 mb-1">Finished</button>
                                        @endif
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('button[data-election-id]').click(function(event) {
                event.preventDefault();
                var electionId = $(this).data('election-id');

                $.ajax({
                    url: '/admin/election/' + electionId + '/detail',
                    method: 'GET',
                    success: function(response) {
                        $('#modalTitle').text(response.title);
                        $('#modalCandidateOne').text('Candidate 1 : ' + response.candidate_one);
                        $('#modalCandidateTwo').text('Candidate 2 : ' + response.candidate_two);
                        $('#modalStartDate').text('Start Date : ' + response.startDate);
                        $('#modalEndDate').text('End Date : ' + response.endDate);
                        $('#modalDescription').text('Description : ' + response.description);
                        $('#modalStatus').text('Status : ' + response.status);
                        $('#electionModal').removeClass('hidden');
                    },
                    error: function() {
                        alert('Failed to load election details');
                    }
                });
            });

            $('#closeModal').click(function() {
                $('#electionModal').addClass('hidden');
            });
        });
    </script>
</body>

</html>