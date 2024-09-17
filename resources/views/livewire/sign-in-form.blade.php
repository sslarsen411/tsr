<div>
    <x-form class="w-full max-w-lg" action="/register">          
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            First Name
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white" 
          id="first_name" wire:model.live="first_name" type="text" value="{{ old('first_name') }}">
          @error('first_name') <span class="error text-xs">{{ $message }}</span> @enderror
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            Last Name
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
          id="last_name" wire:model.live="last_name" type="text" value="{{ old('last_name') }}">
        @error('last_name') <span class="error text-xs">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="flex flex-wrap -mx-3">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            Email
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4  leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
          id="email" wire:model.live="email" type="email">
          @error('email') <span class="text-xs error">{{ $message }}</span> @enderror                
        </div>
      </div>  
      <x-secondary-button type="submit"  class="mt-5 float-right">
        Sign In
      </x-secondary-button>   
    </x-form>
</div>
