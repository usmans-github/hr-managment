<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Human Resources Managment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white pb-20">



    <!-- Sidebar -->
    @if (auth()->check() && !request()->is('/', 'admin/create', '*/*/edit'))
        @if (auth()->user()->role === 'admin')
            {{-- Admin Sidebar --}}
            <aside class="w-64 absolute h-full">
                <a href="/">
                    <div class="mt-4 px-4 text-3xl font-extrabold">HR-Management</div>
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
                                class="{{ request()->routeIs('admin.employees') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-users"></i>
                                <span class="font-semibold">Employees</span>
                            </a>
                        </li>
                        <li>
                            <a href="/attendence"
                                class="{{ request()->is('attendence') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-calendar-check"></i>
                                <span class="font-semibold">Attendance</span>
                            </a>
                        </li>
                        <li>
                            <a href="/payroll"
                                class="{{ request()->is('payroll') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-wallet"></i>
                                <span class="font-semibold">Payroll</span>
                            </a>
                        </li>
                        <li>
                            <a href="/report"
                                class="{{ request()->is('report') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-chart-line"></i>
                                <span class="font-semibold">Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="/department"
                                class="{{ request()->is('department') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-building"></i>
                                <span class="font-semibold">Departments</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
        @else
            <!-- Employee Sidebar -->
            <aside class="w-64 absolute h-full">
                <a href="/employee">
                    <div class="mt-4 px-4 text-3xl font-extrabold">HR-Management</div>
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
                                class="{{ request()->routeIs('profile') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                                <i class="fas fa-user"></i>
                                <span class="font-semibold">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href='/leave-request'
                                class="{{ request()->routeIs('leave-request') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                                <i class="fas fa-calendar-check"></i>
                                <span class="font-semibold">Leave Requests</span>
                            </a>
                        </li>
                        <li>
                            <a href="/payroll"
                                class="{{ request()->routeIs('payroll') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                                <i class="fas fa-wallet"></i>
                                <span class="font-semibold">Payslips</span>
                            </a>
                        </li>
                        <li>
                            <a href="/reports"
                                class="{{ request()->routeIs('reports') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                                <i class="fas fa-chart-line"></i>
                                <span class="font-semibold">Performance</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </aside>
        @endif
    @endif



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
                    <i class="fa fa-xmark"></i>
                </button>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-zinc-800 border border-gray-700 rounded-lg shadow-sm"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-400 bg-zinc-700 rounded-lg">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('error') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-zinc-800 text-gray-300 hover:text-white rounded-lg
                        p-1.5 hover:bg-zinc-700 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                </button>
            </div>
        </div>
    @endif

    <main>{{ $slot }}</main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>

</html>
