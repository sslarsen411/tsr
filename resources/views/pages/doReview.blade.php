<x-app-layout> 
    <h2 class="align-middle">
        {{session('cust.first_name')}}, you&apos;re almost done!
    <a href="/finish" type="button" class="animate-bounce text-base btn btn-success mb-4 text-center float-right ">Generate</a>
</h2>
<h3 class="mb-9 font-semibold">Click or tap the <span class="text-success font-weight-700">green</span> button to generate your review</h3>
{{-- <div x-data="{ hover: false }">
  <span x-on:mouseover="hover = true" x-on:mouseout="hover = false">Hover Here</span>
  <span x-show="hover">Shows on Hover</span>
</div> --}}
<div class="w-full divide-y divide-stone-300 overflow-hidden rounded-xl border border-slate-300 bg-stone-100/40 text-slate-700">
  <div x-data="{ isExpanded: false }" class="divide-y divide-slate-300 dark:divide-slate-700">
      <button id="controlsAccordionItemOne" type="button" class="flex w-full items-center justify-between gap-4 bg-stone-100 p-4 text-left underline-offset-2 
      hover:bg-stone-200/75 focus-visible:bg-slate-100/75 focus-visible:underline focus-visible:outline-none"  aria-controls="accordionItemOne" 
      @click="isExpanded = ! isExpanded" :class="isExpanded ? 'text-onSurfaceStrong  font-bold'  : 'text-onSurface font-medium'" :aria-expanded="isExpanded ? 'true' : 'false'">
      @desktop
          Click
        @elsedesktop
          Tap 
        @enddesktop 
        to see your answers
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor" class="size-5 shrink-0 transition" 
               aria-hidden="true" :class="isExpanded  ?  'rotate-180'  :  ''">
             <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
          </svg>
      </button>
      <div x-cloak x-show="isExpanded" id="accordionItemOne" role="region" aria-labelledby="controlsAccordionItemOne" x-collapse>
          <div class="p-4 text-sm sm:text-base text-pretty">
            <livewire:edit-answers-form />
          </div>
      </div>
  </div>
</div>
</x-app-layout>