<x-layout>  
    <div class="p-2 bg-red-300 items-center  leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-red-900 text-zinc-50 uppercase px-2 py-1 text-base font-bold mr-3">Sorry!</span>
        <span class="text-xl font-semibold text-red_clouds mr-2 text-left flex-auto">
            We&apos;re unable to process any reviews  for <span class="text-black font-bold">{{session('company')}}</span> right now.
        </span>
    </div>
    <p class="text-xl mt-4">
        Try back later.
    </p>
</x-layout>