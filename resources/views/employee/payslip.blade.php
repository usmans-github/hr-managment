<x-layout>
    <div class="flex-1 md:ml-64 p-8">
    <!-- Welcome Header -->
    <div class="mb-6">
        <h1 class="text-sm font-medium text-zinc-300">Your Payslips</h1>
        <h1 class="text-4xl font-bold">{{ $employee->first_name . ' ' . $employee->last_name }}</h1>
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
                        @foreach ($employee->payrolls as $payslip)
                            
                        
                        <tr class="border-t border-zinc-700">
                            <td class="py-3">{{ $payslip->pay_period ?? "No record"}}</td>
                            <td class="py-3 font-semibold">Rs. {{ $payslip->amount ?? 'N/A' }}</td>
                            <td class="py-3">
                                 @if ($payslip->status === 'Paid')
                                            <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                                <span class="h-2 w-2 rounded-full bg-green-700 mr-2"></span>
                                                Paid
                                            </span>
                                        @elseif ($payslip->status === 'Pending')
                                             <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-white text-black">
                                                <span class="h-2 w-2 rounded-full bg-black mr-2"></span>
                                                Pending
                                            </span>
                                        @endif
                            </td>
                            <td class="py-3">
                                <a href="#" class="text-indigo-400 hover:text-indigo-600">View Details</a>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>


    </div>
</div>
</x-layout>