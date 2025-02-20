<x-layout>

    {{-- Main COntent --}}
    <main class="flex ml-64 p-8 min-h-screen flex-col">
        <div class="mb-6">
            <h1 class="text-sm font-medium text-zinc-300">Welcome Back,</h1>
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
                            <label class="block text-sm font-medium text-zinc-300 pb-3">Leave Type</label>
                            <select name="leave_type"
                                class="w-full p-3 rounded-xl bg-zinc-800 text-zinc-300 border border-zinc-700">
                                <option value="Sick">Sick Leave</option>
                                <option value="Casual">Casual Leave</option>
                                <option value="Annual">Annual Leave</option>
                            </select>
                        </div>

                        <!-- Reason -->
                        <div class="sm:col-span-2">
                            <label class="block text-sm font-medium text-zinc-300 pb-3">Reason</label>
                            <textarea name="reason" class="w-full p-3 rounded-xl bg-zinc-800 text-zinc-300 border border-zinc-700 resize-y"
                                rows="3"></textarea>
                        </div>

                        <!-- Start Date -->
                        <div>
                            <label class="block text-sm font-medium text-zinc-300 pb-3">Start Date</label>
                            <input type="date" name="start_date"
                                class="w-full p-3 rounded-xl bg-zinc-800 text-zinc-300 border border-zinc-700">
                        </div>

                        <!-- End Date -->
                        <div>
                            <label class="block text-sm font-medium text-zinc-300 pb-3">End Date</label>
                            <input type="date" name="end_date"
                                class="w-full p-3 rounded-xl bg-zinc-800 text-zinc-300 border border-zinc-700">
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
        <tbody class="divide-y divide-zinc-800">
            @foreach ($leaverequests as $leave)
                <tr class="hover:bg-zinc-800">
                    <td class="px-6 py-4">{{ $leave->leave_type }}</td>
                    <td class="px-6 py-4">{{ $leave->start_date ?? 'N/A' }}</td>
                    <td class="px-6 py-4">{{ $leave->end_date ?? 'N/A' }}</td>
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
                            
                            {{ $leave->status }}
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
