<x-layout>
    <div class="flex min-h-screen flex-col px-6 lg:px-8 pt-12">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <h2 class="text-3xl font-bold text-zinc-100">Create New Position</h2>
            <p class="text-zinc-300 mt-1">Add a new position to a specific department</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md bg-zinc-800 rounded-xl shadow-md p-6">
            <form class="space-y-6" action="{{ route('position.store') }}" method="POST">
                @csrf

                <!-- Position Name -->
                <div>
                    <label for="position_name" class="block text-sm font-medium text-gray-300">Position Name</label>
                    <input type="text" name="position_name" id="position_name" required
                         class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                        placeholder="Enter position name" />
                </div>

                <!-- Department Name -->
                <div>
                    <label for="department_id" class="block text-sm font-medium text-gray-300">Department Name</label>
                    <select name="department_id" id="department_id" required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400">
                        <option disabled selected>Select a department</option>
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3
                         text-zinc-300 text-sm font-medium">
                        Create Position
                    </button>
                </div>
            </form>

            <!-- Back to Departments Link -->
           <p class="text-zinc-300 mt-4">
                Back to Departments?
                <a href="/department" class="text-zinc-300 mt-1 hover:underline">
                    Click Here
                </a>
            </p>
        </div>
    </div>
</x-layout>
