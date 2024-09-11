<div>
    <x-form action="/initReview" >      
        <div class="main__content flex-col border-2"> 
          <p class="font-semibold">
          Choose from &half; star to 5 stars
          </p>
        <div class="rating rating-lg lg:rating-xl rating-half mx-auto">
          <input type="radio" wire:model.live="rating" value="0" class="rating-hidden" checked star />
          <input type="radio" wire:model.live="rating" value="0.5"  class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" wire:model.live="rating" value="1" class="mask mask-star-2 mask-half-2 star" />
          <input type="radio" wire:model.live="rating" value="1.5" class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" wire:model.live="rating" value="2" class="mask mask-star-2 mask-half-2  star" />
          <input type="radio" wire:model.live="rating" value="2.5" class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" wire:model.live="rating" value="3" class="mask mask-star-2 mask-half-2 star" />
          <input type="radio" wire:model.live="rating" value="3.5" class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" wire:model.live="rating" value="4" class="mask mask-star-2 mask-half-2  star" />
          <input type="radio" wire:model.live="rating" value="4.5" class="mask mask-star-2 mask-half-1 star" />
          <input type="radio" wire:model.live="rating" value="5" class="mask mask-star-2 mask-half-2  star" />               
          <input type="hidden" name="customerID" value='{{session('cust.id')}}'>
          <input type="hidden" name="locID" value='{{session('locID')}}'>
        </div>    
        </div>
        <div id="navigation" class="items-end mt-4 mb-2">          
          {{-- <button id="btnRate" type="submit" class="next btn-disabled">Choose a rating</button> --}}
          <x-secondary-button type="submit" class="next float-right" >Start</x-secondary-button>
          {{-- <div id="dynamic_content" class="w-full mx-auto flex"><p class="text-white mt-4">placeholder</p></div> --}}
          <div id="dynamic_content" class="w-full mx-auto flex">
            <p class=" mt-4">
                @if ($rating)
                    You gave us <strong>{{ $rating }}</strong> {{ Str::plural('star', $rating) }}. Now click the <span class="text-primary">NEXT</span> button.
                @else 
                    Choose a rating.
                @endif
            </p>
            
        </div>
        </div>
    </x-form>
</div>
