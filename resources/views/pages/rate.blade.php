<x-app-layout>
  @push('styles')
  @vite(['resources/css/rateTW.css'])
@endpush
  <div class="progress__bar">    
    <progress class="progress progress-secondary w-56 mx-auto" value="5" max="100"></progress>  
    <h2>
      {{session('cust.first_name')}}, to begin, how would you rate your overall experience at {{session('location.company')}}?
    </h2>
    <livewire:rating-stars />
    <h2>
      Help
    </h2>
    <div class="main__content flex-col items-start border-2">
      <h3 class="text-lg md:text:xl lg:text-2xl">You can select <strong>full</strong> or <strong>&frac12;</strong> stars:</h3>
      <p class="text-lg md:text-xl text-balance">
        @desktop
          Click
        @elsedesktop
          Tap 
        @enddesktop
        on the <strong>left side</strong> of a star for a <span class="italic underline">half</span> star 
        <picture class="inline-block align-middle my-0"> 
            <source media="(max-width: 766px)" srcset="{{ Vite::asset('resources/images/star-half-sm.webp')}}">
            <source media="(min-width: 768px)" srcset="{{ Vite::asset('resources/images/star-half-md.webp')}}">
            <img src="{{ Vite::asset('resources/images/star-half-sm.webp')}}" alt="Mouse pointer on the left half of a star icon" class="sm:w-auto"> 
        </picture> 
        and on the <strong>right side</strong> for a full star 
        <picture class="inline-block align-middle my-0"> 
          <source media="(max-width: 766px)" srcset="{{ Vite::asset('resources/images/star-full-sm.webp')}}">
          <source media="(min-width: 768px)" srcset="{{ Vite::asset('resources/images/star-full-md.webp')}}">
          <img src="{{ Vite::asset('resources/images/star-full-sm.webp')}}" alt="Mouse pointer on the right half of a star icon" class="sm:w-auto"> 
        </picture>
      </p>
    </div>
</x-layout>