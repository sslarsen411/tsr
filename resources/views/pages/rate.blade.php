<x-app-layout>
  @php
    //  ray($request);
  @endphp
  <div class="progress__bar">    
    <progress class="progress progress-secondary w-56 mx-auto" value="5" max="100"></progress>  
    <h2>
     To start, how would you rate your overall experience at {{session('location')->company}}?
    </h2>
    <form action="/initReview" method="POST" id="overall-rating-form">
      @csrf
        <div class="main__content flex-col border-2"> 
          <p class="font-semibold">
          Choose from &half; star to 5 stars
          </p>
        <div class="rating rating-lg lg:rating-xl rating-half mx-auto">
          <input type="radio" name="rate" value="0" class="rating-hidden" checked star />
          <input type="radio" name="rate" value="0.5"  class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" name="rate" value="1" class="mask mask-star-2 mask-half-2 star" />
          <input type="radio" name="rate" value="1.5" class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" name="rate" value="2" class="mask mask-star-2 mask-half-2  star" />
          <input type="radio" name="rate" value="2.5" class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" name="rate" value="3" class="mask mask-star-2 mask-half-2 star" />
          <input type="radio" name="rate" value="3.5" class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" name="rate" value="4" class="mask mask-star-2 mask-half-2  star" />
          <input type="radio" name="rate" value="4.5" class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" name="rate" value="5" class="mask mask-star-2 mask-half-2  star" />               
          <input type="hidden" name="customerID" value='{{session('cust.id')}}'>
          <input type="hidden" name="locID" value='{{session('location')->id}}'>
        </div>    
        </div>
        <div id="navigation" class="items-end mt-4 mb-2">          
          <button id="btnRate" type="submit" class="next btn-disabled">Choose a rating</button>
          <div id="dynamic_content" class="w-full mx-auto flex"><p class="text-white mt-4">placeholder</p></div>
        </div>
    </form>
    <h2>
      Assistance &amp; Suggestions
    </h2>
    <div class="main__content flex-col items-start border-2">
      <h3 class="text-lg md:text:xl lg:text-2xl">You can select a full or &frac12; star:</h3>
      <p class="text-lg md:text-xl text-balance">
        Click on the <strong>left side</strong> of a star for a <span class="italic underline">half</span> star 
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
    <script src="{{ Vite::asset('resources/js/stars.js') }}"></script>
</x-layout>