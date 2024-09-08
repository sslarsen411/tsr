<x-app-layout>  
    <div class="p-2 bg-red-300 items-center  leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-red-900 text-zinc-50 uppercase px-2 py-1 text-base font-bold mr-3">Oops</span>
        <span class="font-semibold text-red_clouds mr-2 text-left flex-auto">We couldn&apos;t find your email in the {{session('location.company')}} customer database.</span>
    </div>
    @if ($errors->any())
    <div class="mt-8 p-2 bg-red-300 text-red_clouds items-center  leading-none lg:rounded-full flex lg:inline-flex">
      <span class="flex rounded-full bg-red-900 text-zinc-50 uppercase px-2 py-1 text-base font-bold mr-3">Oops</span>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@php
    ray(session()->all())
@endphp
    <div class="main__content flex-col items-center mt-5 border-2">    
        <p class="self-start">You can sign in with yor name and email</p>
        <form class="w-full max-w-lg" action="/register" method="POST">
          @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                  First Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white" 
                id="first_name" name="first_name" type="text" required  value="{{ old('first_name') }}">
                <p class="text-red-500 text-xs italic"></p>
              </div>
              <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                  Last Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                id="last_name" name="last_name" type="text" required  value="{{ old('last_name') }}">
              </div>
            </div>
            <div class="flex flex-wrap -mx-3">
              <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                  Email
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
                id="email" name="email" type="email"   value="{{ old('email', session('email')) }}">                
              </div>
            </div>
            <input type="hidden" name="users_id" value="{{session('location.users_id')}}">
            <input type="hidden" name="location_id" value="{{session('locID')}}">
            <button type="submit"
            class="h-10 float-right my-8 px-4 uppercase text-sm bg-primary border border-l-0 border-blue-700 rounded-r shadow-sm text-blue-50 hover:text-white hover:bg-blue-400 hover:border-blue-400 focus:outline-none">
            submit</button>
          </form>
        <p class="self-start">Or use your Google account</p>
        <a type="button" href="{{ url('auth/google') }}" class="my-4 btn ring-2 bg-gray-100 !text-blue-900 text-xl rounded-lg hover:bg-zinc-100 hover:!text-teal-400">
            <img src="{{ Vite::asset('resources/images/google-logo.svg')}}" class="inline-block h-8 hover:animate-spin" alt="Google aproved logo">Sign in with Google
        </a>    
    </div>
</x-app-layout>