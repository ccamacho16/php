<div>

    {{-- INICIO MODAL CONFIRMACION --}}
    <x-confirmation-array>
        @slot('ruta')
        {{ route('client.destroyindex') }}
        @endslot
    </x-confirmation-array>
    {{-- FIN MODAL CONFIRMACION --}}

    {{-- <input wire:model="busqueda" type="text" placeholder="Search users..."/> --}}
    <div class="grid grid-cols-3 gap-1 my-2 mt-2">        
        <div class="col-span-2">
            <x-text-input   wire:model="search"
                            id="search" 
                            class="w-full"
                            type="text" 
                            placeholder="Search.." 
            /> 
        </div>

        <div class="ml-4">
            <x-xselect wire:model="pagination" name="" id="" class="w-full">    
                <x-slot name="content"> 
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </x-slot>
            </x-xselect>
        </div>
    </div>        

    <x-xtable  >
        <x-slot name="content"> 
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">                            
                <tr>
                    <th scope="col" class="py-3 px-5">Dni</th>
                    <th scope="col" class="py-3 px-6">
                        <div wire:click="sortBy('name')"  class="flex items-center">
                            Name
                            <a href="#"><img src="{{url('/ico/outline/chevron-up-down.svg')}}" width="20" height="20"/></a>
                        </div>                        
                    </th>
                    <th scope="col" class="py-3 px-6">Last Name</th>
                    <th scope="col" class="py-3 px-6">Phones</th>
                    <th scope="col" class="py-3 px-6">Options</th>
                </tr>
            </thead>
            <tbody id='tbody'>
                @foreach ($clients as $client)
                    <tr class="bg-white border-b">
                        <td class="py-4 px-5">{{ $client->dni }}</td>
                        <td class="py-4 px-6 font-bold bg-gray-50">{{ $client->name }}</td>
                        <td class="py-4 px-6">{{ $client->last_name }}</td>
                        <td class="py-4 px-6">{{ $client->phones }}</td>
 
                        <td class="py-3 px-6">
{{--                             <form id="formSubmit" action="{{ route('client.destroy', $client) }}" method="post">
                                <div class="flex flex-wrap content-center">
                                    <a href="{{ route('client.edit', $client) }}">
                                        <img src="{{url('/ico/outline/pencil-square.svg')}}"/>
                                    </a>
                                    <a href="{{ route('client.show', $client) }}" class="mx-1">
                                        <img src="{{url('/ico/outline/eye.svg')}}"/>
                                    </a>
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btnDelete" id="" value="{{ $client->id }}">
                                        <img class="imgdelete" src="{{url('/ico/outline/archive-box-x-mark.svg')}}"/>
                                    </button>
                    
                                </div>
                            </form> --}}
                            <div class="flex flex-wrap content-center">
                                <a href="{{ route('client.edit', $client) }}">
                                    <img src="{{url('/ico/outline/pencil-square.svg')}}"/>
                                </a>
                                <a href="{{ route('client.show', $client) }}" class="mx-1">
                                    <img src="{{url('/ico/outline/eye.svg')}}"/>
                                </a>
                                <button type="button" class="btnDelete" id="" value="{{ $client->id }}">
                                    <img class="imgdelete" src="{{url('/ico/outline/archive-box-x-mark.svg')}}"/>
                                </button>
                
                            </div>                            
                        </td> 
                
                        {{-- la ruta tarea.edit recibe un parametro, nosotros le pasamos el objeto $tarea
                            , laravel autimaticamete toma el id del objeto y lo envia --}}
                        {{-- solo id: $tarea->id; mas parametros: [$tarea,0,$var] --}}    

                    </tr>
                @endforeach
                    
            </tbody>
            
        </x-slot>
    </x-xtable>

    <div class="mt-4">
    {{ $clients->links() }}
    </div>

    
</div>





