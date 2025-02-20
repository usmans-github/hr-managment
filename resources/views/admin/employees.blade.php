<x-layout>

    <div class="flex min-h-screen">

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Header -->
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white">Directory</h1>
                </div>

              
                {{-- Create Employee Toggle --}}
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="bg-zinc-900 hover:bg-zinc-800 rounded-lg border border-zinc-700 text-sm
                     font-medium px-3 py-2 flex items-center gap-2 transition-all">
                    Add Employee
                    <i class="fa fa-user-plus"></i>
                </button>
            </div>

            <!-- Employee Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-14">
                @foreach ($employees as $employee)
                    <div class="bg-zinc-900 rounded-xl p-6 border border-zinc-800 hover:border-zinc-700 transition-all">
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

                        <div class="space-y-3">
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

                        <div class="flex justify-end gap-2">
                          
                            <form method="POST" action="{{ route('employee.destroy', $employee->id) }}"
                                onsubmit="return confirm('Are you sure you want to delete this employee?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash cursor-pointer rounded-md text-zinc-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                                </button>
                            </form>
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


        </main>
    </div>

   <!-- Create Employee modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true"   
    class="hidden fixed inset-0 z-50 items-center justify-center bg-black/60">

    <!-- Modal Container -->
    <div
        class="relative w-full max-w-2xl bg-zinc-900 text-white rounded-2xl shadow-2xl p-8 max-h-[90vh] overflow-y-auto transition-transform transform scale-95">

        <!-- Close Button -->
        <button data-modal-toggle="crud-modal" class="absolute top-4 right-4 text-zinc-400 hover:text-white text-3xl">
            &times;
        </button>

        <!-- Header -->
        <div class="text-center mb-6">
            <h2 class="text-3xl font-bold text-zinc-100">Add New Employee</h2>
            <p class="text-zinc-400 text-base mt-1">Fill in the details to create a new employee record.</p>
        </div>

        <!-- Form -->
        <form class="space-y-5" action="{{ route('employee.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="first_name" class="text-sm font-medium text-zinc-300">First Name</label>
                    <input type="text" name="first_name" id="first_name" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                </div>

                <div>
                    <label for="last_name" class="text-sm font-medium text-zinc-300">Last Name</label>
                    <input type="text" name="last_name" id="last_name" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="email" class="text-sm font-medium text-zinc-300">Email</label>
                    <input type="email" name="email" id="email" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                </div>

                <div>
                    <label for="password" class="text-sm font-medium text-zinc-300">Password</label>
                    <input type="password" name="password" id="password" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="address" class="text-sm font-medium text-zinc-300">Address</label>
                    <input type="text" name="address" id="address" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                </div>

                <div>
                    <label for="phone" class="text-sm font-medium text-zinc-300">Phone</label>
                    <input type="text" name="phone" id="phone" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="department" class="text-sm font-medium text-zinc-300">Department</label>
                    <select name="department_id" id="department_id"
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                        <option value="" disabled selected>Select a department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label for="position" class="text-sm font-medium text-zinc-300">Position</label>
                    <select name="position_id" id="position_id"
                       class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                        <option value="" disabled selected>Select a Position</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}">{{ $position->position_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-5">
                <div>
                    <label for="join_date" class="text-sm font-medium text-zinc-300">Date of Joining</label>
                    <input type="date" name="join_date" id="join_date" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                </div>

                <div>
                    <label for="salary" class="text-sm font-medium text-zinc-300">Salary</label>
                    <input type="text" name="salary" id="salary" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-zinc-300 placeholder-zinc-400">
                </div>
            </div>

            <button type="submit"
                class="w-full rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3 text-zinc-300 text-sm font-medium">
                Create Employee
            </button>
        </form>
    </div>
</div>


</x-layout>
