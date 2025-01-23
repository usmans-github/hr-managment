<x-layout>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 absolute h-full">
            <nav class="mt-8">
                <ul class="space-y-4 px-4">
                    <li>
                        <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="font-semibold">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/employees" class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-lg shadow-md">
                            <i class="fas fa-users"></i>
                            <span class="font-semibold">Employees</span>
                        </a>
                    </li>
                    <li>
                        <a href="/attendance" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-calendar-check"></i>
                            <span class="font-semibold">Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="/payroll" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-wallet"></i>
                            <span class="font-semibold">Payroll</span>
                        </a>
                    </li>
                    <li>
                        <a href="/reports" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-chart-line"></i>
                            <span class="font-semibold">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="/departments" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-building"></i>
                            <span class="font-semibold">Departments</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-white">Employees</h1>
                <p class="text-gray-300 text-sm font-semibold">Manage your employees efficiently.</p>
            </div>

            <!-- Employee Table -->
            <div class="bg-zinc-900 rounded-xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">All Employees</h2>
                    <a href="{{ route('employees.store') }}" class="border border-zinc-700 hover:bg-zinc-700 rounded-lg px-4 py-2 text-sm flex items-center gap-2 transition">
                        <i class="fas fa-plus"></i>
                        <span>Add Employee</span>
                    </a>
                </div>
                <table class="w-full table-auto">
                    <thead>
                        <tr class="text-left bg-zinc-800 text-gray-300">
                            <th class="font-semibold py-4 px-4">Name</th>
                            <th class="font-semibold py-4 px-4">Position</th>
                            <th class="font-semibold py-4 px-4">Department</th>
                            <th class="font-semibold py-4 px-4">Salary</th>
                            <th class="font-semibold py-4 px-4">Phone</th>
                            <th class="font-semibold py-4 px-4">Status</th>
                            <th class="font-semibold py-4 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                            <tr class="text-left border-b transition-all">
                                <td class="py-4 px-4 text-gray-300">{{ $employee->name ?? 'N/A' }}</td>
                                <td class="py-4 px-4 text-gray-300">{{ $employee->position->position_name ?? 'N/A' }}</td>
                                <td class="py-4 px-4 text-gray-300">{{ $employee->department->department_name ?? 'N/A' }}</td>
                                <td class="py-4 px-4 text-gray-300">{{ $employee->salary ?? 'N/A' }}</td>
                                <td class="py-4 px-4 text-gray-300">{{ $employee->phone ?? 'N/A' }}</td>
                                <td class="py-4 px-4">
                                    <span class="bg-black text-green-500 px-3 py-1 rounded-md text-sm">Present</span>
                                </td>
                                <td class="py-4 px-4 flex gap-2">
                                    <a href="{{ route('employees.edit', $employee->id) }}">
                                        <i class="fas fa-edit cursor-pointer rounded-md text-gray-300 hover:text-white
                                    hover:bg-zinc-700 p-2"></i>
                                    </a>
                                    <form method="POST" action="{{ route('employees.destroy', $employee->id) }}" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fas fa-trash cursor-pointer rounded-md text-gray-300 hover:text-white
                                 hover:bg-zinc-700 p-2"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</x-layout>
