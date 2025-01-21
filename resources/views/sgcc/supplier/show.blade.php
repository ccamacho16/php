<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Supplier
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200">
                    <ul>
                        <li class="my-1"> <strong>TIN:</strong> {{ $supplier->tin }}</li>
                        <li class="my-1"><strong>Name:</strong> {{ $supplier->name }}</li>
                        <li class="my-1"><strong>Address:</strong> {{ $supplier->address }}</li>
                        <li class="my-1"><strong>City:</strong> {{ $supplier->city }}</li>
                        <li class="my-1"><strong>Phones:</strong> {{ $supplier->phones }}</li>
                        <li class="my-1"><strong>Email:</strong> {{ $supplier->email }}</li>
                        <li class="my-1"><strong>Bank Account:</strong> {{ $supplier->account }}</li>
                        <li class="my-1"><strong>Contact:</strong> {{ $supplier->contact }}</li>
                        <li class="my-1"><strong>Status:</strong> {{ $supplier->fStatus() }}</li>

                    </ul>
                </div>
                <div class="flex items-center justify-end p-6">
                    <form id="formSubmit" action="{{ route('supplier.destroy', $supplier) }}" method="post">
                        <x-xlink-button ref="{{ route('supplier.index') }}">
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