<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            List Client
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('components.alerts')
                    {{-- @include('partials.confirmation')    --}}
                    <div>
                        <x-xlink-button ref="{{ route('client.create') }}">
                            New Client
                        </x-xlink-button>

                        <div class="py-4">
                            @livewire('client-index')
                        </div>

             
                    </div>    
                    
                </div>

            </div>
        </div>
    </div>

</x-app-layout>


