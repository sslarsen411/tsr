<x-app-layout>
  <p class="text-xl mb-3">
      It looks like your experience may not have met your expectation. We want to hear about it. 
  </p>
  <p class="mb-3">
      As a valued customer, we&apos;re committed to addressing your concerns and working together to find solutions that ensure a better experience for you.
  </p>
  <livewire:customer-care-form/>
  <script src="{{ Vite::asset('resources/js/care.js') }}"></script>
@endif
</x-layout>