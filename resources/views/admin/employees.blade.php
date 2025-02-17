<x-layout>

    @if (session('success'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-zinc-800 border border-gray-700 rounded-xl shadow-sm"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-400 bg-zinc-700 rounded-xl">
                    <i class="fa fa-check"></i>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-zinc-800 text-gray-300 hover:text-white rounded-xl
                    p-1.5 hover:bg-zinc-700 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                </button>
            </div>
        </div>
    @endif

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
                            class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="font-semibold">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/employees" class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-xl shadow-md">
                            <i class="fas fa-users"></i>
                            <span class="font-semibold">Employees</span>
                        </a>
                    </li>
                    <li>
                        <a href="/attendence"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                            <i class="fas fa-calendar-check"></i>
                            <span class="font-semibold">Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="/payroll"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                            <i class="fas fa-wallet"></i>
                            <span class="font-semibold">Payroll</span>
                        </a>
                    </li>
                    <li>
                        <a href="/reports"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                            <i class="fas fa-chart-line"></i>
                            <span class="font-semibold">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="/department"
                            class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
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
                    <h1 class="text-3xl font-bold text-white">Directory</h1>
                    <p class="text-gray-300 text-sm font-semibold">View and manage all employees</p>
                </div>
                <a href="{{ route('employee.create') }}"
                    class="bg-zinc-900 hover:bg-zinc-800 rounded-xl border border-gray-700 text-sm
                     font-medium px-3 py-2 flex items-center gap-2 transition-all">
                    Add Employee
                    <i class="fa fa-user-plus"></i>
                </a>
            </div>

          <!-- Employee Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-14">
    @foreach ($employees as $employee)
        <div class="bg-zinc-900 rounded-xl p-6 border border-gray-800 hover:border-gray-700 transition-all">
            <div class="flex items-start justify-between mb-2">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-white text-black text-xl font-semibold flex items-center justify-center">
                        {{ substr($employee->first_name, 0, 1) }}{{ substr($employee->last_name, 0, 1) }}
                    </div>
                    <div>
                        <div class="flex items-center gap-2">
                            <h3 class="text-lg font-semibold text-white">
                                {{ $employee->first_name }} {{ $employee->last_name }}
                            </h3>
                            <span class="px-2 py-1 rounded-full text-xs {{ $employee->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-700' }}">
                                {{ ucfirst($employee->status ?? 'active') }}
                            </span>
                        </div>
                        <p class="text-gray-400">{{ $employee->position->position_name ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <div class="space-y-3">
                <div class="flex items-center gap-2 text-gray-300">
                    <i class="fas fa-envelope w-5"></i>
                    <span class="text-sm">{{ $employee->email ?? 'N/A' }}</span>
                </div>
                <div class="flex items-center gap-2 text-gray-300">
                    <i class="fa-regular fa-building"></i>
                    <span class="text-sm">{{ $employee->department->department_name ?? 'N/A' }}</span>
                </div>
                <div class="flex items-center gap-2 text-gray-300">
                    <i class="fa-regular fa-calendar-check"></i>
                    <span class="text-sm">{{ $employee->join_date ? date('M d, Y', strtotime($employee->join_date)) : 'N/A' }}</span>
                </div>
                
                <div class="flex items-center gap-2 text-gray-300">
                    <i class="fas fa-phone w-5"></i>
                    <span class="text-sm">{{ $employee->phone ?? 'N/A' }}</span>
                </div>
                <!-- Address Section -->
                <div class="flex items-center gap-2 text-gray-300">
                    <i class="fas fa-map-marker-alt w-5"></i>
                    <span class="text-sm">{{ $employee->address ?? 'N/A' }}</span>
                </div>
            </div>

            <div class="flex justify-end gap-2">
                <a href="{{ route('employee.edit', $employee->id) }}">
                    <i class="fas fa-edit cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                </a>
                <form method="POST" action="{{ route('employee.destroy', $employee->id) }}" onsubmit="return confirm('Are you sure you want to delete this employee?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">
                        <i class="fas fa-trash cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>

        </main>
    </div>
</x-layout>
