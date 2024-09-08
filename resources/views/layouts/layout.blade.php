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
        @if (Request::segment(1) === 'rate')
            @vite('resources/css/rateTW.css')  
        @endif   
        <link rel="icon" href="{{ URL::asset('favicon.svg') }}" type="image/svg+xml"/>   
    </head>
    <body class="mx-auto max-w-prose bg-twoshk_navy border-b-[1rem] border-b-twoshk_navy">
        <header class="navbar flex-row bg-twoshk_navy text-guruIvory ">
            <div >
                <img  src="{{ Vite::asset('resources/images/review-guru-icon.svg')}}" class="h-16 mx-2 md:mx-8" alt="logo">
            </div>
            <div class="flex-col items-start">
                <h1 class="font-bold text-lg">Two Shakes Review
                <span class=" block italic text-base">Fast Feedback</span>
            </h1>
            </div>        
        </header>      
        @php
        // dump(session()->all())      
        @endphp
        <div class="bg-zinc-50 w-[96%] h-[96%] m-auto p-2">
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
            <footer class="relative top-full w-full mx-auto">
                <div id="copyright" class="text-center mt-4">
                    <div class="text-[.75rem]">
                        <form id="frmLogout" class="inline-block" action="{{ url('logout') }}" method="POST">
                            @csrf
                            <a href="#"  onclick="document.getElementById('frmLogout').submit();">Logout</a> 
                        </form>
                        | <a href="/policies/privacy">Privacy</a> | <a href="/policies/terms">Terms</a>
                    </div>
                    <p class="mt-4 text-[.65rem] p-0">
                        Another <a href="https://www.mojoimpact.com" class="" target="_blank" rel="noopener">
                        <span class="font-semibold">Mojo Impact<span class="trade"></span></span></a> custom website.<br>
                        Design and development by <a href="https://www.mojoimpact.site" class="link link-hover glow"
                            target="_blank" rel="noopener">
                            <span class="font-semibold ">Mojo Impact Web Development</span></a>
                        <br>
                        Copyright &copy; 2012 &mdash; {{date('Y')}}
                        <span class="font-semibold">Mojo Impact</span>, LLC. All rights
                        reserved.
                    </p>
                </div>
            </footer>         
        </div>
        @vite('resources/js/app.js')
    </body>
</html>