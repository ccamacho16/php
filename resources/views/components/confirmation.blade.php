<div class="hidden fixed z-10 inset-0 overflow-y-auto" id="confirm-modal">
    {{-- opacidad de fondo de modal --}}
    <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    {{-- centrado en el eje x --}}
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        {{-- para que vaya centrado eje y --}}
        <span class="hidden bg-green-400 sm:inline-block sm:align-middle sm:h-screen" >&#8203;</span>
    
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div class="flex">
                <div class="flex items-center w-1/5">
                    
                    <div class="mx-auto flex items-center justify-center h-12 w-12 ">
                        <!-- Icono de confirmación aquí -->
                        <img src="{{url('/ico/outline/exclamation-triangle.svg')}}" height="50" width="50"/>
                    </div>
                </div>										
                <div class="text-left">
                    <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">
                    ¿You're sure?
                    </h3>
                    <div class="mt-2">
                    <p class="text-base text-gray-500">
                        Confirm the action for the changes to be executed
                    </p>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-5 sm:mt-6">
                <x-xbutton-cancel type="button" class="ml-3" id="btnCancel">
                    Cancel
                </x-xbutton-cancel>
                <x-xbutton-accept class="ml-3 focus:border-blue-900 ring-blue-300 active:bg-blue-900 hover:bg-blue-700 bg-blue-600" type="button" id="btnConfirm">
                    Confirm
                </x-xbutton-accept>									                
            </div>
        </div>
    </div>
</div>