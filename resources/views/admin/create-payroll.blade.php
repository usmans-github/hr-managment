<x-layout>
    <div class="flex min-h-screen flex-col px-6 lg:px-16 pt-12">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full max-w-4xl text-center mb-8">
            <h2 class="text-3xl font-bold text-zinc-100">Create Payroll</h2>
            <p class="text-zinc-300 mt-1">Fill in the details below to generate payroll for an employee.</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full max-w-4xl bg-zinc-800 rounded-xl shadow-md p-8">
            <form class="space-y-6" action="{{ route('payroll.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Employee Selection -->
                    <div>
                        <label for="employee_id" class="block text-sm font-medium text-gray-300">Select Employee</label>
                        <select name="employee_id" id="employee_id" required
                            class="mt-2 cursor-pointer block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300">
                            <option value="" disabled selected>Select an Employee</option>
                            @foreach ($employees as $employee)
                                <option value="{{ $employee->id }}">
                                    {{ $employee->first_name }} {{ $employee->last_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Pay Period -->
                    <div>
                        <label for="pay_period" class="block text-sm font-medium text-gray-300">Pay Period</label>
                        <input type="date" name="pay_period" id="pay_period" required
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                            placeholder-zinc-400" />
                    </div>

                    <!-- Amount -->
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-300">Salary Amount</label>
                        <input type="number" name="amount" id="amount" required
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                            placeholder-zinc-400"
                            placeholder="Enter salary amount" />
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-300">Payment Status</label>
                        <select name="status" id="status" required
                            class="mt-2 cursor-pointer block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300">
                            <option value="Pending" selected>Pending</option>
                            <option value="Paid">Paid</option>
                        </select>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3
                        text-zinc-300 text-sm font-medium">
                        Create Payroll
                    </button>
                </div>
            </form>

            <!-- Back to Payrolls Link -->
            <p class="text-zinc-300 mt-4">
                Back to Payrolls?
                <a href="{{ route('payroll.index') }}" class="text-zinc-300 mt-1 hover:underline">
                    Click Here
                </a>
            </p>

            @if ($errors->any())
                <div class="text-red-500 mt-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</x-layout>
