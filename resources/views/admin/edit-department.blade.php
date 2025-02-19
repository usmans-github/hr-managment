<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black text-white pb-20">
    
    <div class="flex min-h-screen flex-col px-6 lg:px-8 pt-12">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-lg text-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-100">Edit Department</h2>
            <p class="text-gray-300 mt-2 text-sm">Update the details below to edit the department.</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-lg bg-zinc-800 rounded-xl shadow-md p-6">
            <form class="space-y-6" action="{{ route('department.update', $department->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300">Name</label>
                    <input type="text" name="department_name" id="department_name" required
                        value="{{ $department->department_name }}"
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3
                        text-gray-300"
                        placeholder="Enter department name" />
                </div>


                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="w-full  rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3 text-sm font-medium text-white">
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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch(`/department/{{ $department->id }}/getPositions`)
            .then(response => response.json())
            .then(data => {
                const positionsSelect = document.getElementById('positions');
                data.forEach(position => {
                    const option = document.createElement('option');
                    option.value = position.id;
                    option.textContent = position.name;
                    positionsSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching positions:', error));
    });
</script>

</body>
</html>