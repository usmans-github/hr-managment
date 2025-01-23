<x-layout>
    <div class="flex min-h-screen flex-col justify-center px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-lg text-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-100">Edit Employee</h2>
            <p class="text-gray-300 mt-2 text-sm">Update the details below to edit the employee.</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-lg bg-zinc-800 rounded-xl shadow-md p-6">
            <form class="space-y-6" action="/employees/{{ $employee->id }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                    <input type="text" name="name" id="name" required value="{{ $employee->name }}"
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3
                        text-gray-300"
                        placeholder="Enter employee name" />
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                    <input type="email" name="email" id="email" required value="{{ $employee->email }}"
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3
                        text-gray-300"
                        placeholder="Enter email address" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input name="password" id="password" required value="{{ $employee->password }}"
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3
                        text-gray-300"
                        placeholder="Enter Password" />
                </div>

                <!-- Phone -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-300">Phone</label>
                    <input type="text" name="phone" id="phone" required value="{{ $employee->phone }}"
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3
                        text-gray-300"
                        placeholder="Enter phone number" />
                </div>

                <!-- Department -->
                <div>
                    <label for="department" class="block text-sm font-medium text-gray-300">Department</label>
                    <select name="department_id" id="department_id" 
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300">
                        <option value="" disabled>Select a department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" 
                                {{ $employee->department_id == $department->id ? 'selected' : '' }}>
                                {{ $department->department_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Position -->
                <div>
                    <label for="position" class="block text-sm font-medium text-gray-300">Position</label>
                    <select name="position_id" id="position_id" 
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300">
                        <option value="" disabled>Select a Position</option>
                        @foreach ($positions as $position)
                            <option value="{{ $position->id }}" 
                                {{ $employee->position_id == $position->id ? 'selected' : '' }}>
                                {{ $position->position_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Salary -->
                <div>
                    <label for="salary" class="block text-sm font-medium text-gray-300">Salary</label>
                    <input type="text" name="salary" id="salary" required value="{{ $employee->salary }}"
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300"
                        placeholder="Enter salary amount" />
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full rounded-lg bg-indigo-600 px-6 py-3 text-sm font-medium text-white hover:bg-indigo-500">
                        Update Employee
                    </button>
                </div>
            </form>
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
