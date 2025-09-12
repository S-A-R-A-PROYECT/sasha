<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white antialiased">
    <div class="bg-background min-h-svh"
        style="background: url({{asset('imgs/SASHA-SARA.png')}}); background-repeat: no-repeat;background-size: cover;">
        <div
            class="bg-slate-500/60 w-full h-full absolute flex  flex-col items-center justify-center gap-6 p-6 md:p-10">
            <div class="">
                <img src="{{asset('imgs/2-bg.png')}}" class="w-64" alt="">
            </div>
            <div class="flex w-full max-w-sm flex-col gap-2 bg-white p-12 rounded-xl">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>
                <div class="flex flex-col gap-6">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
    @fluxScripts
</body>

</html>