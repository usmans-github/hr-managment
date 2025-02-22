<x-layout>
    <div class="flex"> 

        <!-- Main Content -->
        <main class="flex-1 md:ml-64 p-8">
            <div class="mb-8">
                    <div class="flex justify-between items-center">

                        <h2 class="text-3xl font-bold text-white mb-6">Payroll Management</h2>
                        <a href="/payroll/create"
                        class="bg-zinc-900 hover:bg-zinc-800 rounded-lg border border-gray-700
                         text-sm font-medium px-4 py-2.5 flex items-center gap-2 transition-all">
                        <span>New Payroll</span>
                        <i class="fa-solid fa-plus"></i>
                    </a>
                    </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-check-circle text-3xl text-green-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Total Paid</div>
                            <div class="text-2xl font-semibold text-green-400">$45,000</div>
                        </div>
                    </div>
                    <div class="bg-zinc-900 p-4 rounded-xl flex gap-4 items-center">
                        <i class="w-14 h-14 bg-black rounded-xl flex items-center justify-center fas fa-exclamation-circle text-3xl text-yellow-500"></i>
                        <div>
                            <div class="text-sm text-gray-300 mb-1 font-semibold">Pending Amount</div>
                            <div class="text-2xl font-semibold text-yellow-400">$5,000</div>
                        </div>
                    </div>
                </div>

                <!-- Payroll Table -->
                <div class="bg-zinc-900 rounded-xl overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-zinc-800">
                            <tr>
                                <th class="px-6 py-4 text-left">Employee</th>
                                <th class="px-6 py-4 text-left">Department</th>
                                <th class="px-6 py-4 text-left">Pay Period</th>
                                <th class="px-6 py-4 text-left">Salary</th>
                                <th class="px-6 py-4 text-left">Status</th>
                                <th class="px-6 py-4 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <tr class="hover:bg-zinc-800">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-black flex items-center justify-center mr-3">JD</div>
                                        <div>
                                            <div class="font-medium">John Doe</div>
                                            <div class="text-sm text-gray-400">#EMP001</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Development</td>
                                <td class="px-6 py-4">Jan 2024</td>
                                <td class="px-6 py-4">$2,500</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold w-auto">
                                        <span class="h-2 w-2 bg-green-700 rounded-full mr-2"></span>
                                        Paid
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <button>
                                        <i class="fas fa-circle-info p-2 cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr class="hover:bg-zinc-800">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 rounded-full bg-black flex items-center justify-center mr-3">JS</div>
                                        <div>
                                            <div class="font-medium">Jane Smith</div>
                                            <div class="text-sm text-gray-400">#EMP002</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">Design</td>
                                <td class="px-6 py-4">Jan 2024</td>
                                <td class="px-6 py-4">$2,300</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold w-auto">
                                        <span class="h-2 w-2 bg-yellow-700 rounded-full mr-2"></span>
                                        Pending
                                    </span>
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