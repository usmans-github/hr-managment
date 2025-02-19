<x-layout>
    @if (session('success'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
            <div id="toast-success"
                class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-zinc-800 border border-gray-700 rounded-xl shadow-sm"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-400 bg-zinc-700 rounded-xl">
                    <i class="fa fa-check"></i>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('success') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-zinc-800 text-gray-300 hover:text-white rounded-xl
                 p-1.5 hover:bg-zinc-700 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-success" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                </button>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50">
            <div id="toast-error"
                class="flex items-center w-full max-w-xs p-4 text-gray-300 bg-red-800 border border-red-700 rounded-xl shadow-sm"
                role="alert">
                <div
                    class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-400 bg-red-700 rounded-xl">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <div class="mx-3 text-sm font-normal">{{ session('error') }}</div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-800 text-gray-300 hover:text-white rounded-xl
                    p-1.5 hover:bg-red-700 inline-flex items-center justify-center h-8 w-8"
                    data-dismiss-target="#toast-error" aria-label="Close">
                    <i class="fa fa-xmark"></i>
                </button>
            </div>
        </div>
    @endif

    <div class="flex min-h-screen">

        <!-- Main Content -->
        <main class="flex-1 ml-64 p-8">
            <!-- Header -->
            <div class="mb-8 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-bold text-white">Departments</h1>
                </div>
                <div class="flex gap-4">
                    <a href="/position/create"
                        class="bg-zinc-900 hover:bg-zinc-800 rounded-lg border border-gray-700
                         text-sm font-medium px-4 py-2.5 flex items-center gap-2 transition-all">
                        <span>Add Position</span>
                        <i class="fas fa-circle-plus"></i>
                    </a>
                    <a href="/department/create"
                        class="bg-zinc-900 hover:bg-zinc-800 rounded-lg border border-gray-700
                         text-sm font-medium px-4 py-2.5 flex items-center gap-2 transition-all">
                        <span>Add Department</span>
                        <i class="fas fa-square-plus"></i>
                    </a>
                </div>
            </div>

            <!-- Department Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($departments as $department)
                <div class="bg-zinc-900 rounded-xl p-6 border border-gray-800 hover:border-gray-700
                 transition-all flex flex-col">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="">
                                    <i class="fa-regular fa-building text-gray-300 p-4 bg-zinc-800 rounded-lg"></i>
                                </div>
                                <div>
                                    <h3 class="text-lg font-semibold text-white">{{ $department->department_name }}</h3>
                                    <p class="text-gray-400">{{ $department->employees->count() }} employees</p>
                                </div>
                            </div>
                        </div>
                        <div class="flex gap-2">
                            <a href="{{ route('department.edit', $department->id) }}">
                                <i class="fas fa-edit cursor-pointer rounded-md text-gray-300 hover:text-white
                                hover:bg-zinc-700 p-2"></i>
                            </a>
                            <form method="POST" action="{{ route('department.destroy', $department->id) }}"
                                onsubmit="return confirm('Are you sure you want to delete this department?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fas fa-trash cursor-pointer rounded-md text-gray-300 hover:text-white
                                    hover:bg-zinc-700 p-2"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4 space-y-2 flex-grow">
                        <div class="text-sm font-medium text-gray-300">Positions</div>
                        <div class="grid grid-cols-2 gap-2">
                            @foreach ($department->positions as $position)
                            <div class="bg-zinc-800 px-3 py-2 rounded-xl text-sm text-gray-300">
                                {{ $position->position_name ?? 'No Positions' }}
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-4 pt-4 border-t border-gray-800">
                        <div class="flex items-center justify-between text-sm text-gray-400">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-users"></i>
                                <span>{{ $department->positions->count() }} positions</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fas fa-user-tie"></i>
                                <span>{{ $department->employees->count() }} members</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </main>
    </div>
</x-layout>