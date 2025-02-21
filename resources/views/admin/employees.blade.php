<x-layout>

    <div class="flex min-h-screen">

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Header -->
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white">Directory</h1>
                </div>


                {{-- Create Employee Button --}}
                <a href="{{ route('admin.create') }}">
                    <button
                        class="bg-zinc-900 hover:bg-zinc-800 rounded-lg border border-zinc-700 text-sm
                            font-medium px-3 py-2 flex items-center gap-2 transition-all">
                        Add Employee
                        <i class="fa fa-user-plus"></i>
                    </button>
                </a>
            </div>

            <!-- Employee Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-14">
                @foreach ($employees as $employee)
                    <div
                        class="bg-zinc-900 rounded-xl p-6 border border-zinc-800 hover:border-zinc-700 transition-all flex flex-col h-full">

                        <div class="flex items-start justify-between mb-2">
                            <div class="flex items-center gap-4">
                                <div
                                    class="w-12 h-12 rounded-full bg-white text-black text-xl font-semibold flex items-center justify-center">
                                    {{ substr($employee->first_name, 0, 1) }}{{ substr($employee->last_name, 0, 1) }}
                                </div>
                                <div>
                                    <div class="flex items-center gap-2">
                                        <h3 class="text-lg font-semibold text-white">
                                            {{ $employee->first_name }} {{ $employee->last_name }}
                                        </h3>
                                        <span
                                            class="px-2 py-1 rounded-full text-xs {{ $employee->status === 'active' ? 'bg-green-100 text-green-700' : 'bg-zinc-100 text-zinc-700' }}">
                                            {{ $employee->status ?? 'active' }}
                                        </span>
                                    </div>
                                    <p class="text-zinc-400">{{ $employee->position->position_name ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-3 pl-2">
                            <div class="flex items-center gap-2 text-zinc-300">
                                <i class="fas fa-envelope w-5"></i>
                                <span class="text-sm">{{ $employee->email ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-zinc-300">
                                <i class="fa-regular fa-building"></i>
                                <span class="text-sm">{{ $employee->department->department_name ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-zinc-300">
                                <i class="fa-regular fa-calendar-check"></i>
                                <span
                                    class="text-sm">{{ $employee->join_date ? date('M d, Y', strtotime($employee->join_date)) : 'N/A' }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-zinc-300">
                                <i class="fas fa-phone w-5"></i>
                                <span class="text-sm">{{ $employee->phone ?? 'N/A' }}</span>
                            </div>
                            <div class="flex items-center gap-2 text-zinc-300">
                                <i class="fas fa-map-marker-alt w-5"></i>
                                <span class="text-sm">{{ $employee->address ?? 'N/A' }}</span>
                            </div>
                        </div>

                        {{-- Buttons bar  --}}
                        <div class="flex justify-end items-center gap-2 mt-auto">

                            <a href="{{ route('employee.edit', $employee->id) }}">
                                <button>
                                    <i class="fas fa-edit cursor-pointer rounded-md text-zinc-300 hover:text-white
                                      hover:bg-zinc-700 p-2"></i>
                                </button>
                            </a>

                    
                            <!-- View History Button -->
                            <a href="{{ route('employeedetails', $employee->id) }}">
                                <button>
                                    <i class="fas fa-history cursor-pointer rounded-md text-zinc-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                                </button>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="mt-4">
                {{ $employees->links('pagination::tailwind') }}
            </div>
            
        </main>
    </div>


</x-layout>