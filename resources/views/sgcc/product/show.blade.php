<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Show Product
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-gray-200">
                    <ul>
                        <li class="my-1"> <strong>Code</strong> {{ $product->code }}</li>
                        <li class="my-1"><strong>Name:</strong> {{ $product->name }}</li>
                        <li class="my-1"><strong>Tradename:</strong> {{ $product->tradename }}</li>
                        <li class="my-1"><strong>Brand:</strong> {{ $product->brand }}</li>
                        <li class="my-1"><strong>Category:</strong> {{ $product->category->name }}</li>
                        <li class="my-1"><strong>Description:</strong> {{ $product->description }}</li>
                        <li class="my-1"><strong>Quantity Min:</strong> {{ $product->quantity_min }}</li>
                        <li class="my-1"><strong>Quantity Max:</strong> {{ $product->quantity_max }}</li>
                        <li class="my-1"><strong>Barcode:</strong> {{ $product->barcode }}</li>
                        <li class="my-1"><strong>Status:</strong> {{ $product->fStatus() }}</li>

                    </ul>
                </div>
                <div class="flex items-center justify-end p-6">
                    <form id="formSubmit" action="{{ route('product.destroy', $product) }}" method="post">
                        <x-xlink-button ref="{{ route('product.index') }}">
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