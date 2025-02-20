<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Human Resources Managment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-black text-white pb-20">
     <div class="flex min-h-screen flex-col px-6 lg:px-8 pt-12">
        <!-- Header -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md text-center mb-8">
            <h2 class="text-3xl font-bold text-zinc-100">Sign In</h2>
            <p class="text-zinc-300 mt-1">Access your account below</p>
        </div>

        <!-- Form -->
        <div class="sm:mx-auto sm:w-full sm:max-w-md bg-zinc-800 rounded-xl shadow-md p-6">
            <form class="space-y-6" action="/login" method="POST">
                @csrf
                <!-- Email Field -->
                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-300">Email Address</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        required
                        class="mt-2 block w-full rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400"
                        placeholder="Enter your email"
                    />
                </div>

                <!-- Password Field -->
                <div>
                    <label for="password" class="block text-sm font-medium text-zinc-300">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        required
                        class="mt-2 block w-full  rounded-xl bg-zinc-900 border border-gray-700 px-4 py-3
                        placeholder-zinc-400 "
                        placeholder="Enter your password"
                    />
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full rounded-xl bg-zinc-700 hover:bg-zinc-600 px-6 py-3 text-zinc-300 text-sm font-medium">
                        Sign In
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
</body>
</html>