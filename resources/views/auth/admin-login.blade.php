<x-layout>
    <div class="flex min-h-screen flex-col px-6 lg:px-8">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-100">Sign In as Admin</h2>
            <p class="text-gray-400 mt-2 text-sm">Access the admin panel</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md bg-zinc-800 rounded-xl shadow-md p-6">
            <form class="space-y-6" action="/admin" method="POST">
                @csrf
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500"
                        placeholder="Enter your email"
                    />
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="mt-2 block w-full rounded-lg bg-zinc-900 border border-gray-700 px-4 py-3
                         text-gray-300 placeholder-gray-500"
                        placeholder="Enter your password"
                    />
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full rounded-lg bg-zinc-700 hover:bg-zinc-600 px-6 py-3 text-sm font-medium text-white">
                        Sign In
                    </button>
                </div>
            </form>

            <!-- Employee Login Link -->
            <p class="mt-6 text-center text-sm text-gray-400">
                Employee Login? 
                <a href="/" class="text-gray-300 hover:underline">
                    Click Here
                </a>
            </p>
        </div>
    </div>
</x-layout>
