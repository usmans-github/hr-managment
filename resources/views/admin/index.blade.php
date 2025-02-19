    <x-layout>

        <div class="flex min-h-screen">

            <!-- Main Content -->
            <main class="flex-1 ml-64 p-8">
                <!-- Welcome Header -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-white">Dashboard</h1>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                    <div class="bg-zinc-900 rounded-xl p-6 flex items-center gap-4">
                        <div class="w-14 h-14 bg-black rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-3xl text-indigo-500"></i>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-300 mb-1 font-semibold">Total Employees</h3>
                            <p class="text-2xl font-bold">{{ $totalemployees }}</p>
                        </div>
                    </div>
                    <div class="bg-zinc-900 rounded-xl p-6 flex items-center gap-4">
                        <div class="w-14 h-14 bg-black rounded-xl flex items-center justify-center">
                            <i class="fas fa-user-check text-3xl text-green-500"></i>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-300 mb-1 font-semibold">Present Today</h3>
                            <p class="text-2xl font-bold">{{ $presentemployees }}</p>
                        </div>
                    </div>
                    <div class="bg-zinc-900 rounded-xl p-6 flex items-center gap-4">
                        <div class="w-14 h-14 bg-black rounded-xl flex items-center justify-center">
                            <i class="fa-regular fa-building text-3xl text-yellow-500"></i>
                        </div>
                        <div>
                            <h3 class="text-sm text-gray-300 mb-1 font-semibold">Total Departments</h3>
                            <p class="text-2xl font-bold">{{ $totaldepartments }}</p>
                        </div>
                    </div>
                </div>

                <!-- Activities Table -->
                <div class="bg-zinc-900 rounded-xl p-6">
                    <div class="mb-6">
                        <h2 class="text-2xl font-bold text-gray-300">Leave Requests</h2>
                    </div>
                    <div class="bg-zinc-900 rounded-xl overflow-hidden">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left bg-zinc-800 text-gray-300">
                                    <th class="font-semibold py-4 px-4">ID</th>
                                    <th class="font-semibold py-4 px-4">Employee</th>
                                    <th class="font-semibold py-4 px-4">Duration</th>
                                    <th class="font-semibold py-4 px-4">Reason</th>
                                    <th class="font-semibold py-4 px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-800">
                                @foreach ($leaverequests as $leave)
                                    <tr class="text-left transition-all hover:bg-zinc-800">
                                        <td class="py-4 px-4 text-gray-300">{{ $leave->id }}</td>
                                        <td class="py-4 px-4 text-gray-300 flex items-center space-x-3">
                                            <div>
                                                <div class="font-semibold">{{ $leave->employee->first_name }}
                                                    {{ $leave->employee->last_name }}</div>
                                                <div class="text-sm text-gray-400">
                                                    {{ $leave->employee->position->position_name ?? 'N/A' }}</div>
                                            </div>
                                        </td>
                                        <td class="py-4 px-4 text-gray-300">{{ $leave->start_date ?? 'N/A' }} -
                                            {{ $leave->end_date ?? 'N/A' }}</td>
                                        <td class="py-4 px-4 text-gray-300 break-words ">{{ $leave->reason }}</td>
                                        <td class="py-4 px-4 flex items-center space-x-2">
                                            @if ($leave->status === 'Approved')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-700">
                                                    <span class="h-2 w-2 rounded-full bg-green-700 mr-2"></span> Approved
                                                </span>
                                            @elseif ($leave->status === 'Rejected')
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-red-100 text-red-700">
                                                    <span class="h-2 w-2 rounded-full bg-red-700 mr-2"></span> Rejected
                                                </span>
                                            @else
                                                <form action="{{ route('leave-request.approve', $leave->id )}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button 
                                                    type="submit"
                                                    class="px-4 py-2 text-sm font-semibold bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-full transition">Approve</button>
                                                </form>
                                            @endif

                                            <!-- Reject Button (X) -->
                                            <form action="{{ route('leave-request.reject', $leave->id )}}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <button
                                                class="w-8 h-8 flex items-center justify-center bg-gray-200 hover:bg-gray-300 text-gray-800 rounded-full transition">✕</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </main>
        </div>
    </x-layout>
