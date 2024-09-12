<x-app-layout> 
    <x-main-content class="border-2">   
    <h1 class="text-4xl text-red_clouds">Sorry!</h1>
    <img src="{{ Vite::asset('resources/images/forbidden.webp')}}" alt="error icon image">
    <p class="text-xl">
        We&apos;re unable to process any reviews  for <span class="text-red_clouds font-bold">{{session('company')}}</span> right now.
    </p>
    <p class="text-xl mt-4">
        Try back later.
    </p>
</x-main-content>  
</x-app-layout>