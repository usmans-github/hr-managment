<x-layout>
    <div class="flex min-h-screen">

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-white mb-6">Attendance Management</h2>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i
                            class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-users text-3xl text-green-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Total Present</div>
                            <div class="text-2xl font-semibold text-green-400">{{ $presentemployees }}</div>
                        </div>
                    </div>
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i
                            class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-user-times text-3xl text-red-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Total Absent</div>
                            <div class="text-2xl font-semibold text-red-400">{{ $absentemployees }}</div>
                        </div>
                    </div>
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i
                            class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-clock text-3xl text-yellow-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Late Arrivals</div>
                            <div class="text-2xl font-semibold text-yellow-400">{{ $lateemployees }}</div>
                        </div>
                    </div>
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                            <i
                                class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-user-times text-3xl text-indigo-500"></i>
                            <div>
                                <div class="text-sm text-gray-300 mb-1 font-semibold">On Leave</div>
                                <div class="text-2xl font-semibold text-blue-400">5</div>
                            </div>
                        </div>
                </div>

                <!-- Attendance Table -->
                <div class="bg-zinc-900 rounded-xl overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-zinc-800">
                            <tr>
                                <th class="px-6 py-4 text-left">Employee</th>
                                <th class="px-6 py-4 text-left">Department</th>
                                <th class="px-6 py-4 text-left">Date</th>
                                <th class="px-6 py-4 text-left">Check In</th>
                                <th class="px-6 py-4 text-left">Check Out</th>
                                <th class="px-6 py-4 text-left">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            @foreach ($employees as $employee)
                                <tr class="hover:bg-zinc-800">

                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-full bg-black flex items-center justify-center mr-3">
                                                {{ $employee->first_name[0] . ' ' . $employee->last_name[0] }}
                                            </div>
                                            <div>
                                                <div class="font-medium">
                                                    {{ $employee->first_name . ' ' . $employee->last_name }}</div>
                                                <div class="text-sm text-gray-400">#{{ $employee->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">{{ $employee->department->department_name }}</td>
                                    <td class="px-6 py-4">
                                        {{ $employee->latestAttendence?->date ?? 'No Attendence record' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $employee->latestAttendence?->checked_in ?? 'Not checked in' }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $employee->latestAttendence?->checked_out ?? 'Not checked out' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold w-auto 
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
                                    </td>

                                </tr>
                            @endforeach
                            {{-- <tr class="hover:bg-zinc-800">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-8 h-8 rounded-full bg-black flex items-center justify-center mr-3">
                                                JS
                                            </div>
                                            <div>
                                                <div class="font-medium">Jane Smith</div>
                                                <div class="text-sm text-gray-400">#EMP002</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">Design</td>
                                    <td class="px-6 py-4">2024-01-26</td>
                                    <td class="px-6 py-4">09:30 AM</td>
                                    <td class="px-6 py-4">05:45 PM</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold w-auto">
                                            <span class="h-2 w-2 bg-yellow-700 rounded-full mr-2"></span>
                                            Leave
                                        </span>
                                    </td>

                                </tr>
                                <tr class="hover:bg-zinc-800">
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div
                                                class="w-8 h-8 rounded-full bg-black flex items-center justify-center mr-3">
                                                MJ
                                            </div>
                                            <div>
                                                <div class="font-medium">Mike Johnson</div>
                                                <div class="text-sm text-gray-400">#EMP003</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">Management</td>
                                    <td class="px-6 py-4">2024-01-26</td>
                                    <td class="px-6 py-4">--</td>
                                    <td class="px-6 py-4">--</td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold w-auto">
                                            <span class="h-2 w-2 bg-red-700 rounded-full mr-2"></span>
                                            Absent
                                        </span>
                                    </td>

                                </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-layout>
