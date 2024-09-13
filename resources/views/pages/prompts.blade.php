<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">      
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')      
</head>
<body>
    @php
    use App\Models\Question;
       $questions =  Question::all();
    @endphp
    @if (session('status'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Success</span> {{ session('status') }}
        </div>       
    @endif
     @foreach ($questions as $question )
        <h2 class="ml-12 text-2xl">Question {{$question->q}}</h2> 
        <form action="/admin/doPrompt" method="POST" id="prompt_form">
            @csrf
            <div class="main__content flex-col border-2">          
        
          <textarea rows="6" class="answer textarea-lg w-full" name="prompt" id="prompt">     
                     {!! html_entity_decode($question->prompt, ENT_NOQUOTES | ENT_HTML5) !!}
          </textarea>
          <input type="hidden" name="question_no" value="{{$question->q}}">   
        </div>
        <div id="navigation" class="items-end my-8">  
            <button id="submit" type="submit" class="btn btn-amber ml-52" >submit</button>
        </div>
      </form>
      @endforeach    
</body>
</html>