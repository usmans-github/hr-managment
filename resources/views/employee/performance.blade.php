<x-layout>

    <!-- Main Content -->
    <main class="flex-1 md:ml-64 p-8">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-sm font-medium text-zinc-300">Welcome Back,</h1>
            <h1 class="text-4xl font-bold">{{ $employee->first_name . ' ' . $employee->last_name }}</h1>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="bg-zinc-900 rounded-xl p-6 shadow-lg">
                <h2 class="text-2xl font-bold mb-4">Performance Overview</h2>

                @if(empty($performance))
                    <p class="text-zinc-400">No performance records available.</p>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Performance Score -->
                        <div class="bg-zinc-800 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold mb-2">Overall Score</h3>
                            <p class="text-4xl font-bold text-green-400">{{ $performance->score ?? 'N/A' }}%</p>
                            <p class="text-sm text-zinc-400">Based on evaluations and completed tasks</p>
                        </div>

                        <!-- Recent Evaluations -->
                        {{-- <div class="bg-zinc-800 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold mb-2">Recent Evaluations</h3>
                            @if($performance->evaluations->isEmpty())
                                <p class="text-zinc-400">No evaluations available.</p>
                            @else
                                <ul class="space-y-3">
                                    @foreach ($performance->evaluations as $evaluation)
                                        <li class="flex justify-between">
                                            <span class="text-sm font-medium text-zinc-300">{{ $evaluation->date }}</span>
                                            <span class="text-sm font-bold 
                                                @if($evaluation->rating >= 80) text-green-400 
                                                @elseif($evaluation->rating >= 50) text-yellow-400 
                                                @else text-red-400 
                                                @endif">
                                                {{ $evaluation->rating }}%
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div> --}}
                    </div>

                    <!-- Key Metrics -->
                    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-zinc-800 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold mb-2">Completed Tasks</h3>
                            <p class="text-2xl font-bold">{{ $performance->tasks_completed ?? '0' }}</p>
                        </div>

                        <div class="bg-zinc-800 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold mb-2">Late Submissions</h3>
                            <p class="text-2xl font-bold text-red-400">{{ $performance->late_submissions ?? '0' }}</p>
                        </div>

                        <div class="bg-zinc-800 p-6 rounded-xl">
                            <h3 class="text-lg font-semibold mb-2">Team Contributions</h3>
                            <p class="text-2xl font-bold text-indigo-400">{{ $performance->team_contributions ?? '0' }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </main>

</x-layout>
