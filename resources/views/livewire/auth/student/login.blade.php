<div class="min-h-screen flex flex-col">
    <div class="flex flex-1 flex-col md:flex-row">
        <div class="w-full md:w-1/2 flex flex-col justify-center items-center px-6 py-10 bg-white">
            @error('document')
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
            <img src="{{asset('imgs/SARA/sara-login.png')}}" alt="Logo S.A.R.A" class="w-sm mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Bienvenido</h2>
            <h3 class="text-xl text-gray-700 mb-6">estudiante</h3>

            <p class="text-sm text-gray-500 mb-6">
                Inicia sesión para acceder al sistema
            </p>



            <form class="w-full max-w-sm space-y-4" wire:submit.prevent='login' autocomplete="off">
                <input type="number" placeholder="# Documento" wire:model='document'
                    class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-[#114D58]">

                <input type="password" placeholder="Contraseña" wire:model='password'
                    class="w-full px-4 py-2 border rounded-full focus:outline-none focus:ring-2 focus:ring-[#114D58]">

                <button type="submit"
                    class="w-full py-2 bg-[#114D58] text-white font-semibold rounded-full hover:bg-[#0d3a44] transition">
                    Ingresar
                </button>
            </form>
        </div>

        <div class="hidden md:flex w-1/2">
            <img src="{{asset('imgs/SARA/students.jpg')}}" alt="Estudiantes en el comedor"
                class="w-full h-full object-cover">
        </div>
    </div>

</div>
</div>