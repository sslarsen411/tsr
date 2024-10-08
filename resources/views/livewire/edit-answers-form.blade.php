<div>
    <h3 class="my-2">To edit your answers, type then press the update button</h3>
    
    <table class="w-full border-2 text-sm text-left text-gray-500">      
        @foreach ( $answers  as $key => $answer)  
            <tr>
                <td class="w-12 text-center text-xl bg-slate-900 text-yellow-200 border-b  border-yellow-100" >
                    {{$key + 1 }}
                </td>
                <td class="pl-2 w-[70%]">                    
                    <input  type="textbox" col="2" value="{{$answer}}" class="textarea text-wrap" wire:key.live="$key" wire:model.live="answers.{{ $key }}" />               
                </td>
                <td class="text-right align-middle" >                    
                    <x-form action="/doAnEdit" >                    
                        <button class="btn btn-outline p-1 md:p-4 inline-block mx-auto text-xs md:text-sm w-auto">Update</button>
                    </x-form>
                </td>
            </tr>
            @endforeach
    </table>
</div>