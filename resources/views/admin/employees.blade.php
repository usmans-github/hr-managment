<x-layout>

    @if (session('success'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-zinc-800 border border-gray-700 rounded-lg shadow-sm"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-400 bg-zinc-700 rounded-lg">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
                    </svg>
                    <span class="sr-only">Check icon</span>
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

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 absolute h-full">
           <a href="/"> <div class="mt-4 px-4 text-3xl font-extrabold">HR-Managment</div> </a>
            <nav class="mt-8">
                <ul class="space-y-4 px-4">
                    <li>
                        <a href="/admin"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
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
            <!-- Header -->
            <div class="mb-8 flex justify-between items-center">
                <div>

                    <h1 class="text-3xl font-bold text-white">Employees</h1>
                    <p class="text-gray-300 text-sm font-semibold">Manage your employees efficiently.</p>
                </div>
                <a href="{{ route('employee.create') }}"
                    class="bg-zinc-900 hover:bg-zinc-800  rounded-xl border border-gray-700 text-sm font-medium px-3 py-2   flex items-center gap-2 transition-all">
                    Add Employee
                    <i class="fa fa-user-plus"></i>
                </a>
            </div>

            <!-- Employee Table -->
            <div class="bg-zinc-900 rounded-xl p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">All Employees</h2>

                </div>
                <div class="bg-zinc-900 rounded-xl overflow-hidden">
                    <table class="w-full  rounded-xl ">
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
                        <tbody class="divide-y divide-gray-800">
                            @foreach ($employees as $employee)
                                <tr class="text-left transition-all hover:bg-zinc-800">
                                    <td class="py-4 px-4 text-gray-300">{{ $employee->first_name ?? 'N/A' }}
                                        {{ $employee->last_name ?? 'N/A' }}</td>
                                    <td class="py-4 px-4 text-gray-300">
                                        {{ $employee->position->position_name ?? 'N/A' }}
                                    </td>
                                    <td class="py-4 px-4 text-gray-300">
                                        {{ $employee->department->department_name ?? 'N/A' }}</td>
                                    <td class="py-4 px-4 text-gray-300">{{ $employee->salary ?? 'N/A' }}</td>
                                    <td class="py-4 px-4 text-gray-300">{{ $employee->phone ?? 'N/A' }}</td>
                                    <td class=" py-4 px-4">
                                        <span
                                            class="inline-flex items-center bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold w-auto">
                                            <span class="h-2 w-2 bg-green-700 rounded-full mr-2"></span>
                                            Present
                                        </span>
                                    </td>
                                    <td class="py-4 px-4 flex gap-2">
                                        <a href="{{ route('employee.edit', $employee->id) }}">
                                            <i
                                                class="fas fa-edit cursor-pointer rounded-md text-gray-300 hover:text-white
                                    hover:bg-zinc-700 p-2"></i>
                                        </a>
                                        <form method="POST" action="{{ route('employee.destroy', $employee->id) }}"
                                            onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i
                                                    class="fas fa-trash cursor-pointer rounded-md text-gray-300 hover:text-white
                                    hover:bg-zinc-700 p-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-layout>
