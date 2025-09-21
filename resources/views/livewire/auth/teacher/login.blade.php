<div class="" style="--color: {{$client->teacher_color}}">
    <div class="min-h-screen flex flex-col">
        <div class="flex flex-1 flex-col md:flex-row">
            <div class="w-full md:w-1/2 flex flex-col justify-center items-center px-6 py-10 bg-white">
                @error('email')
                <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 md:w-3/6"
                    role="alert">
                    <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span>{{ $message }}</span>
                    </div>
                </div>
                @enderror
                <img src="{{asset('storage/sso/'.$client->logo)}}" alt="Logo S.A.R.A" class="w-sm mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Bienvenido</h2>
                <h3 class="text-xl text-gray-700 mb-6">profesor</h3>

                <p class="text-sm text-gray-500 mb-6">
                    Inicia sesión para acceder al sistema
                </p>



                <form class="w-full max-w-sm space-y-4" wire:submit.prevent='login' autocomplete="off">
                    <input type="email" placeholder="Correo electronico" wire:model='email'
                        class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-[var(--color)]">

                    <input type="password" placeholder="Contraseña" wire:model='password'
                        class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-[var(--color)]">

                    <button type="submit"
                        class="w-full py-2 cursor-pointer bg-[var(--color)] text-white font-semibold rounded-full hover:bg-[var(--color)] transition">
                        Ingresar
                    </button>
                </form>
            </div>

            <div class="hidden md:flex w-1/2">
                <img src="{{asset('imgs/SARA/teachers.jpg')}}" alt="Estudiantes en el comedor"
                    class="w-full h-full object-cover">
            </div>
        </div>
    </div>

    <footer class="w-full bg-[var(--color)] text-white text-xs py-3 text-center">
        © {{\Carbon\Carbon::now()->year}} - Proyecto SASHA | By: S.A.R.A & System Shadow | Colegio OEA I.E.D
    </footer>

</div>