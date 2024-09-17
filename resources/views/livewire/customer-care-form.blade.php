<div>
    <x-form action="/doCare">  
        <div class="main__content flex-col border-2">            
          <p class="self-start mb-3">
            Please share your thoughts and concerns with us. 
         </p>
          <textarea rows="4" class="answer textarea-lg"  wire:model.live="concerns" x-data="{ name: '{{$concerns}}' }" id="concerns">{{ $concerns }}         
          </textarea>
          @error('concerns') <span class="error">{{ $message }}</span> @enderror
          <div class="self-start flex items-start mb-4">
            <input id="ckCallMe" wire:model.live="ckCallMe" type="checkbox" value=""  
            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
            <label for="ckCallMe" class="ms-2 text-sm font-medium text-gray-900 ">Would you like us to call you?</label>
        </div>      
        <div id="ph_area" class="w-1/2 self-start {{$ckCallMe?'':'hidden'}}">
          <div class="relative z-0 w-full mb-5 group">
              <input type="tel" wire:model.live="phone" id="phone" placeholder="" 
              class="block py-2.5 px-0 rounded-lg w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 ring-zinc-200 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
             <div class="{{ $ckCallMe && $phone == null? '': 'hidden' }}"><span class="error text-xs text-red-500">Enter a valid US phone number</span></div>
              @error('phone') <span class="error text-xs">{{ $message }}</span> @enderror             
              <label for="phone" class="ml-2 peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0  peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Enter your best phone number:
              </label>
          </div>    
        </div>
        <x-secondary-button type="submit" class="next float-right {{ $concerns?'animate-bounce':'' }}" disable="{{$concerns}}">Submit</x-secondary-button>    
      </x-form>
</div>
