<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Vote</title>
</head>

<body>
    <div class="flex">
        <x-admin-sidebar></x-admin-sidebar>
        <div class="flex-1 p-6 ml-56">
            <div class="block max-w-2xlg h-full p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="grid gap-4">
                    <div class="flex mb-2 justify-center">
                        <h2 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-4xl dark:text-white">{{ $electionId->title }}</h2>
                    </div>
                    <div class="flex mb-6 px-16 justify-center justify-between">
                        <div>
                            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div>
                                    <h5 class="p-2 text-lg text-center font-bold text-gray-900 dark:text-blue-500">Candidate One</h5>
                                    <hr class="h-px mb-2 bg-gray-200 border-0 dark:bg-gray-700">
                                </div>
                                <div>
                                    <img class="rounded-t-lg" src="{{ asset('storage/photo/' . $electionId->candidatesOne->photo) }}" alt="Canidate One" />
                                </div>
                                <div class="p-5">
                                    <div>
                                        <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $electionId->candidatesOne->name }}</h5>
                                    </div>
                                    <p class="mb-6 font-normal text-gray-700 dark:text-gray-400">{{ $electionId->candidatesOne->description }}</p>
                                </div>
                                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                                <div class="flex p-2 justify-center items-center">
                                    <button type="button" class="w-full text-blue-700 border border-blue-700 text-2xl font-medium rounded-lg px-3 py-8 text-center me-1 mb-1">{{ $voteOne }}</button>
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class=" max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                <div>
                                    <h5 class="p-2 text-lg text-center font-bold text-gray-900 dark:text-red-500">Candidate Two</h5>
                                    <hr class="h-px mb-2 bg-gray-200 border-0 dark:bg-gray-700">
                                </div>
                                <div>
                                    <img class="rounded-t-lg" src="{{ asset('storage/photo/' . $electionId->candidatesTwo->photo) }}" alt="" />
                                </div>
                                <div class="p-5">
                                    <div>
                                        <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $electionId->candidatesTwo->name }}</h5>
                                    </div>
                                    <p class="mb-6 font-normal text-gray-700 dark:text-gray-400">{{ $electionId->candidatesTwo->description }}</p>
                                </div>
                                <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                                <div class="flex p-2 justify-center items-center">
                                    <button type="button" class="w-full text-red-700 border border-red-700 text-2xl font-medium rounded-lg px-3 py-8 text-center me-1 mb-1">{{ $voteTwo }}</button>
                                </div>
                            </div>

                        </div>
                    </div>

                    <hr class="h-px mb-2 bg-gray-200 border-0 dark:bg-gray-700">

                    <div class="flex mt-1 justify-end">
                        <div>
                            <a href="{{ route('admin.vote.list') }}" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-16 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>