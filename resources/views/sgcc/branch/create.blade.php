<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Create Branch
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($errors->any())
                    <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-100">
                        <div class="font-bold m-2 text-red-700">
                            The following errors occurred.
                        </div>

                        {{-- <span class="inline-block align-middle text-red-700 m-2"> --}}
                        <div class="px-6 text-red-700">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li  type="square">{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif    

                <div class="p-6 bg bg-white border-b border-gray-200">
                    <form action="{{ route('branch.store') }}" method="POST">
                        <x-x-branch-form-body/> 
                    </form>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>