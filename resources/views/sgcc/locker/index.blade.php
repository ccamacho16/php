<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-2 items-center lg:grid-cols-4">
{{--             <div class="hidden lg:block">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight ">

                    Locker Control
                </h2>
            </div> --}}
            <div class="flex col-span-2 justify-start items-center lg:col-span-2 ">
                <form action="{{ route('locker.clear') }}" method="POST" id="formCreateLockers">
                    @csrf
                    <button type="button" class="mr-2 p-2 bg-gray-100 rounded-full hover:bg-gray-300 active:bg-gray-400 shadow-md" id="btnCreatelockers" value="">
                        <img class="" src="{{url('/ico/outline/squares-plus.svg')}}"/>
                    </button>
                </form>                                
                {{-- El form y el boton son utilizados en el JS del componente modal de confirmacion. --}}
                <form action="{{ route('locker.clear') }}" method="POST" id="formClearLockers">
                    @csrf
                    <button type="button" class="mr-4 p-2 bg-gray-100 rounded-full hover:bg-gray-300 active:bg-gray-400 shadow-md lg:mr-6" id="btnClearLockers" value="">
                        <img class="" src="{{url('/ico/outline/trash.svg')}}"/>
                    </button>
                </form>

                <div class="flex gap-1 mr-4 lg:mr-6">
                    <div class=" flex items-center justify-center center border border-1 w-12 h-10 border-gray-500 bg-blue-400  rounded-l-2xl font-semibold text-lg shadow-md lg:w-14">
                        <span class="" id="in_use">
                        </span>
                    </div>
                    <div class="flex items-center justify-center border border-1 w-12 h-10 border-gray-500  rounded-r-2xl  font-semibold text-lg text-center shadow-md lg:w-14"><span id="available"></span></div>
                </div>                  

                <div class="flex gap-1">
                    <select name="" id="slcTime" class="h-10 font-semibold  rounded-l-2xl border-gray-500 shadow-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="60">60</option>
                        <option value="90">90</option>
                        <option value="120">120</option>
                    </select>

                    <button type="button" id="btnTime" class=" px-3 shadow-md rounded-r-2xl border border-gray-600 bg-orange-400  hover:bg-orange-500 active:bg-orange-700  focus:border-orange-700  focus:ring ring-orange-300 " >
                        <img class="" width="20" height="20" src="{{url('/ico/outline/clock.svg')}}"/>
                    </button>							
                </div>                  
            </div>            

            <div class="col-span-2 order-last mt-2 lg:order-none lg:mt-0">
                <form>   
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <img id="" class="w-5 h-5" src="{{url('/ico/outline/magnifying-glass.svg')}}"/>
                        </div>
                        <x-text-input id="textSearch" class="block mt-1 w-full p-3 pl-10" type="search" name="namelocker" placeholder="Search..." autofocus/>
                        <x-xbutton-accept class="absolute right-2.5 shadow-md bg-green-600 hover:bg-green-700 active:bg-green-900  focus:border-green-900  focus:ring ring-green-300 bottom-2" type="button" id="btnSearch">
                            Search
                        </x-xbutton-accept>									
                    </div>
                </form>
            </div>                    

        </div>
    </x-slot>

    @include('components.confirmation') 

    <div class="hidden fixed z-10 inset-0 overflow-y-auto" id="modal-create">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden bg-green-400 sm:inline-block sm:align-middle sm:h-screen" >&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">
                <form action="{{ route('locker.create') }}" id="formLockersCreate" method="POST" > 
                    {{-- <form action="#" id="formLockersCreate" method="POST" >   --}}                  
                        @csrf
                        <div class="my-2 mt-4">
                            <x-input-label for="numLockers" value="Number of Lockers  Min:1 ; Max:60" />
                            <div class="flex ">
                                <div  class="w-full">
                                    <x-text-input id="numLockers" class="mt-1 w-full h-12 text-2xl text-center" type="number" min="1" max="60" value="30" name="numLockers" autofocus/> 
                                </div>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 mt-5 sm:mt-6">
                            <x-xbutton-cancel class="h-12 w-full focus:border-green-900 ring-green-300 active:bg-green-900 hover:bg-green-700 bg-green-600" type="button" id="btnCancelCreate">
                                Cancel
                            </x-xbutton-cancel>								          
                            <x-xbutton-accept class="h-12" type="submit" id="btnSaveCreate">
                                Save
                            </x-xbutton-accept>			
                        </div>
                </form>
            </div>
        </div>
    </div> 

    <div class="hidden fixed z-10 inset-0 overflow-y-auto" id="modal-locker">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <span class="hidden bg-green-400 sm:inline-block sm:align-middle sm:h-screen" >&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                {{-- <form action="{{ route('locker.saveLocker') }}" id="formlocker" method="POST" > --}}
                    <form action="#" id="formlocker" method="POST" >                    
                        @csrf
                        <div class="relative">
                            {{-- <div class="flex justify-end bg-gray-400 absolute z-10"> --}}
                            <div class="flex right-0 absolute z-10">
                                <img id="btnClose" class="hover:bg-gray-100 active:bg-gray-200" class="" src="{{url('/ico/outline/x-mark.svg')}}"/>
                            </div>
                            <div id="timelocker" class="absolute z-10 top-1/2 left-0 transform -translate-y-1/2 text-sm">
                                <div class=""><span id="accesslocker" ></span></div>
                                <div class=""><span id="uselocker" ></span></div>
                            </div>
                            <div class="text-4xl py-2 text-center font-bold border-b-2 border-gray-200 lg:text-6xl">
                                <span class="" id="idlockertext" name="idlockertext"></span>
                            </div>
                        </div>
                        <input type="hidden" name="idlocker" id="idlocker">
                        <div class="my-2 mt-4">
                            <div>
                                <x-input-label for="namelocker" value="Name" />
                                <div  class="flex items-center">
                                    <x-text-input id="namelocker" class="mt-1 w-full " type="text" name="namelocker" value="" autofocus/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="my-2 mt-4">
                            <div class="col-span-2">
                                <x-input-label for="descriptionlocker" value="Description" />
                                <x-xtextarea id="descriptionlocker" class="block mt-1 w-full" rows="2" name="descriptionlocker">  
                                    <x-slot name="content">                                         
                                    </x-slot>
                                </x-xtextarea>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-2 mt-5 sm:mt-6">
                            <div class="flex items-center gap-1">
                                <div class="w-1/3 mx-1 lg:w-1/5">
                                    <button type="button" class="rounded-lg h-12 p-2 border-2 hover:bg-gray-200 active:bg-gray-400 focus:outline-none 
                                    focus:border-gray-500 
                                    focus:ring ring-gray-300" id="btnClear" value="">
                                        <img class="" src="{{url('/ico/outline/archive-box.svg')}}"/>
                                    </button>
                                </div>
                                <div class="w-2/3 lg:w-4/5">
                                    <x-xbutton-cancel class="h-12 w-full focus:border-green-900 ring-green-300 active:bg-green-900 hover:bg-green-700 bg-green-600" type="submit" id="btnFree">
                                        Free
                                    </x-xbutton-cancel>								          
                                </div>
                            </div>                                
                            <x-xbutton-accept class="h-12" type="submit" id="btnSave">
                                Save
                            </x-xbutton-accept>			
                            
                        </div>
                </form>
            </div>
        </div>
    </div> 


    <div class="lg:py-8">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    {{-- DESARROLLO --}}
                    <div class="bg-gray-200 p-2 rounded-lg">
                        <div class="grid grid-cols-2 gap-1 lg:grid-cols-5">
                            @foreach ($lockers as $locker)
                                
                                    <x-lockerpanel>
                                        @slot('id') {{ $locker->id }} @endslot
                                        @slot('number') {{ $locker->number }} @endslot
                                        @slot('name') {{ $locker->name }} @endslot
                                        @slot('time_access') {{ Str::substr($locker->time_access, 0, 5)  }} @endslot
                                        @slot('description') {{ $locker->description }} @endslot
                                    </x-lockerpanel>                     

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>