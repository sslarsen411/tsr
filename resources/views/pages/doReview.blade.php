<x-app-layout> 
    @php
        $rev = unserialize($review->answers);  
        ray(session()->all())
    @endphp
    <h2 class="align-middle">
        {{session('cust.first_name')}}, you&apos;re almost done.
    <a href="/finish" type="button" class="animate-bounce text-base btn btn-success mb-4 text-center float-right ">Generate</a>
</h2>
<h3 class="mb-9 font-semibold">Click or tap the <span class="text-success font-weight-700">green</span> button to generate your review</h3>
<div id="accordion-edit" data-accordion="collapse">
    <h2 id="accordion-collapse-heading-1">
      <button type="button"       data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1"
      class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0  border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200  hover:bg-gray-100  gap-3">
        <span class="text-base">Update Your Answers</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
        <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <livewire:edit-answers-form  :answers="$rev" :reviewID="session('reviewID')"/>
        </div>
    </div> 
  </div>
  <script>
        document.getElementById('accordion-collapse-heading-1').addEventListener('click', function (e) {
            if ( document.getElementById('accordion-collapse-body-1').classList.contains("hidden"))
                document.getElementById('accordion-collapse-body-1').classList.remove("hidden")
            else           
                document.getElementById('accordion-collapse-body-1').classList.add("hidden")            
        })
  </script>
  


</x-app-layout>