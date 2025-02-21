<x-layout>
    <div class="flex-1 ml-64 p-8 min-h-screen bg-zinc-800 text-white">
    <!-- Welcome Header -->
    <div class="mb-6">
        <h1 class="text-sm font-medium text-zinc-300">Your Payslips</h1>
        <h1 class="text-4xl font-bold">John Doe</h1>
    </div>

    <div class="max-w-7xl mx-auto">
        <!-- Payslips Section -->
        <div class="bg-zinc-900 rounded-xl p-6 mb-6">
            <h2 class="text-2xl font-bold mb-4">Recent Payslips</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-zinc-300">
                            <th class="pb-3 font-semibold">Pay Period</th>
                            <th class="pb-3 font-semibold">Net Pay</th>
                            <th class="pb-3 font-semibold">Status</th>
                            <th class="pb-3 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-t border-zinc-700">
                            <td class="py-3">May 1 - May 31, 2024</td>
                            <td class="py-3 font-semibold">$3,500.00</td>
                            <td class="py-3">
                                <span class="inline-flex items-center bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">
                                    <span class="h-1.5 w-1.5 bg-green-700 rounded-full mr-1.5"></span>
                                    Paid
                                </span>
                            </td>
                            <td class="py-3">
                                <a href="#" class="text-indigo-400 hover:text-indigo-600">View Details</a>
                            </td>
                        </tr>
                        <tr class="border-t border-zinc-700">
                            <td class="py-3">April 1 - April 30, 2024</td>
                            <td class="py-3 font-semibold">$3,500.00</td>
                            <td class="py-3">
                                <span class="inline-flex items-center bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">
                                    <span class="h-1.5 w-1.5 bg-green-700 rounded-full mr-1.5"></span>
                                    Paid
                                </span>
                            </td>
                            <td class="py-3">
                                <a href="#" class="text-indigo-400 hover:text-indigo-600">View Details</a>
                            </td>
                        </tr>
                        <tr class="border-t border-zinc-700">
                            <td class="py-3">March 1 - March 31, 2024</td>
                            <td class="py-3 font-semibold">$3,500.00</td>
                            <td class="py-3">
                                <span class="inline-flex items-center bg-green-100 text-green-700 px-2 py-1 rounded-full text-xs font-semibold">
                                    <span class="h-1.5 w-1.5 bg-green-700 rounded-full mr-1.5"></span>
                                    Paid
                                </span>
                            </td>
                            <td class="py-3">
                                <a href="#" class="text-indigo-400 hover:text-indigo-600">View Details</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions & Information Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-zinc-900 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Payroll Summary</h3>
                <div class="space-y-2">
                    <p class="flex justify-between">
                        <span class="text-zinc-300">Year-to-Date Earnings:</span>
                        <span class="font-semibold">$14,000.00</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-zinc-300">Year-to-Date Taxes:</span>
                        <span class="font-semibold">$3,500.00</span>
                    </p>
                    <p class="flex justify-between">
                        <span class="text-zinc-300">Last Pay Date:</span>
                        <span class="font-semibold">May 31, 2024</span>
                    </p>
                </div>
            </div>
            <div class="bg-zinc-900 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Quick Actions</h3>
                <div class="space-y-3">
                    <button class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 rounded-xl shadow">Download Latest Payslip</button>
                    <button class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 rounded-xl shadow">Update Bank Details</button>
                    <button class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 rounded-xl shadow">Tax Documents</button>
                </div>
            </div>
            <div class="bg-zinc-900 text-white rounded-xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Notifications</h3>
                <ul class="space-y-2">
                    <li class="flex items-center text-sm">
                        <span class="h-2 w-2 bg-green-500 rounded-full mr-2"></span>
                        <span>Your May payslip is now available</span>
                    </li>
                    <li class="flex items-center text-sm">
                        <span class="h-2 w-2 bg-blue-500 rounded-full mr-2"></span>
                        <span>Remember to submit your expenses by the 5th</span>
                    </li>
                    <li class="flex items-center text-sm">
                        <span class="h-2 w-2 bg-yellow-500 rounded-full mr-2"></span>
                        <span>Tax year-end approaching, check your details</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
</x-layout>