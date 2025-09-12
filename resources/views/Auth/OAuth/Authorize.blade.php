<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LOGIN</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <div class="">
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-6">
                <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">OAuth 2.0 Login</h2>
                <h3 class="text-xl">Bienvenido {{Auth::user()->name}}, estás a punto de iniciar sesión con Auth2.0</h3>
                <form action="{{ route('passport.authorizations.approve') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="state" value="{{ request('state') }}">
                    <input type="hidden" name="client_id" value="{{ request('client_id') }}">
                    <input type="hidden" name="auth_token" value="{{ $authToken }}">


                    <button type="submit"
                        class="w-full py-2 px-4 bg-indigo-600 text-white rounded-lg font-medium shadow hover:bg-indigo-700 transition">
                        Iniciar
                    </button>
                </form>
                <form action="{{ route('passport.authorizations.deny') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('DELETE')

                    <input type="hidden" name="state" value="{{ request('state') }}">
                    <input type="hidden" name="client_id" value="{{ request('client_id') }}">
                    <input type="hidden" name="auth_token" value="{{ $authToken }}">



                    <button type="submit"
                        class="w-full py-2 px-4 bg-red-600 text-white rounded-lg font-medium shadow hover:bg-red-700 transition">
                        Denegar
                    </button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>