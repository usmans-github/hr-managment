<x-layout>

    <div class="flex min-h-screen flex-col px-6 lg:px-8 pt-12">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <h2 class="text-3xl font-bold text-zinc-100">Create New Department</h2>
            <p class="text-zinc-300 mt-1">Add a new department to your organization</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md bg-zinc-800 rounded-xl shadow-md p-6">
            <form class="space-y-6" action="/department" method="POST">
                @csrf

                <!-- Department Name -->
                <div>
                    <label for="department_name" class="block text-sm font-medium text-gray-300">Department Name</label>
                    <input
                        type="text"
                        name="department_name"
                        id="department_name"
                        required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                        placeholder="Enter department name"
                    />
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3
                         text-zinc-300 text-sm font-medium">
                        Create Department
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
