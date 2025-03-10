<x-layout>


    <!-- Main Content -->
    <main class="flex-1 md:ml-64 p-8">
        <!-- Profile Header -->
        <div class="mb-6">
            <h1 class="text-sm font-medium text-gray-300">Welcome Back,</h1>
            <h1 class="text-4xl font-bold">{{ $employee->first_name . ' ' . $employee->last_name }}</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        
        <!-- Profile Info Section -->
        <div class="bg-zinc-900 rounded-xl p-6">
            <h2 class="text-2xl font-bold mb-4">Profile Information</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-gray-300">Full Name:</p>
                    <p class="text-lg font-semibold">{{ $employee->first_name . ' ' . $employee->last_name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Email:</p>
                    <p class="text-lg font-semibold break-words overflow-hidden">{{ $employee->email }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Position:</p>
                    <p class="text-lg font-semibold">{{ $employee->position->position_name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Department:</p>
                    <p class="text-lg font-semibold">{{ $employee->department->department_name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Date of Joining:</p>
                    <p class="text-lg font-semibold">{{ $employee->join_date }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-300">Salary</p>
                    <p class="text-lg font-semibold">{{ $employee->salary }}</p>
                </div>
            </div>
        </div>

        <!-- Edit Profile Section -->
        <div class="bg-zinc-900 rounded-xl p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Profile</h2>
            <form action="{{ route('employee.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="first_name" class="text-sm font-medium text-gray-300">First Name</label>
                        <input type="text" name="first_name" id="first_name" value="{{ $employee->first_name }}"
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500" required />
                    </div>
                    <div>
                        <label for="last_name" class="text-sm font-medium text-gray-300">Last Name</label>
                        <input type="text" name="last_name" id="last_name" value="{{ $employee->last_name }}"
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500" required />
                    </div>
                   
                    <div>
                        <label for="position" class="text-sm font-medium text-gray-300">Address</label>
                        <input type="text" name="address" id="address" value="{{ $employee->address }}"
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500" required />
                    </div>
                    <div>
                        <label for="Phone" class="text-sm font-medium text-gray-300">Phone No</label>
                        <input type="text" name="phone" id="phone" value="{{ $employee->phone }}"
                            class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500" required />
                    </div>
                </div>

                    <button type="submit"
                    class="w-full mt-6  rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3 text-sm font-medium text-white">Save
                    Changes</button>
            </form>
        </div>

        </div>
    </main>

</x-layout>
