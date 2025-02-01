<x-layout>
   

    
    <div class="flex min-h-screen flex-col px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-100">Create New Department</h2>
            <p class="text-gray-400 mt-2 text-sm">Add a new department to your organization</p>
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
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3 text-gray-300 placeholder-gray-500 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Enter department name"
                    />
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full  rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3 text-sm font-medium text-white"
                    >
                        Create Department
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
