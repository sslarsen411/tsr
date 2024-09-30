<!DOCTYPE html>
<html p lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">      
        <title>Two Shakes Review | Craft a Great Review in Minutes</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        @vite('resources/css/app.css')
        @stack('styles') 
        <link rel="icon" href='favicon.svg'" type="image/svg+xml"/>   
        {{-- <link rel="icon" href="{{ URL::asset('favicon.svg') }}" type="image/svg+xml"/>    --}}
    </head>
    <body class="mx-auto max-w-prose bg-twoshk_navy border-b-[1rem] border-b-twoshk_navy">
        @php
          //  ray(session()->all());
        @endphp
        <x-header /> 
        <div class="bg-zinc-50 w-[96%] h-[96%] m-auto p-2">
        {{-- ALERTS --}}
            @foreach (['error', 'info', 'success', 'warn'] as $msg)
                @if(Session::has('alert-' . $msg))
                <div class="text-2xl alert alert-{{ $msg }}">
                {{ Session::get('alert-' . $msg) }}
                </div>
                @endif
            @endforeach
            <section class="main">
                {{$slot}}
            </section>              
        </div>
        <x-footer />  
        @stack('scripts')
        @vite('resources/js/app.js') 
        @livewireScriptConfig         {{-- Manually bundling Alpine  --}}
        @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@11"])
        <x-livewire-alert::scripts />        
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>        
        <x-livewire-alert::scripts />
    </body>
</html>