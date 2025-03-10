<x-layout>
    <div class="flex min-h-screen flex-col justify-center px-6 lg:px-16 pt-12">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full max-w-4xl text-center mb-8">
            <h2 class="text-3xl font-bold text-zinc-100">Create New Employee</h2>
            <p class="text-zinc-300 mt-1">Fill in the details below to add a new employee.</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full max-w-4xl bg-zinc-800 rounded-xl shadow-md p-8">
            <form  class="space-y-6" action="{{ route('employee.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- First Name -->
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-300">First Name</label>
                        <input type="text" name="first_name" id="first_name" required
                            class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                            placeholder="Enter first name" />
                    </div>
                    <!-- Last Name -->
                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-300">Last Name</label>
                        <input type="text" name="last_name" id="last_name" required
                            class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                            placeholder="Enter last name" />
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                        <input type="email" name="email" id="email" required
                            class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                            placeholder="Enter email address" />
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                        <input type="password" name="password" id="password" required
                            class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                            placeholder="Enter Password" />
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-300">Address</label>
                        <input type="text" name="address" id="address" required
                            class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                            placeholder="Enter your address" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-300">Phone</label>
                        <input type="text" name="phone" id="phone" required
                            class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                            placeholder="Enter phone number" />
                    </div>

                    <!-- Department -->
                    <div>
                        <label for="department" class="block text-sm font-medium text-gray-300">Department</label>
                        <select name="department_id" id="department_id"
                            class="mt-2 cursor-pointer block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300">
                            <option value="" disabled selected>Select a department</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">
                                    {{ $department->department_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Position -->
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-300">Position</label>
                        <select name="position_id" id="position_id"
                            class="mt-2 cursor-pointer block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300">
                            <option value="" disabled selected>Select a Position</option>
                            @foreach ($positions as $position)
                                <option value="{{ $position->id }}">
                                    {{ $position->position_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Join Date -->
                    <div>
                        <label for="join_date" class="block text-sm font-medium text-gray-300">Date of Joining</label>
                        <input type="date" name="join_date" id="join_date" required
                            class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400" />
                    </div>

                    <!-- Salary -->
                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-300">Salary</label>
                        <input type="text" name="salary" id="salary" required
                            class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                            placeholder="Enter salary amount" />
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3
                         text-zinc-300 text-sm font-medium">
                        Create Employee
                    </button>
                </div>
            </form>

            <!-- Back to Employees Link -->
            <p class="text-zinc-300 mt-4">
                Back to Employees?
                <a href="{{ route('admin.employees') }}" class="text-zinc-300 mt-1 hover:underline">
                    Click Here
                </a>
            </p>

            @if ($errors->any())
                <div class="text-red-500">
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
