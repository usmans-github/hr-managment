<x-layout>
    <div class="flex min-h-screen flex-col px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-lg text-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-100">Edit Department</h2>
            <p class="text-gray-300 mt-2 text-sm">Update the details below to edit the department.</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-lg bg-zinc-800 rounded-xl shadow-md p-6">
            <form class="space-y-6" action="/update-department/{{ $department->id }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                    <input type="text" name="department_name" id="department_name" required value="{{ $department->department_name }}"
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3
                        text-gray-300"
                        placeholder="Enter department name" />
                </div>

               

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full rounded-lg bg-indigo-600 px-6 py-3 text-sm font-medium text-white hover:bg-indigo-500">
                        Update Department
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
