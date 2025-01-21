<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Branch
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200">
                    <ul>
                        <li class="my-1"><strong>Name:</strong> {{ $branch->name }}</li>
                        <li class="my-1"><strong>Country:</strong> {{ $branch->country }}</li>
                        <li class="my-1"><strong>City:</strong> {{ $branch->city }}</li>
                        <li class="my-1"><strong>Address:</strong> {{ $branch->address }}</li>
                        <li class="my-1"><strong>Code:</strong> {{ $branch->code }}</li>
                        <li class="my-1"><strong>Phones:</strong> {{ $branch->phones }}</li>
                        <li class="my-1"><strong>Status:</strong> {{ $branch->fStatus() }}</li>

                    </ul>
                </div>
                <div class="flex items-center justify-end p-6">
                    <form id="formSubmit" action="{{ route('branch.destroy', $branch) }}" method="post">
                        <x-xlink-button ref="{{ route('branch.index') }}">
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