<x-app-layout>
    @php
    $revArr = unserialize($answer['reviews']);
    @endphp
    <h2>Edit answer # {{$answer['key']}}: {{$question}}</h2>
    <a href="javascript:history.back()" type="button" class="animate-bounce text-base btn btn-info mb-4 w-48 text-center float-right ">Back</a>
    <x-form action="/editAnswer" method="POST" id="edit_form">       
        <div class="main__content flex-col border-2">  
        <textarea class="textarea-lg" name="newAns" id="" cols="30" rows="4">{{$answer['ans']}}</textarea>
        <input type="hidden" name="question_no" value="{{$answer['key']}}">
        <input type="hidden" name="reviews" value="{{$answer['reviews']}}">  
        </div>
        <div id="navigation" class="items-end my-8">             
            <button id="next" type="submit" class="next " >Submit</button>
        </div>
    </x-form>
   
</x-app-layout> 