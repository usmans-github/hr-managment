<x-layout>

    <!-- Main Content -->
    <main class="flex-1 md:ml-64 p-8">
        <!-- Welcome Header -->
        <div class="mb-6">
            <h1 class="text-sm font-medium text-zinc-300">Welcome Back,</h1>
            <h1 class="text-4xl font-bold">{{ $employee->first_name . ' ' . $employee->last_name }}</h1>

        </div>

        <div class="max-w-7xl mx-auto ">
            <div class="max-w-7xl mx-auto ">
                <!-- Check-in/Check-out Section -->
                <div class="bg-zinc-900 rounded-xl p-6 ">
                    <h2 class="text-2xl font-bold mb-4">Attendance</h2>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="mb-2 text-sm font-medium text-zinc-300">Current Status:</p>
                            @if ($employee->latestAttendence && $employee->latestAttendence->checked_out)
                                <span
                                    class="inline-flex items-center bg-zinc-200 text-zinc-700 px-3 py-1 rounded-full text-sm font-semibold">
                                    <span class="h-2 w-2 bg-zinc-700 rounded-full mr-2"></span>
                                    Checked Out ({{ $employee->latestAttendence->checked_in }} -
                                    {{ $employee->latestAttendence->checked_out }})
                                </span>
                            @elseif ($employee->latestAttendence && $employee->latestAttendence->checked_in)
                                <span
                                    class="inline-flex items-center bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                    <span class="h-2 w-2 bg-green-700 rounded-full mr-2"></span>
                                    Checked In
                                </span>
                            @else
                                <span
                                    class="inline-flex items-center bg-zinc-200 text-zinc-700 px-3 py-1 rounded-full text-sm font-semibold">
                                    <span class="h-2 w-2 bg-zinc-700 rounded-full mr-2"></span>
                                    No Attendance Record
                                </span>
                            @endif
                        </div>
                        <div class="flex flex-col items-center">
                            @if (!$employee->latestAttendence || $employee->latestAttendence->checked_out)
                                <form id="checkin-form" action="{{ route('attendence.checkin', $employee->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button id="checkin-button" type="submit"
                                        class="w-48 h-16 text-xl bg-green-200 text-green-600 font-semibold rounded-xl mb-2">
                                        <i class="fa-solid fa-chevron-left mx-2"></i>
                                        Check In
                                    </button>
                                </form>
                            @elseif (!$employee->latestAttendence->checked_out)
                                <form id="checkout-form" action="{{ route('attendence.checkout', $employee->id) }}"
                                    method="post">
                                    @csrf
                                    @method('PUT')
                                    <button id="checkout-button" type="submit"
                                        class="w-48 h-16 text-xl bg-red-200 text-red-600 font-semibold rounded-xl ">
                                        Check Out
                                        <i class="fa-solid fa-chevron-right mx-2"></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!-- Quick Actions & Information Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 py-6">
            <div class="bg-zinc-900 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="/leave-request">

                        <button
                            class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 rounded-xl shadow">Apply
                            for Leave</button>
                    </a>
                    <button
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-xl shadow">Request
                        WFH</button>
                    <button
                        class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-xl shadow">Submit
                        Expense</button>
                </div>
            </div>
            <div class="bg-zinc-900 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Upcoming Leaves</h3>
                @if ($upcomingleaves)
                    @foreach ($upcomingleaves as $leave)
                        <ul class="space-y-2">
                            <li class="flex justify-between text-sm">
                                <span>
                                    <span
                                        class="bg-green-500 inline-flex justify-center mr-1 items-center p-1 rounded-full text-sm font-semibold w-auto"></span>
                                    {{ $leave->leave_type }} Leave</span>
                                <span class="font-semibold">{{ $leave->start_date ?? 'N/A' }} -
                                    {{ $leave->end_date ?? 'N/A' }}</span>
                            </li>
                        </ul>
                    @endforeach
                @endif


            </div>
            <div class="bg-zinc-900 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Recent Payslip</h3>
                <p class="text-sm mb-2">May 2024</p>
                <p class="text-2xl font-bold">$3,500.00</p>
                <a href="#" class="text-sm text-indigo-400 hover:text-indigo-600">View Details</a>
            </div>
        </div>

        {{-- <!-- Recent Activity -->
        <div class="bg-zinc-900 text-white rounded-xl p-6 shadow-lg">
            <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
            <ul class="space-y-4">
                <li class="flex items-center">
                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>
                    <div>
                        <p class="text-sm font-semibold">Leave Request Approved</p>
                        <p class="text-xs text-zinc-300">Your leave request for Jul 15 - Jul 20 has been approved.
                        </p>
                    </div>
                    <span class="ml-auto text-xs text-zinc-500">2 days ago</span>
                </li>
                <li class="flex items-center">
                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                    <div>
                        <p class="text-sm font-semibold">New Announcement</p>
                        <p class="text-xs text-zinc-300">Company picnic scheduled for next month. Save the date!</p>
                    </div>
                    <span class="ml-auto text-xs text-zinc-500">1 week ago</span>
                </li>
                <li class="flex items-center">
                    <span class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></span>
                    <div>
                        <p class="text-sm font-semibold">Training Reminder</p>
                        <p class="text-xs text-zinc-300">Don't forget about the upcoming safety training session.
                        </p>
                    </div>
                    <span class="ml-auto text-xs text-zinc-500">2 weeks ago</span>
                </li>
            </ul>
        </div> --}}
        </div>
    </main>

</x-layout>
