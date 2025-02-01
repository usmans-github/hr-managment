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
    
    

    <!-- Sidebar -->
    <aside class="w-64 absolute h-full">

        <nav class="mt-8">
            <ul class="space-y-4 px-4">
                <li>
                    <a href="/admin" class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-lg shadow-md">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="font-semibold">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/employees"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                        <i class="fas fa-user"></i>
                        <span class="font-semibold">My Profile</span>
                    </a>
                </li>
                <li>
                    <a href="/attendence"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                        <i class="fas fa-calendar-check"></i>
                        <span class="font-semibold">Leave Requests</span>
                    </a>
                </li>
                <li>
                    <a href="/payroll"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                        <i class="fas fa-wallet"></i>
                        <span class="font-semibold">Payslips</span>
                    </a>
                </li>
                <li>
                    <a href="/reports"
                        class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                        <i class="fas fa-chart-line"></i>
                        <span class="font-semibold">Performance</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 ml-64 p-8">
        <!-- Welcome Header -->
        <div class="mb-2">
            <h1 class="text-3xl font-bold">Employee Dashboard</h1>
            <p class="text-gray-300 text-sm font-semibold">Manage your hr operations effortlessly.</p>
        </div>

        <div class="max-w-7xl mx-auto py-6">
            <!-- Attendance Card -->
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6">
                    <h3 class="text-lg font-semibold  mb-4">Today's Attendance</h3>
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm ">Current Status:</p>
                            <p class="text-lg font-semibold text-green-600">Checked In</p>
                            <p class="text-sm ">09:00 AM</p>
                        </div>
                        <button class="w-48 h-28 text-2xl bg-red-500 hover:bg-red-600 font-semibold  rounded">
                            Check Out
                            <i class="fa-solid fa-right-from-bracket "></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                        <div class="space-y-2">
                            <button
                                class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded">
                                Apply for Leave
                            </button>
                            <button
                                class="w-full  font-semibold py-2 px-4 rounded">
                                Request WFH
                            </button>
                            <button
                                class="w-full  font-semibold py-2 px-4 rounded">
                                Submit Expense
                            </button>
                        </div>
                    </div>
                </div>
                <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold  mb-4">Upcoming Leaves</h3>
                        <ul class="space-y-2">
                            <li class="flex justify-between items-center">
                                <span class="text-sm ">Summer Vacation</span>
                                <span class="text-sm font-semibold">Jul 15 - Jul 20</span>
                            </li>
                            <li class="flex justify-between items-center">
                                <span class="text-sm ">Personal Day</span>
                                <span class="text-sm font-semibold">Aug 5</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold  mb-4">Recent Payslip</h3>
                        <p class="text-sm  mb-2">May 2024</p>
                        <p class="text-2xl font-bold ">$3,500.00</p>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800">View Details</a>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-zinc-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-semibold  mb-4">Recent Activity</h3>
                    <ul class="space-y-4">
                        <li class="flex items-center">
                            <span class="w-2 h-2 bg-green-500 rounded-full mr-3"></span>
                            <div>
                                <p class="text-sm font-semibold ">Leave Request Approved</p>
                                <p class="text-xs ">Your leave request for Jul 15 - Jul 20 has been
                                    approved.</p>
                            </div>
                            <span class="ml-auto text-xs text-gray-500">2 days ago</span>
                        </li>
                        <li class="flex items-center">
                            <span class="w-2 h-2 bg-blue-500 rounded-full mr-3"></span>
                            <div>
                                <p class="text-sm font-semibold ">New Announcement</p>
                                <p class="text-xs ">Company picnic scheduled for next month. Save the date!
                                </p>
                            </div>
                            <span class="ml-auto text-xs text-gray-500">1 week ago</span>
                        </li>
                        <li class="flex items-center">
                            <span class="w-2 h-2 bg-yellow-500 rounded-full mr-3"></span>
                            <div>
                                <p class="text-sm font-semibold ">Training Reminder</p>
                                <p class="text-xs ">Don't forget about the upcoming safety training
                                    session.</p>
                            </div>
                            <span class="ml-auto text-xs text-gray-500">2 weeks ago</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    </div>
</x-layout>
