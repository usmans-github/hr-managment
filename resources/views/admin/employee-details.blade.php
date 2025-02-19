<x-layout>
<div class="min-h-screen bg-gray-900 text-white p-6">
    <!-- Employee Details Section -->
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg p-6 shadow-lg">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">Detail Employee</h2>
            <div class="flex items-center gap-4">
                <button class="bg-gray-700 px-4 py-2 rounded-lg">This Year ▼</button>
                <button class="bg-green-500 px-4 py-2 rounded-lg">⬇ Download Info</button>
            </div>
        </div>
        <div class="mt-4 flex items-center gap-4">
            <img src="https://via.placeholder.com/80" alt="Profile" class="w-20 h-20 rounded-full">
            <div>
                <h3 class="text-xl font-semibold">Natashia Khaleira</h3>
                <p class="text-gray-400">Role: Head of UX Design</p>
                <p class="text-gray-400">Phone: (+62) 812 3456-7890</p>
                <p class="text-gray-400">Email: natashiakhaleira@gmail.com</p>
            </div>
        </div>
        <div class="grid grid-cols-5 gap-4 mt-6">
            <div class="bg-gray-700 p-4 rounded-lg text-center">
                <p class="text-2xl font-bold">309</p>
                <p class="text-gray-400 text-sm">Total Attendance</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg text-center">
                <p class="text-2xl font-bold">08:46</p>
                <p class="text-gray-400 text-sm">Avg Check In Time</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg text-center">
                <p class="text-2xl font-bold">17:04</p>
                <p class="text-gray-400 text-sm">Avg Check Out Time</p>
            </div>
            <div class="bg-gray-700 p-4 rounded-lg text-center col-span-2">
                <p class="text-lg font-semibold">Role Model</p>
                <p class="text-gray-400 text-sm">Employee Predicate</p>
            </div>
        </div>
    </div>

    <!-- Attendance History Section -->
    <div class="max-w-4xl mx-auto bg-gray-800 rounded-lg p-6 shadow-lg mt-6">
        <div class="flex justify-between items-center">
            <h2 class="text-lg font-semibold">Attendance History</h2>
            <div class="flex items-center gap-4">
                <button class="bg-gray-700 px-4 py-2 rounded-lg">🔲</button>
                <button class="bg-gray-700 px-4 py-2 rounded-lg">↑ Sort</button>
                <button class="bg-gray-700 px-4 py-2 rounded-lg">⚙ Filter</button>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-4 mt-6">
            @php
                $attendances = [
                    ['date' => 'March 08, 2023', 'check_in' => '08:53', 'check_out' => '17:15', 'status' => 'On Time'],
                    ['date' => 'March 07, 2023', 'check_in' => '08:27', 'check_out' => '17:09', 'status' => 'Late'],
                    ['date' => 'March 06, 2023', 'check_in' => '-', 'check_out' => '-', 'status' => 'Absent'],
                    ['date' => 'March 05, 2023', 'check_in' => '08:55', 'check_out' => '17:10', 'status' => 'On Time'],
                    ['date' => 'March 04, 2023', 'check_in' => '08:58', 'check_out' => '17:06', 'status' => 'On Time'],
                    ['date' => 'March 03, 2023', 'check_in' => '08:40', 'check_out' => '17:02', 'status' => 'Late'],
                ];
            @endphp
            @foreach ($attendances as $attendance)
                <div class="bg-gray-700 p-4 rounded-lg text-center">
                    <p class="text-sm text-gray-400">{{ $attendance['date'] }}</p>
                    <p class="mt-2"><span class="font-semibold">Check In:</span> {{ $attendance['check_in'] }}</p>
                    <p><span class="font-semibold">Check Out:</span> {{ $attendance['check_out'] }}</p>
                    <span class="mt-2 px-3 py-1 inline-block rounded-lg text-sm font-semibold
                        {{ $attendance['status'] == 'On Time' ? 'bg-green-500' : ($attendance['status'] == 'Late' ? 'bg-yellow-500' : 'bg-red-500') }}">
                        {{ $attendance['status'] }}
                    </span>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="flex justify-center items-center mt-6">
            <button class="px-3 py-2 bg-gray-700 mx-1 rounded-lg">1</button>
            <button class="px-3 py-2 bg-gray-700 mx-1 rounded-lg">2</button>
            <button class="px-3 py-2 bg-gray-700 mx-1 rounded-lg">3</button>
            <button class="px-3 py-2 bg-gray-700 mx-1 rounded-lg">...</button>
            <button class="px-3 py-2 bg-gray-700 mx-1 rounded-lg">10</button>
        </div>
    </div>
</div>
</x-layout>