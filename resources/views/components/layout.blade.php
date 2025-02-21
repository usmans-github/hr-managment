<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('site.webmanifest') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Human Resources Managment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white pb-20">


    <!-- Sidebar -->
    @if (auth()->check() &&
            !request()->is('/', 'admin/create', '*/*/edit') &&
            !request()->routeIs('position.create', 'department.create'))
        @if (auth()->user()->role === 'admin')
            {{-- Admin Sidebar --}}
            <aside class="w-64 absolute h-full">
                <a href="/">
                    <div class="mt-4 px-4 text-3xl font-extrabold">HR-Management</div>
                </a>
                <nav class="mt-8">
                    <ul class="space-y-4 px-4">
                        <li>
                            <a href="/admin" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg ">
                                <i class="fa-solid fa-border-all"></i>
                                <span class="text-sm font-medium text-zinc-300">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/employees"
                                class="{{ request()->routeIs('admin.employees') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }}
                                 flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-users"></i>
                                <span class="text-sm font-medium text-zinc-300">Employees</span>
                            </a>
                        </li>
                        <li>
                            <a href="/attendence"
                                class="{{ request()->is('attendence') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fa-regular fa-calendar-days"></i>
                                <span class="text-sm font-medium text-zinc-300">Attendance</span>
                            </a>
                        </li>
                        <li>
                            <a href="/payroll"
                                class="{{ request()->is('payroll') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex
                                 items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-wallet"></i>
                                <span class="text-sm font-medium text-zinc-300">Payroll</span>
                            </a>
                        </li>
                        <li>
                            <a href="/report"
                                class="{{ request()->is('report') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex
                                 items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fas fa-chart-line"></i>
                                <span class="text-sm font-medium text-zinc-300">Reports</span>
                            </a>
                        </li>
                        <li>
                            <a href="/department"
                                class="{{ request()->is('department') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex
                                 items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                                <i class="fa-regular fa-building"></i>
                                <span class="text-sm font-medium text-zinc-300">Departments</span>
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
                                <i class="fa-solid fa-border-all"></i>
                                <span class="text-sm font-medium text-zinc-300">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/profile"
                                class="{{ request()->routeIs('profile') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                                <i class="fa-regular fa-user"></i>
                                <span class="text-sm font-medium text-zinc-300">My Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href='/leave-request'
                                class="{{ request()->routeIs('leave-request') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                                <i class="fa-solid fa-hourglass-start"></i>
                                <span class="text-sm font-medium text-zinc-300">Leave Requests</span>
                            </a>
                        </li>
                        <li>
                            <a href="/payslip"
                                class="{{ request()->routeIs('payslip') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                                <i class="fas fa-wallet"></i>
                                <span class="text-sm font-medium text-zinc-300">Payslips</span>
                            </a>
                        </li>
                        <li>
                            <a href="/reports"
                                class="{{ request()->routeIs('reports') ? 'bg-zinc-900' : 'hover:bg-zinc-900' }} flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                                <i class="fas fa-chart-line"></i>
                                <span class="text-sm font-medium text-zinc-300">Performance</span>
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
                class="flex items-center w-full max-w-xs p-4 text-zinc-300 bg-zinc-800 border border-zinc-700 rounded-lg "
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-400 bg-zinc-700 rounded-lg">
                    <i class="fa fa-check"></i>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-zinc-800 text-zinc-300 hover:text-white rounded-lg
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
                class="flex items-center w-full max-w-xs p-4 text-zinc-300 bg-zinc-800 border border-zinc-700 rounded-lg "
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-400 bg-zinc-700 rounded-lg">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('error') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-zinc-800 text-zinc-300 hover:text-white rounded-lg
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
