<x-layout>
    @if (session('success'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-zinc-800 border border-gray-700 rounded-lg shadow-sm"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-400 bg-zinc-700 rounded-lg">
                    <i class="fa fa-check"></i>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-zinc-800 text-gray-300 hover:text-white rounded-lg
                 p-1.5 hover:bg-zinc-700 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
            <div id="toast-error"
                class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-red-800 border border-red-700 rounded-lg shadow-sm"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-400 bg-red-700 rounded-lg">
                    <i class="fa fa-xmark"></i>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('error') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-800 text-gray-300 hover:text-white rounded-lg
             p-1.5 hover:bg-red-700 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-error" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        </div>
    @endif

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 absolute h-full">
           <a href="/"> <div class="mt-4 px-4 text-3xl font-extrabold">HR-Managment</div> </a>
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
                        <a href="employees"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-users"></i>
                            <span class="font-semibold">Employees</span>
                        </a>
                    </li>
                    <li>
                        <a href="/attendence"
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
            <div class=" rounded-xl shadow-sm mb-6">
                <div class="flex justify-between items-center ">
                    <h2 class="text-2xl font-bold">Departments</h2>
                    <div class="flex justify-center items-center gap-4">
                        <button
                            class="border border-zinc-700 hover:bg-zinc-700 rounded-lg p-2 text-sm flex items-center gap-2 transition-all">
                            <a href="/position/create"> Add Position</a>
                            <i class="fas fa-circle-plus"></i>
                        </button>
                        <button
                            class="border border-zinc-700 hover:bg-zinc-700 rounded-lg p-2 text-sm flex items-center gap-2 transition">
                            <a href="/department/create"> Add Department</a>
                            <i class="fas fa-square-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-zinc-900 rounded-xl overflow-hidden">
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
                            <tr class="divide-y divide-gray-800 hover:bg-zinc-800">
                                <td class="py-4 px-4 text-gray-300">{{ $department->department_name }}</td>
                                <td class="py-4 px-4 text-gray-300">
                                    @foreach ($department->positions as $position)
                                        <div>{{ $position->position_name }}</div>
                                    @endforeach
                                </td>
                                <td class="py-4 px-4 text-gray-300">{{ $department->employees->count() ?? 'N/A' }}
                                    employees</td>
                                <td class="text-left py-4 px-2 flex gap-2">
                                    <a href="{{ route('department.edit', $department->id) }}">
                                        <i
                                            class="fas fa-edit cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                                    </a>
                                    <form method="POST" action="{{ route('department.destroy', $department->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this department?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">
                                            <i
                                                class="fas fa-trash cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700 p-2"></i>
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
