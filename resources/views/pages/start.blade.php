<x-app-layout>  
    <h2>
        Thank You on behalf of {{session('location.company')}}.
    </h2> 
    <h3 class="text-base md:text-lg mb-2">
        This web app makes it <strong><em>quick</em></strong> and <strong>easy</strong> to share feedback about your experience.  
    </h3>
    <div class="main__content flex-col items-center mt-5 border-2">    
        <p class="self-start">To begin, sign in with your email address*</p>
        <x-form action="/initialize">
            <div class="flex items-center mt-1">
                <input type="email" id="email" name="email" required  pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
                       class="w-full h-10 px-3 text-sm text-gray-700 border border-r-0 rounded-r-none border-blue-500 focus:outline-none rounded shadow-sm" 
                        placeholder="your.name@gmail.com"
                        onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'your.name@gmail.com'"
                        />
                        <x-secondary-button type="submit" class="!text-xs self-start rounded-nome h-11">
                            {{-- {{$button}} --}} Start
                       </x-secondary-button>  
                {{-- <button type="submit"
                class="h-10 px-4 uppercase text-sm bg-twoshk_navy border border-l-0 border-blue-700 rounded-r shadow-sm text-blue-50 hover:text-white hover:bg-blue-400 hover:border-blue-400 focus:outline-none">
                start</button> --}}
            </div>
        </x-form>
      <p class="!text-xs self-start">
        * Use the email {{session('location.company')}} has on file. If you&apos;re not sure, don&apos;t worry, just use your regular
        email. We can add it if need-be.
    </p>
    </div>    
    <div id="navigation" class="items-end my-2 mx-auto"> 
        <p>Feedback in &ldquo;<strong>two shakes</strong> of a lamb&apos;s tail.&rdquo;</p>

        <img src="{{ Vite::asset('resources/images/two-shakes-lambs-md.webp')}}" alt="Our mascot, the Two Shakes AI lamb">
    </div>    
</x-app-layout>