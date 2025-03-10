<x-layout>
    <main class="flex-1 md:ml-64 p-4 md:p-8">

        <!-- Header -->
        <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center">
            <div>
                <h1 class="text-2xl md:text-3xl font-bold text-white">Employee Details</h1>
            </div>

            <div class="flex mt-4 md:mt-0 justify-center items-center gap-2">
                <button type="submit">
                    <i
                        class="fa-solid fa-arrow-down cursor-pointer rounded-md text-zinc-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                </button>

                <a href="{{ route('employee.edit', $employee->id) }}">
                    <button>
                        <i
                            class="fas fa-edit cursor-pointer rounded-md text-zinc-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                    </button>
                </a>

                <form method="POST" action="{{ route('employee.destroy', $employee->id) }}"
                    onsubmit="return confirm('Are you sure you want to delete this employee?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i
                            class="fa-regular fa-trash-can cursor-pointer rounded-md text-zinc-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                    </button>
                </form>
            </div>
        </div>

        <!-- Employee Details Card -->
        <div class="bg-zinc-900 rounded-2xl p-6 mb-8">

            <!-- Employee Info -->
            <div class="flex flex-col md:flex-row items-start gap-6 mb-8">

                <div class="w-20 h-20 rounded-full bg-black text-2xl font-semibold flex items-center justify-center">
                    {{ $employee->first_name[0] . ' ' . $employee->last_name[0] }}
                </div>

                <div class="space-y-2 flex-1">
                    <h2 class="text-2xl md:text-4xl font-bold mb-8">
                        {{ $employee->first_name . ' ' . $employee->last_name }}
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
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
                        <div class="flex flex-col gap-2">
                            <span class="text-gray-300">Email</span>
                            <span class="text-base font-medium">{{ $employee->email }}</span>
                        </div>
                        <div class="flex flex-col gap-2">
                            <span class="text-gray-300 break-words overflow-hidden">Address</span>
                            <span class="text-base font-medium">{{ $employee->address }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Metrics Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4">

                <!-- Total Presents -->
                <div class="bg-zinc-800 rounded-xl p-4">
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-4 flex justify-center items-center bg-zinc-700 rounded-full">
                            <i class="fa-solid fa-user-check"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-semibold">{{ $presents }}</p>
                            <p class="text-gray-300">Total Presents</p>
                        </div>
                    </div>
                </div>

                <!-- Total Absents -->
                <div class="bg-zinc-800 rounded-xl p-4">
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-4 flex justify-center items-center bg-zinc-700 rounded-full">
                            <i class="fa-solid fa-user-minus"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-semibold">{{ $absents }}</p>
                            <p class="text-gray-300">Total Absents</p>
                        </div>
                    </div>
                </div>

                <!-- Total Late arrivals -->
                <div class="bg-zinc-800 rounded-xl p-4">
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-4 flex justify-center items-center bg-zinc-700 rounded-full">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-semibold">{{ $lates }}</p>
                            <p class="text-gray-300">Total Late Arrivals</p>
                        </div>
                    </div>
                </div>

                <!-- Total Leaves -->
                <div class="bg-zinc-800 rounded-xl p-4">
                    <div class="flex items-center gap-4">
                        <div class="px-4 py-4 flex justify-center items-center bg-zinc-700 rounded-full">
                            <i class="fa-solid fa-clock"></i>
                        </div>
                        <div>
                            <p class="text-2xl font-semibold">{{ $lates }}</p>
                            <p class="text-gray-300">Total Leaves</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Attendance History -->
        <div class="bg-zinc-900 rounded-2xl p-6">

            <!-- Attendance Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
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
                        <div class="pt-4 flex justify-between items-center">
                            <div class="flex flex-col">
                                <p class="text-gray-300">Check In Time</p>
                                <p class="font-medium">{{ $attendence->checked_in ?? 'N/A' }}</p>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-gray-300">Check Out Time</p>
                                <p class="font-medium">{{ $attendence->checked_out ?? 'N/A' }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $attendences->links('pagination::tailwind') }}
            </div>
        </div>

    </main>
</x-layout>
