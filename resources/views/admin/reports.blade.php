<x-layout>
    <div class="flex min-h-screen">

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <div class="mb-8">
                <h2 class="text-3xl font-bold text-white mb-6">Reports</h2>

            

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-users text-3xl text-blue-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Total Employees</div>
                            <div class="text-2xl font-semibold text-blue-400">{{ $totalemployees }}</div>
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

