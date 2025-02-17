<x-layout>
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 absolute h-full">
           <a href="/"> <div class="mt-4 px-4 text-3xl font-extrabold">HR-Managment</div> </a>
            <nav class="mt-8">
                <ul class="space-y-4 px-4">
                    <li>
                        <a href="/admin" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg shadow-md">
                            <i class="fas fa-tachometer-alt"></i>
                            <span class="font-semibold">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="/employees" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-users"></i>
                            <span class="font-semibold">Employees</span>
                        </a>
                    </li>
                    <li>
                        <a href="/attendence" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-calendar-check"></i>
                            <span class="font-semibold">Attendance</span>
                        </a>
                    </li>
                    <li>
                        <a href="/payroll" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-wallet"></i>
                            <span class="font-semibold">Payroll</span>
                        </a>
                    </li>
                    <li>
                        <a href="/reports" class="flex items-center gap-3 px-4 py-3 bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-chart-line"></i>
                            <span class="font-semibold">Reports</span>
                        </a>
                    </li>
                    <li>
                        <a href="/department" class="flex items-center gap-3 px-4 py-3 hover:bg-zinc-900 rounded-lg transition">
                            <i class="fas fa-building"></i>
                            <span class="font-semibold">Departments</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-white mb-6">Reports</h2>

                <!-- Filters -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    
                    <div>
                        <label class="block text-sm font-medium mb-1">Search</label>
                        <input type="text" placeholder="Search by name or ID" class="w-full px-3 py-2 bg-zinc-900 rounded-xl border border-gray-700">
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-users text-3xl text-blue-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Total Employees</div>
                            <div class="text-2xl font-semibold text-blue-400">152</div>
                        </div>
                    </div>
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-percentage text-3xl text-green-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Avg. Attendance</div>
                            <div class="text-2xl font-semibold text-green-400">92%</div>
                        </div>
                    </div>
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-wallet text-3xl text-indigo-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Total Payroll</div>
                            <div class="text-2xl font-semibold text-indigo-400">$284,500</div>
                        </div>
                    </div>
                    {{-- <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-briefcase text-3xl text-yellow-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Open Positions</div>
                            <div class="text-2xl font-semibold text-yellow-400">7</div>
                        </div>
                    </div> --}}
                </div>

                <!-- Reports Table -->
                <div class="bg-zinc-900 rounded-xl overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-zinc-800">
                            <tr>
                                <th class="px-6 py-4 text-left">Department</th>
                                <th class="px-6 py-4 text-left">Employees</th>
                                <th class="px-6 py-4 text-left">Avg. Attendance</th>
                                <th class="px-6 py-4 text-left">Productivity</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <tr class="hover:bg-zinc-800">
                                <td class="px-6 py-4">IT</td>
                                <td class="px-6 py-4">45</td>
                                <td class="px-6 py-4">95%</td>
                                <td class="px-6 py-4">  
                                    <div class="bg-blue-600 h-2.5 rounded-full w-2.5"></div>
                                </td>
                                <td class="px-6 py-4">
                                    <button>
                                        <i class="fas fa-circle-info p-2 cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-zinc-800">  
                                <td class="px-6 py-4">Finance</td>
                                <td class="px-6 py-4">16</td>
                                <td class="px-6 py-4">80%</td>
                                <td class="px-6 py-4">
                                    
                                </td>
                                <td class="px-6 py-4">
                                    <button>
                                        <i class="fas fa-circle-info p-2 cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</x-layout>

