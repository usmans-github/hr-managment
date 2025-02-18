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
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-xl transition">
                        <i class="fas fa-user"></i>
                        <span class="font-semibold">My Profile</span>
                    </a>
                </li>
                <li>
                    <a href='/leave-request'
                        class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-xl transition">
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

    {{-- Main COntent --}}
    <main class="flex ml-64 p-8 min-h-screen flex-col">
        <div class="mb-6">
            <h1 class="text-sm font-medium text-gray-300">Welcome Back,</h1>
            <h1 class="text-4xl font-bold">{{ $employee->first_name . ' ' . $employee->last_name }}</h1>
        </div>

        <!-- Two Column Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
            <!-- Apply for Leave -->
            <div class="bg-zinc-900 rounded-xl p-6 shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-white">Apply for Leave</h2>
                <form action="{{ route('leave-request.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                        <!-- Leave Type -->
                        <div>
                            <label class="text-gray-300 block mb-1 font-medium">Leave Type</label>
                            <select name="leave_type"
                                class="w-full p-3 rounded-xl bg-zinc-800 text-gray-300 border border-gray-700">
                                <option value="sick">Sick Leave</option>
                                <option value="casual">Casual Leave</option>
                                <option value="annual">Annual Leave</option>
                            </select>
                        </div>

                        <!-- Reason -->
                        <div class="sm:col-span-2">
                            <label class="text-gray-300 block mb-1 font-medium">Reason</label>
                            <textarea name="reason" class="w-full p-3 rounded-xl bg-zinc-800 text-gray-300 border border-gray-700 resize-y"
                                rows="3"></textarea>
                        </div>

                        <!-- Start Date -->
                        <div>
                            <label class="text-gray-300 block mb-1 font-medium">Start Date</label>
                            <input type="date" name="start_date"
                                class="w-full p-3 rounded-xl bg-zinc-800 text-gray-300 border border-gray-700">
                        </div>

                        <!-- End Date -->
                        <div>
                            <label class="text-gray-300 block mb-1 font-medium">End Date</label>
                            <input type="date" name="end_date"
                                class="w-full p-3 rounded-xl bg-zinc-800 text-gray-300 border border-gray-700">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full mt-6 bg-indigo-500 hover:bg-indigo-600 text-white font-semibold
                        py-3 rounded-xl shadow-lg transition">
                        Submit Request
                    </button>
                </form>
            </div>

            <!-- Your Leave Requests -->
<div class="bg-zinc-900 rounded-xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-zinc-800">
            <tr>
                <th class="px-6 py-4 text-left">Type</th>
                <th class="px-6 py-4 text-left">Start Date</th>
                <th class="px-6 py-4 text-left">End Date</th>
                <th class="px-6 py-4 text-left">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @foreach ($leaverequests as $leave)
                <tr class="hover:bg-zinc-800">
                    <td class="px-6 py-4">{{ $leave->leave_type }}</td>
                    <td class="px-6 py-4">{{ $leave->start_date }}</td>
                    <td class="px-6 py-4">{{ $leave->end_date }}</td>
                    <td class="px-6 py-4">
                        <span 
                            class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold w-auto
                            {{ $leave->status === 'Approved' 
                                ? 'bg-green-100 text-green-700' 
                                : ($leave->status === 'Pending' 
                                    ? 'bg-yellow-100 text-yellow-700' 
                                    : 'bg-red-100 text-red-700') }}">
                            
                            <span 
                                class="h-2 w-2 rounded-full mr-2
                                {{ $leave->status === 'Approved' 
                                    ? 'bg-green-700' 
                                    : ($leave->status === 'Pending' 
                                        ? 'bg-yellow-700' 
                                        : 'bg-red-700') }}">
                            </span>
                            
                            {{ ucfirst($leave->status) }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>
    </main>

</x-layout>
