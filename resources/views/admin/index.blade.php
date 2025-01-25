<x-layout>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 absolute h-full">

            <nav class="mt-8">
                <ul class="space-y-4 px-4">
                    <li>
                        <a href="/admin" class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-lg shadow-md">
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
                        <a href="/attendance"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
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
            <!-- Welcome Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                <p class="text-gray-300 text-sm font-semibold">Manage your HR operations effortlessly.</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="bg-zinc-900 rounded-xl p-6 flex items-center gap-4">
                    <div class="w-14 h-14 bg-black rounded-xl flex items-center justify-center">
                        <i class="fas fa-users text-3xl text-indigo-500"></i>
                    </div>
                    <div>
                        <h3 class="text-sm text-gray-300 mb-1 font-semibold">Total Employees</h3>
                        <p class="text-2xl font-bold">{{ $totalemployees }}</p>
                    </div>
                </div>
                <div class="bg-zinc-900 rounded-xl p-6 flex items-center gap-4">
                    <div class="w-14 h-14 bg-black rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-check text-3xl text-green-500"></i>
                    </div>
                    <div>
                        <h3 class="text-sm text-gray-300 mb-1 font-semibold">Present Today</h3>
                        <p class="text-2xl font-bold">130</p>
                    </div>
                </div>
                <div class="bg-zinc-900 rounded-xl p-6 flex items-center gap-4">
                    <div class="w-14 h-14 bg-black rounded-xl flex items-center justify-center">
                        <i class="fas fa-user-times text-3xl text-red-500"></i>
                    </div>
                    <div>
                        <h3 class="text-sm text-gray-300 mb-1 font-semibold">On Leave</h3>
                        <p class="text-2xl font-bold">15</p>
                    </div>
                </div>
            </div>

            <!-- Employee Table -->
            <div class="bg-zinc-900 rounded-xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Recent Employees</h2>
                    <button
                        class="border border-zinc-700 hover:bg-zinc-700 rounded-lg px-4 text-sm
                        py-2 flex items-center gap-2 transition">
                        <a href="{{ route('employee.create') }}">
                            <i class="fas fa-plus"></i>
                            <span>Add Employee</span>
                        </a>
                    </button>
                </div>
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-left bg-zinc-800 text-gray-300">
                            <th class="font-semibold py-4 px-4">Name</th>
                            <th class="font-semibold py-4 px-4">Position</th>
                            <th class="font-semibold py-4 px-4">Department</th>
                            <th class="font-semibold py-4 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr class="text-left border-b transition-all">
                                <td class="py-4 px-4 text-gray-300">{{ $employee->name ?? 'N/A' }}</td>
                                <td class="py-4 px-4 text-gray-300">{{ $employee->position->position_name ?? 'N/A' }}
                                </td>
                                <td class="py-4 px-4 text-gray-300">
                                    {{ $employee->department->department_name ?? 'N/A' }}</td>
                           
                            <td class="text-left py-4 px-4">
                                <span
                                    class="bg-black text-green-500 px-3 py-1 rounded-md
                                 text-sm">Present</span>
                            </td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-layout>
