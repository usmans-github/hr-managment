<x-layout>
    <div class="flex">
        <main class="flex-1 md:ml-64 p-8">
            <div class="mb-6 flex flex-wrap justify-between items-center gap-4">
                <h1 class="text-2xl md:text-3xl font-bold text-white">Departments</h1>
                <div class="flex gap-6   justify-center">
                    <a href="/position/create"
                        class="bg-zinc-900 hover:bg-zinc-800 rounded-lg border border-gray-700 text-sm font-medium px-4 py-2 flex items-center gap-2 transition-all">
                        <i class="fa-solid fa-plus"></i>
                        <span>Position</span>
                    </a>
                    <a href="/department/create"
                        class="bg-zinc-900 hover:bg-zinc-800 rounded-lg border border-gray-700 text-sm font-medium px-4 py-2 flex items-center gap-2 transition-all">
                        <i class="fa-regular fa-square-plus"></i>
                        <span>Department</span>
                    </a>
                </div>
            </div>

            <!-- Department Grid -->
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($departments as $department)
                <div class="bg-zinc-900 rounded-xl p-4 md:p-6 border border-gray-800 hover:border-gray-700 transition-all flex flex-col h-full">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center gap-3">
                            <i class="fa-regular fa-building text-gray-300 p-3 md:p-4 bg-zinc-800 rounded-lg"></i>
                            <div>
                                <h3 class="text-lg font-semibold text-white">{{ $department->department_name }}</h3>
                                <p class="text-gray-400 text-sm">{{ $department->employees->count() }} employees</p>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('department.edit', $department->id) }}">
                                <i class="fas fa-edit cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                            </a>
                            <form method="POST" action="{{ route('department.destroy', $department->id) }}"
                                onsubmit="return confirm('Are you sure you want to delete this department?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash cursor-pointer rounded-md text-gray-300 hover:text-white hover:bg-zinc-700 p-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Positions Section -->
                    <div class="mt-4 space-y-2 flex-grow min-h-16 h-auto">
                        <div class="text-sm font-medium text-gray-300">Positions</div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                            @if ($department->positions->count() > 0)
                                @foreach ($department->positions as $position)
                                <div class="bg-zinc-800 px-3 py-2 rounded-xl text-sm text-gray-300">
                                    {{ $position->position_name }}
                                </div>
                                @endforeach
                            @else
                                <p class="text-gray-500 text-sm">No positions available</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-800">
                        <div class="flex flex-wrap items-center justify-between text-sm text-gray-400 gap-2">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-users"></i>
                                <span>{{ $department->positions->count() }} positions</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-user-tie"></i>
                                <span>{{ $department->employees->count() }} employees</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</x-layout>
