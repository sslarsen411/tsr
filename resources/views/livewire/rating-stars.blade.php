<div>
    <x-form  >      
        <div class="main__content flex-col border-2"> 
          <p class="font-semibold">
          Choose from &half; star to 5 stars
          </p>
            <div class="rating rating-lg lg:rating-xl rating-half mx-auto"  x-data="{ rating: false }">
                <input type="radio" wire:model.live="rating" value="0" class="rating-hidden" checked star x-model="rating" />
                <input type="radio" wire:model.live="rating" value="0.5"  class="mask mask-star-2 mask-half-1 star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="1" class="mask mask-star-2 mask-half-2 star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="1.5" class="mask mask-star-2 mask-half-1 star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="2" class="mask mask-star-2 mask-half-2  star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="2.5" class="mask mask-star-2 mask-half-1 star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="3" class="mask mask-star-2 mask-half-2 star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="3.5" class="mask mask-star-2 mask-half-1 star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="4" class="mask mask-star-2 mask-half-2  star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="4.5" class="mask mask-star-2 mask-half-1 star" x-model="rating" />
                <input type="radio" wire:model.live="rating" value="5" class="mask mask-star-2 mask-half-2  star" x-model="rating" />               
                <input type="hidden" name="customerID" value='{{session('cust.id')}}'>
                <input type="hidden" name="locID" value='{{session('locID')}}'>       
                @error('rating') <span class="error">{{ $message }}</span> @enderror
                <x-secondary-button type="submit" class="ml-2 next  {{ $rating?'animate-bounce':'' }}" 
                                    x-bind:disabled="!rating" x-text="rating ? 'Start': 'Choose'" >Start</x-secondary-button>
            </div> 
           
        </div>
        <div id="navigation" class="items-end mt-4 mb-2">       
            <div id="dynamic_content" class="w-full mx-auto flex">
                <p class=" mt-4">
                    @if ($rating)
                        You gave us <strong>{{ $rating }}</strong> {{ Str::plural('star', $rating) }}. Now press the <span class="text-primary">START</span> button to begin.
                    @else 
                        Choose your stars.
                    @endif
                </p>
            </div>
        </div>
    </x-form>
</div>
