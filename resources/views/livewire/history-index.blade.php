<div>
    <div class="grid grid-cols-2 gap-1 my-2 mt-2 sm:grid-cols-5">        
        <div class="col-span-2 relative sm:col-span-3">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <img id="" class="w-5 h-5" src="{{url('/ico/outline/magnifying-glass.svg')}}"/>
            </div>
            <x-text-input   wire:model="search"
                            id="search" 
                            class="w-full pl-10"
                            type="text" 
                            placeholder="Search.." 
            /> 
        </div>
        <div class="sm:ml-4">
            <x-text-input   wire:model="date"
                            id=""               
                            class="w-full"
                            type="date" 
                            value="{{ date('Y-m-d') }}"
            /> 
        </div>        
        <div class="sm:ml-4">
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
    <div class="overflow-x-auto">
        <x-xtable  class="">
            <x-slot name="content"> 
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">                            
                    <tr>
                        {{-- <th scope="col" class="py-3 px-5 text-center">Date</th> --}}
                        {{-- <th scope="col" class="py-3 px-6">
                            <div wire:click="sortBy('name')"  class="flex items-center">
                                Name
                                <a href="#"><img src="{{url('/ico/outline/chevron-up-down.svg')}}" width="20" height="20"/></a>
                            </div>                        
                        </th> --}}

                        <th scope="col" class="py-3 px-6 text-center">Locker</th>
                        <th scope="col" class="py-3 px-6 text-center">Name</th>
                        <th scope="col" class="py-3 px-6 text-center">Desription</th>
                        <th scope="col" class="py-3 px-6 text-center">CheckIn</th>
                        <th scope="col" class="py-3 px-6 text-center">CheckOut</th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                    @foreach ($histories as $history)
                        <tr class="bg-white border-b">
                            {{-- <td class="py-4 px-5 text-center">{{ $history->date }}</td> --}}
                            {{-- <td class="py-4 px-6 font-bold bg-gray-50">{{ $history->name }}</td> --}}

                            <td class="py-4 px-6 text-center font-bold bg-gray-50">{{ $history->locker }}</td>
                            <td class="py-4 px-6 font-bold bg-gray-50">{{ $history->name }}</td>
                            <td class="py-4 px-6">{{ $history->description }}</td>
                            <td class="py-4 px-6 text-center">{{ $history->check_in }}</td>
                            <td class="py-4 px-6 text-center">{{ $history->check_out }}</td>                            

                        </tr>
                    @endforeach
                        
                </tbody>
                
            </x-slot>
        </x-xtable>    
    </div>  

    <div class="mt-4">
        {{ $histories->links() }}
    </div>
</div>
