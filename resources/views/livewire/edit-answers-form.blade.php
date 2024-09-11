<div>
    <table class="w-full border-2 text-sm text-left text-gray-500">      
        @foreach ( $answers  as $key => $answer)  
            <tr>
                <td class="w-12 text-center text-xl bg-slate-900 text-yellow-200 border-b  border-yellow-100">
                    {{$key}}
                </td>
                <td class="pl-4 w-[70%]">
                    
                    <input  type="textbox" col="1" value="{{$answer}}" class="textarea" wire:key="$key" wire:model="answers.{{ $key }}" />               
                </td>
                <td class="text-right align-middle">
                    
                    <x-form action="/doAnEdit" >                    
                        <button class="btn btn-outline">Update</button>
                    </x-form>
                </td>
            </tr>
            @endforeach
    </table>
</div>
