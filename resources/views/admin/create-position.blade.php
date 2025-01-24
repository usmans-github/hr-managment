<x-layout>
    <div class="flex min-h-screen flex-col px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-100">Create New Position</h2>
            <p class="text-gray-400 mt-2 text-sm">Add a new position to a specific department</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md bg-zinc-800 rounded-xl shadow-md p-6">
            <form class="space-y-6" action="/position" method="POST">
                @csrf

                <!-- Position Name -->
                <div>
                    <label for="position_name" class="block text-sm font-medium text-gray-300">Position Name</label>
                    <input
                        type="text"
                        name="position_name"
                        id="position_name"
                        required
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter position name"
                    />
                </div>

                <!-- Department Name -->
                <div>
                    <label for="department_id" class="block text-sm font-medium text-gray-300">Department Name</label>
                    <select
                        name="department_id"
                        id="department_id"
                        required
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                        <option disabled selected>Select a department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full rounded-lg bg-indigo-600 px-6 py-3 text-sm font-medium text-white hover:bg-indigo-500 focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                    >
                        Create Position
                    </button>
                </div>
            </form>

            <!-- Back to Departments Link -->
            <p class="mt-6 text-center text-sm text-gray-400">
                Back to Departments? 
                <a href="/department" class="text-white hover:underline">
                    Click Here
                </a>
            </p>
        </div>
    </div>
</x-layout>
