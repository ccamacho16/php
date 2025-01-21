<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Show Client
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                {{-- <div class="p-6 bg-white border-b border-gray-200"> --}}
                <div class="p-6 bg-white border-gray-200">
                    {{-- <h1 class="text-red-500"> Creacion de Clientess </h1> --}}
                    <ul>
                        <li class="my-1"> <strong>DNI:</strong> {{ $client->dni }}</li>
                        <li class="my-1"><strong>Name:</strong> {{ $client->name }}</li>
                        <li class="my-1"><strong>Last Name:</strong> {{ $client->last_name }}</li>
                        <li class="my-1"><strong>Sex:</strong> {{ $client->sex }}</li>
                        <li class="my-1"><strong>Birth Date:</strong> {{ $client->birth_date->format('d-m-Y') }}</li>
                        <li class="my-1"><strong>Home Address:</strong> {{ $client->home_address }}</li>
                        <li class="my-1"><strong>Business Address:</strong> {{ $client->business_address }}</li>
                        <li class="my-1"><strong>Phones:</strong> {{ $client->phones }}</li>
                        <li class="my-1"><strong>Email:</strong> {{ $client->email }}</li>
                        {{-- <li class="my-1"><strong>Type:</strong> {{ $client->type }}</li> --}}
                        <li class="my-1"><strong>Job:</strong> {{ $client->job }}</li>
                        <li class="my-1"><strong>Status:</strong> {{ $client->fStatus() }}</li>
                    </ul>
                </div>
                <div class="flex items-center justify-end p-6">
                    {{-- <form action="{{ route('client.destroy', $client) }}" method="post"> --}}
                    <form id="formSubmit" action="{{ route('client.destroy', $client) }}" method="post">                        
                        <x-xlink-button ref="{{ route('client.index') }}">
                            Back
                        </x-xlink-button>
                        @csrf
                        @method('delete')
                        <x-primary-button type="button" id="btnDelete" class="ml-2">
                            Delete
                        </x-primary-button>                         

                    </form>
                </div>
                @include('components.confirmation') 
            </div>
        </div>
    </div>
</x-app-layout>
