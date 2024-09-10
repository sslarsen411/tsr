<x-app-layout>
    <div class="progress__bar">       
        <progress class="progress progress-secondary w-56 mx-auto" value="{{$question->progress}}" max="100"></progress>       
        </div>         
        <h2>
          {{$question->q}}.   {{$question->title}}
        </h2>
        <form action="/questions" method="POST" id="answer_form">
          @csrf
          <div class="main__content flex-col border-2">            
            <p id="question" class="question self-start">
              {{$question->question}}
            </p> 
            <textarea rows="4" class="answer textarea-lg" onfocus="this.innerText = ''" name="answer" id="answer" >              
            </textarea>
            <input type="hidden" name="question_no" value="{{$question->q}}">   
          </div>
          <div id="navigation" class="items-end my-8">             
              <button id="next" type="submit" class="next btn-disabled" tabindex="0" >Type your answer</button>
          </div>
        </form>
        <h2>
          Assistance &amp; Suggestions
        </h2>
        <div class="help main__content flex-col items-start border-2">
          {!! html_entity_decode($question->prompt, ENT_NOQUOTES | ENT_HTML5 );!!}
        </div>
</x-app-layout>