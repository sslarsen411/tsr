<div>
    <div class="progress__bar">       
        <progress class="progress progress-secondary w-56 mx-auto" value="{{$question->progress}}" max="100"></progress>       
    </div>         
    <h2>
        {{$question->q}}.   {{$question->title}}
    </h2>
    <x-main-content class="border-2">    
        <x-form action="/questions" >        
            <div class="main__content flex-col border-2">            
                <p id="question" class="question self-start">
                    {{$question->question}}
                </p> 
                <textarea rows="4" class="answer textarea-lg"  wire:model.live="answer" id="answer" ></textarea>
                @error('answer') <span class="error">{{ $message }}</span> @enderror

            </div>
            <div id="navigation" class="items-end my-8">       
                <x-secondary-button type="submit" class="float-right">
                    Next
                </x-secondary-button>    
            </div>
        </x-form>
        <h2 class="w-full">
            Suggestions &amp; Examples
        </h2>
          <div class="help main__content flex-col items-start border-2">
            {!! html_entity_decode($question->prompt, ENT_NOQUOTES | ENT_HTML5 );!!}
          </div>
      </x-main-content> 
</div>
