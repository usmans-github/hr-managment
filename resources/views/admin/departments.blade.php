<x-layout>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 absolute h-full">

            <nav class="mt-8">
                <ul class="space-y-4 px-4">
                    <li>
                        <a href="/dashboard" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg shadow-md">
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
                        <a href="/departments"
                            class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-building"></i>
                            <span class="font-semibold">Departments</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Employee Table -->
            <div class="bg-zinc-900 rounded-xl shadow-sm p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Departments</h2>
                    <div class="flex justify-center items-center gap-4">
                        <button class="border border-zinc-700 hover:bg-zinc-700 rounded-lg px-4 text-sm py-2 flex items-center gap-2 transition">
                            <i class="fas fa-plus"></i>
                            <a href="/create-position"> Add Position</a>
                        </button>
                        <button class="border border-zinc-700 hover:bg-zinc-700 rounded-lg px-4 text-sm py-2 flex items-center gap-2 transition">
                            <i class="fas fa-plus"></i>
                            <a href="/create-department"> Add Department</a>
                        </button>
                    </div>
                </div>
                <table class="w-full">
                    <thead>
                        <tr class="text-left bg-zinc-800 text-gray-300">
                            <th class="font-semibold py-4 px-4">Dept. Name</th>
                            <th class="font-semibold py-4 px-4">Dept. Positions</th>
                            <th class="font-semibold py-4 px-4">Dept. Employees</th>
                            <th class="font-semibold py-4 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($departments as $department)
                            <tr class="border-b border-gray-700">
                                <td class="py-4 px-4 text-gray-300">{{ $department->department_name }}</td>
                                <td class="py-4 px-4 text-gray-300">
                                    @foreach ($department->positions as $position)
                                        <div>{{ $position->position_name }}</div>
                                    @endforeach
                                </td>
                                <td class="py-4 px-4 text-gray-300">{{ $department->employees->count() ?? 'N/A' }} employees</td>
                                <td class="text-left py-4 px-2 flex gap-2">
                                    <a href="{{ route('edit-department', $department->id) }}">
                                        <i class="fas fa-edit cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                                    </a>
                                    <form method="POST" action="{{ route('delete-department', $department->id) }}"
                                          onsubmit="return confirm('Are you sure you want to delete this department?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i class="fas fa-trash cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700 p-2"></i>
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
