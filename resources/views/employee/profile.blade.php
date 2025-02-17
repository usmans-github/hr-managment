<x-layout>

    @if (session('success'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-zinc-800
                 border border-gray-700 rounded-xl shadow-sm"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-400
                 bg-zinc-700 rounded-xl">
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

    <!-- Sidebar -->
    <aside class="w-64 absolute h-full">
        <a href="/employee">
            <div class="mt-4 px-4 text-3xl font-extrabold">HR-Managment</div>
        </a>
        <nav class="mt-8">
            <ul class="space-y-4 px-4">
                <li>
                    <a href="/employee" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="font-semibold">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/profile"
                        class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-xl transition">
                        <i class="fas fa-user"></i>
                        <span class="font-semibold">My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="/attendence"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                        <i class="fas fa-calendar-check"></i>
                        <span class="font-semibold">Leave Requests</span>
                    </a>
                </li>
                <li>
                    <a href="/payroll"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                        <i class="fas fa-wallet"></i>
                        <span class="font-semibold">Payslips</span>
                    </a>
                </li>
                <li>
                    <a href="/reports"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                        <i class="fas fa-chart-line"></i>
                        <span class="font-semibold">Performance</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8 min-h-screen">
        <!-- Profile Header -->
        <div class="mb-6">
            <h1 class="text-sm font-medium text-gray-300">Welcome Back,</h1>
            <h1 class="text-4xl font-bold">{{ $employee->first_name . ' ' . $employee->last_name }}</h1>
        </div>

        <!-- Profile Info Section -->
        <div class="max-w-7xl mx-auto bg-zinc-900 rounded-xl p-6 shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Profile Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-gray-300">Full Name:</p>
                    <p class="text-lg font-semibold">{{ $employee->first_name . ' ' . $employee->last_name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Email:</p>
                    <p class="text-lg font-semibold">{{ $employee->email }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Position:</p>
                    <p class="text-lg font-semibold">{{ $employee->position->position_name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Department:</p>
                    <p class="text-lg font-semibold">{{ $employee->department->department_name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Date of Joining:</p>
                    <p class="text-lg font-semibold">{{ $employee->join_date }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Salary</p>
                    <p class="text-lg font-semibold">{{ $employee->salary }}</p>
                </div>
            </div>
        </div>

        <!-- Edit Profile Section -->
        <div class="bg-zinc-900 rounded-xl p-6 mt-6">
            <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>
            <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="text-sm font-medium text-gray-300">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}"
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500" required />
                    </div>
                    <div>
                        <label for="last_name" class="text-sm font-medium text-gray-300">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}"
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500" required />
                    </div>
                   
                    <div>
                        <label for="position" class="text-sm font-medium text-gray-300">Address</label>
                        <input type="text" name="address" id="address" value="{{ $employee->address }}"
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500" required />
                    </div>
                    <div>
                        <label for="Phone" class="text-sm font-medium text-gray-300">Phone No</label>
                        <input type="text" name="phone" id="phone" value="{{ $employee->phone }}"
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500" required />
                    </div>
                </div>

                    <button type="submit"
                    class="w-1/4 mt-6  rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3 text-sm font-medium text-white">Save
                    Changes</button>
            </form>
        </div>

    </main>

</x-layout>
