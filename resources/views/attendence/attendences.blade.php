    <x-layout>
        <div class="flex min-h-screen">
            <!-- Sidebar -->
            <aside class="w-64 absolute h-full">
                <a href="/">
                    <div class="mt-4 px-4 text-3xl font-extrabold">HR-Managment</div>
                </a>
                <nav class="mt-8">
                    <ul class="space-y-4 px-4">
                        <li>
                            <a href="/admin"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg shadow-md">
                                <i class="fas fa-tachometer-alt"></i>
                                <span class="font-semibold">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/employees"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-users"></i>
                                <span class="font-semibold">Employees</span>
                            </a>
                        </li>
                        <li>
                            <a href="/attendence"
                                class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-calendar-check"></i>
                                <span class="font-semibold">Attendance</span>
                            </a>
                        </li>
                        <li>
                            <a href="/payroll"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-wallet"></i>
                                <span class="font-semibold">Payroll</span>
                            </a>
                        </li>
                        <li>
                            <a href="/reports"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-chart-line"></i>
                                <span class="font-semibold">Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="/department"
                                class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-building"></i>
                                <span class="font-semibold">Departments</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <!-- Main Content -->
            <main class="flex-1 ml-64 p-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-white mb-6">Attendance Management</h2>

                    <!-- Filters -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div>
                            <label class="block text-sm font-medium mb-1">Date Range</label>
                            <select class="w-full px-3 py-2 bg-zinc-900 rounded-xl border border-gray-700">
                                <option>Today</option>
                                <option>Last 7 Days</option>
                                <option>This Month</option>
                                <option>Custom Range</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Department</label>
                            <select class="w-full px-3 py-2 bg-zinc-900 rounded-xl border border-gray-700">
                                <option>All Departments</option>
                                <option>Development</option>
                                <option>Design</option>
                                <option>Management</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Status</label>
                            <select class="w-full px-3 py-2 bg-zinc-900 rounded-xl border border-gray-700">
                                <option>All Status</option>
                                <option>Present</option>
                                <option>Absent</option>
                                <option>Late</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium mb-1">Search Employee</label>
                            <input type="text" placeholder="Search by name or ID"
                                class="w-full px-3 py-2 bg-zinc-900 rounded-xl border border-gray-700">
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                        <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                            <i
                                class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-users text-3xl text-green-500"></i>
                            <div>
                                <div class="text-sm text-gray-300 mb-1 font-semibold">Total Present</div>
                                <div class="text-2xl font-semibold text-green-400">130</div>
                            </div>
                        </div>
                        <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                            <i
                                class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-user-times text-3xl text-red-500"></i>
                            <div>
                                <div class="text-sm text-gray-300 mb-1 font-semibold">Total Absent</div>
                                <div class="text-2xl font-semibold text-red-400">15</div>
                            </div>
                        </div>
                        <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                            <i
                                class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-clock text-3xl text-yellow-500"></i>
                            <div>
                                <div class="text-sm text-gray-300 mb-1 font-semibold">Late Arrivals</div>
                                <div class="text-2xl font-semibold text-yellow-400">8</div>
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
                                                    class="w-8 h-8 rounded-full bg-black flex items-center justify-center mr-3">
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
                                        <td class="px-6 py-4">{{ $employee->latestAttendence->date }}</td>
                                        <td class="px-6 py-4">{{ $employee->latestAttendence->checked_in }}</td>
                                        <td class="px-6 py-4">{{ $employee->latestAttendence->checked_out }}</td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold w-auto 
                                                 {{ $employee->latestAttendence->status === 'Present'
                                                     ? 'bg-green-100 text-green-700'
                                                     : ($employee->latestAttendence->status === 'Late'
                                                         ? 'bg-yellow-100 text-yellow-700'
                                                         : 'bg-red-100 text-red-700') }}">

                                                <span class="h-2 w-2 rounded-full mr-2 
                                                {{ $employee->latestAttendence->status === 'Present'
                                                    ? 'bg-green-700'
                                                    : ($employee->latestAttendence->status === 'Late'
                                                        ? 'bg-yellow-700'
                                                        : 'bg-red-700') }}">
                                                </span>

                                                {{ $employee->latestAttendence->status }}
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

                        <!-- Pagination -->
                        <div class="bg-zinc-900 px-6 py-4 flex items-center justify-between">
                            <div class="text-sm text-gray-400">
                                Showing 1 to 3 of 145 entries
                            </div>
                            <div class="flex space-x-2">
                                <button
                                    class="px-3 py-1 rounded border border-gray-700 text-gray-400 hover:text-white">Previous</button>
                                <button class="px-3 py-1 rounded bg-blue-600 text-white">1</button>
                                <button
                                    class="px-3 py-1 rounded border border-gray-700 text-gray-400 hover:text-white">2</button>
                                <button
                                    class="px-3 py-1 rounded border border-gray-700 text-gray-400 hover:text-white">3</button>
                                <button
                                    class="px-3 py-1 rounded border border-gray-700 text-gray-400 hover:text-white">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </x-layout>
