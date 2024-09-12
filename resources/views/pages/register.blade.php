<x-app-layout>  
    {{-- <div class="p-2 bg-rose-200 items-center  leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-red-900 text-zinc-50 uppercase px-2 py-1 text-base font-bold mr-3">Oops!</span>
        <span class="font-semibold text-red_clouds mr-2 text-left flex-auto">
          We couldn&apos;t find you in the database. Please sign in.
        </span>
    </div>
    @if ($errors->any())
    <div class="mt-8 p-2 bg-rose-200 text-red_clouds items-center  leading-none lg:rounded-full flex lg:inline-flex">
      <span class="flex rounded-full bg-red-900 text-zinc-50 uppercase px-2 py-1 text-base font-bold mr-3">Oops!</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
 //   ray(session()->all())
@endphp --}}
  <x-main-content class="border-2">       
    <p class="self-start">You can sign in with yor name and email</p>
    <livewire:sign-in-form />
    <p class="self-start">Or use your Google account</p>
    <a type="button" href="{{ url('auth/google') }}" class="my-4 btn ring-2 bg-gray-100 !text-blue-900 text-xl rounded-lg hover:bg-zinc-100 hover:!text-teal-400">
        <img src="{{ Vite::asset('resources/images/google-logo.svg')}}" class="inline-block h-8 hover:animate-spin" alt="Google aproved logo">Sign in with Google
    </a>    
  </x-main-content>  
</x-app-layout>