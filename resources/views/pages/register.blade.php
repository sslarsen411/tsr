<x-app-layout>
  <x-main-content class="border-2">       
    <p class="self-start">You can sign in with yor name and email</p>
    <livewire:sign-in-form />
    <p class="self-start">Or use your Google account</p>
    <a type="button" href="{{ url('auth/google') }}" class="my-4 btn ring-2 bg-gray-100 !text-blue-900 text-xl rounded-lg hover:bg-zinc-100 hover:!text-teal-400">
        <img src="{{ Vite::asset('resources/images/google-logo.svg')}}" class="inline-block h-8 hover:animate-spin" alt="Google aproved logo">Sign in with Google
    </a>    
  </x-main-content>  
</x-app-layout>