<x-app-layout>
    <div class="progress__bar">       
        <progress class="progress progress-secondary w-56 mx-auto" value="5" max="100"></progress>         
    </div>
    <h2>
    {{ session('cust.first_name')}}, a Two Shakes Review is as easy as 1-2-3:
    </h2> 
    <x-main-content class="border-2">     
        <div id="directions" class="direction grid grid-cols-2 gap-4 px-0">
            <div  class="flex flex-col place-items-start">
                <ol class="list-decimal" start="1">
                    <li>
                        First, you&apos;ll be guided through 8 questions about your experience at  <strong>{{session('location')->company}}</strong>. 
                    </li>
                </ol>
            </div>
            <div>
                <img src="{{ Vite::asset('resources/images/step1.webp')}}" alt="screenshot of the first question page">              
            </div>
            <div>
                <ol class="list-decimal" start="2">
                    <li>
                        Next, our AI will craft your answers into a review.
                    </li>
                    <li class="mt-4 md:mt-16">
                        Finally, you&apos;ll <strong>post</strong> it on <strong>{{session('location')->company}}&apos;s</strong> Google Business profile.
                    </li>
                </ol>
            </div>
            <div class="flex flex-col place-items-center">            
            <img src="{{ Vite::asset('resources/images/results.webp')}}" alt="screenshot of results page with the AI generated review"> 
            </div>  
        </div>    
        <p class="my-4 self-start">That&apos;s it! You&apos;ll be done in <span class="italic font-bold">Two Shakes</span> of a lamb&apos;s tail.</p>      
        <div id="navigation" class="items-end my-8">          
            <a id="next" href="{{route('startQuestions')}}" type="button" class="next animate-bounce" >Start the Questions</a>
        </div>    
    </x-main-content> 
</x-app-layout>
