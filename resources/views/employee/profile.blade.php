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
                    <a href="/employee" class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-xl">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="font-semibold">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/employee/profile"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
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

    
</x-layout>