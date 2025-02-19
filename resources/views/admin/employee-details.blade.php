<x-layout>
    <main class="flex-1  ml-64 p-8">

        <!-- Header -->
        <div class="mb-8 flex justify-between items-center">
            <div>
                <h1 class="text-3xl font-bold text-white">Employee Details</h1>
                <p class="text-gray-300 text-sm font-semibold">View and manage all employees</p>
            </div>

            <button
                class="bg-zinc-900 hover:bg-zinc-800 rounded-lg border border-gray-700 text-sm
                     font-medium px-3 py-2 flex items-center gap-2 transition-all">
                <i class="fa-solid fa-arrow-down"></i>
                Download
            </button>

        </div>


        <!-- Employee Details Card -->
        <div class="bg-zinc-900 rounded-2xl p-6 mb-8">

            <!-- Employee Info -->
            <div class="flex items-start gap-6 mb-8">
                <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/image-MXcQ74LsbcG9GfLlcDf1038pTzzS85.png"
                    alt="Employee photo" class="w-20 h-20 rounded-full">
                <div class="space-y-2">
                    <h2 class="text-4xl font-bold mb-8">{{ $employee->first_name }}</h2>
                    <div class="flex justify-center items-center gap-14">
                        <div class="flex flex-col gap-2">
                            <span class="text-gray-300">Role</span>
                            <span class="text-base font-medium">{{ $employee->position->position_name }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-gray-300">Phone</span>
                            <div class="text-base font-medium">
                            <span class="text-base font-medium">{{ $employee->phone }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col gap-2"><span class="text-gray-300">Email</span>
                            <span class="text-base font-medium">{{ $employee->email }}</span>
                        </div>
                        <div class="flex flex-col gap-2"><span
                                class="text-gray-300 break-words overflow-hidden ">Address</span>
                                <span class="text-base font-medium">{{ $employee->address }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metrics Grid -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Total Attendence -->
                <div class="bg-zinc-800 rounded-xl p-4">
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-4 flex justify-center items-center bg-zinc-700 rounded-full">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-semibold">309</p>
                            <p class="text-gray-300">Total Attendence</p>
                        </div>
                    </div>
                </div>

                <!-- Avg Check In -->
                <div class="bg-zinc-800 rounded-xl p-4">
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-4 flex justify-center items-center bg-zinc-700 rounded-full">
                            <i class="fa-solid mx-1 fa-chevron-left"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-semibold">08:46</p>
                            <p class= "text-gray-300">Avg Check In Time</p>
                        </div>
                    </div>
                </div>

                <!-- Avg Check Out -->
                <div class="bg-zinc-800 rounded-xl p-4">
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-4 flex justify-center items-center bg-zinc-700 rounded-full">
                            <i class="fa-solid mx-1 fa-chevron-right"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-semibold">17:04</p>
                            <p class= "text-gray-300">Avg Check Out Time</p>
                        </div>
                    </div>
                </div>

                <!-- Employee Predicate -->
                <div class="bg-zinc-800 rounded-xl p-4">
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-4 flex justify-center items-center bg-zinc-700 rounded-full">
                            <i class="fa-solid mx-1 fa-bookmark"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-semibold">Role Model</p>
                            <p class="text-gray-300">Employee Predicate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendence History -->
        <div class="bg-zinc-900 rounded-2xl p-6">

            <!-- Attendence Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                @foreach ($attendences as $attendence)
                    <div class="bg-zinc-800 rounded-xl p-4">
                        <div class="flex justify-between items-start mb-4">
                            <p class="text-sm text-gray-300">
                                <i class="fa-regular fa-clock h-2 w-2 mr-2"></i>
                                {{ $attendence->date }}
                            </p>
                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium 
                                 {{ $employee->latestAttendence?->status === 'Present'
                                     ? 'bg-green-100 text-green-700'
                                     : ($employee->latestAttendence?->status === 'Late'
                                         ? 'bg-yellow-100 text-yellow-700'
                                         : 'bg-red-100 text-red-700') }}">

                                <span
                                    class="h-2 w-2 rounded-full mr-2 
                                                {{ $employee->latestAttendence?->status === 'Present'
                                                    ? 'bg-green-700'
                                                    : ($employee->latestAttendence?->status === 'Late'
                                                        ? 'bg-yellow-700'
                                                        : 'bg-red-700') }}">
                                </span>

                                {{ $employee->latestAttendence?->status ?? 'No Record' }}
                            </span>
                        </div>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <p class="text-gray-300">Check In Time</p>
                                <p class="font-medium">{{ $attendence->checked_in }}</p>
                            </div>
                            <div class="flex justify-between">
                                <p class="text-gray-300">Check Out Time</p>
                                <p class="font-medium">{{ $attendence->checked_out }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="flex justify-center gap-2">
                @foreach ([1, 2, 3, '...', 8, 9, 10] as $page)
                    <button
                        class="w-10 h-10 flex items-center justify-center rounded-lg bg-zinc-800 
                        {{ $page === 1 ? 'bg-zinc-600' : '' }}">
                        {{ $page }}
                    </button>
                @endforeach
            </div>
        </div>

    </main>
</x-layout>
