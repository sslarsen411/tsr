<x-layout>
  @if (session()->has('info'))
  <div class="container container-narrow">
   <div class="alert alert-info border border-green-400 text-green-700 text-senter px-4 py-3 rounded relative">
     {{session('info')}}
   </div>
  </div>
@elseif(session()->has('error'))
 <div class="container container--narrow">
   <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert"r">
     {{session('error')}}
   </div>
 </div>
@endif
  <h2>Customer Care</h2>  
  @php
    //  dump(session()->all());
  @endphp 
@if (session()->has('info'))
    <p>A acknowledgement email has been sent to {{session('cust.email')}}. You&apos;ll be contacted shortly.</p>
    <p>You can contact us at {{session('location.company')}} by phone: {{fromE164(session('location.ctc_phone'))}}, or email: {{session('location.email')}}.</p>
@else
    <p class="text-xl mb-3">
      It looks like your experience may not have met your expectation. We want to hear about it. 
   </p>
   <p class="mb-3">
      As a valued customer, we&apos;re committed to addressing your concerns and working together to find solutions that ensure a better experience for you.
   </p>
    <form action="/doCare" method="POST" id="customer_care_form">
      @csrf
      <div class="main__content flex-col border-2">            
        <p class="self-start mb-3">
          Please share your thoughts and concerns with us. 
       </p>
        <textarea rows="4" class="answer textarea-lg"  name="concerns" id="concerns">{{ old('concerns', session('concerns')) }}         
        </textarea>
        <div class="self-start flex items-start mb-4">
          <input id="ckCallMe" name="ckCallMe" type="checkbox" value="" {{session('ckbox')?session('ckbox'):''}}
          class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
          <label for="ckCallMe" class="ms-2 text-sm font-medium text-gray-900 ">Would you like us to call you?</label>
      </div>      
      <div id="ph_area" class="w-1/2 self-start {{session('ckbox')?'':'hidden'}}">
        <div class="relative z-0 w-full mb-5 group">
            <input type="tel" name="phone" id="phone" placeholder="" 
            class="block py-2.5 px-0 rounded-lg w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 ring-zinc-200 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
            <label for="floating_phone" class="ml-2 peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0  peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
              Enter your best phone number:
            </label>
        </div>    
      </div>
      <button id="next" type="submit" class="self-end next btn-disabled" tabindex="0" >Type your answer</button>
    </form>
    <script src="{{ Vite::asset('resources/js/care.js') }}"></script>
@endif
{{-- @php
    $link = getShorty('https://twoshakes.test?loc=01', 'test');
    echo $link['shorturl'];
@endphp --}}
</x-layout>