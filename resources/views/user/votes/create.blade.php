<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Vote</title>
</head>

<body>
    <div class="flex">
        <x-user-sidebar></x-user-sidebar>
        <div class="flex-1 p-6 ml-56">
            <div class="block max-w-2xlg h-full p-6 bg-white rounded-lg shadow-sm dark:bg-gray-800">
                <div class="grid gap-4">
                    <form action="{{ route('user.vote.store') }}" method="post">
                        @csrf
                        <input type="number" name="electionId" value="{{ $election->id }}" class="hidden">
                        <div class="mb-3">
                            <img class="h-md max-w-full rounded-lg" src="{{ asset('storage/photo/' . $election->photo_election) }}" alt="Election Image">
                        </div>
                        <div class="flex mb-2 justify-center">
                            <h2 class="mb-4 text-2xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-4xl dark:text-white">{{ $election->title }}</h2>
                        </div>
                        <div class="flex mb-6 px-16 justify-center justify-between">
                            <div>
                                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                                    <div>
                                        <h5 class="p-2 text-lg text-center font-bold text-gray-900 dark:text-blue-500">Candidate One</h5>
                                        <hr class="h-px mb-2 bg-gray-200 border-0 dark:bg-gray-700">
                                    </div>
                                    <div>
                                        <img class="rounded-t-lg" src="{{ asset('storage/photo/' . $election->candidatesOne->photo) }}" alt="Canidate One" />
                                    </div>
                                    <div class="p-5">
                                        <div>
                                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $election->candidatesOne->name }}</h5>
                                        </div>
                                        <p class="mb-6 font-normal text-gray-700 dark:text-gray-400">{{ $election->candidatesOne->description }}</p>
                                    </div>
                                    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                                    <div class="flex p-2 justify-center items-center">
                                        <input type="radio" id="radio-1" name="candidate" value="{{ $election->candidatesOne->id }}" class="hidden peer">
                                        <label for="radio-1" class="radio-btn w-full text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 peer-checked:bg-green-700 peer-checked:text-white peer-checked:border-green-700">Choose Candidate One
                                        </label>
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
                                        <img class="rounded-t-lg" src="{{ asset('storage/photo/' . $election->candidatesTwo->photo) }}" alt="" />
                                    </div>
                                    <div class="p-5">
                                        <div>
                                            <h5 class="mb-2 text-center text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $election->candidatesTwo->name }}</h5>
                                        </div>
                                        <p class="mb-6 font-normal text-gray-700 dark:text-gray-400">{{ $election->candidatesTwo->description }}</p>
                                    </div>
                                    <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                                    <div class="flex p-2 justify-center items-center">
                                        <input type="radio" id="radio-2" name="candidate" value="{{ $election->candidatesTwo->id }}" class="hidden peer">
                                        <label for="radio-2" class="radio-btn w-full text-green-700 hover:text-white border border-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm py-2 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-800 peer-checked:bg-green-700 peer-checked:text-white peer-checked:border-green-700">Choose Candidate Two
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr class="h-px mb-2 bg-gray-200 border-0 dark:bg-gray-700">

                        <div class="flex mt-6 justify-end">
                            <div>
                                <button type="submit" class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-16 py-2.5 text-center me-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Submit</button>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
</body>

</html>