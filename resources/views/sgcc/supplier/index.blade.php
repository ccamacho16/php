<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            List Supplier
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <h1 class="text-red-500"> Creacion de Clientess </h1> --}}

                    @include('components.alerts')

                    <div>
                        {{-- <a href="{{ route('client.create') }}" class="btn btn-success">New Client</a> --}}
                        <x-xlink-button ref="{{ route('supplier.create') }}">
                            New Supplier
                        </x-xlink-button>

                        {{-- <table class="table table-stripped table-hover"> --}}
                        {{-- <div class="overflow-x-auto relative"> --}}
                        <div class="py-4">
                            @livewire('supplier-index')
                        </div>

             
                    </div>    

                </div>
            </div>
        </div>
    </div>
</x-app-layout>