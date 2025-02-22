<x-layout>
    <div class="flex-1 ml-64 p-8 min-h-screen">
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
                            <th class="pb-3 font-semibold">Amount</th>
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


    </div>
</div>
</x-layout>