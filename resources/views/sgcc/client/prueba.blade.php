<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            Create Client
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
				<div class="p-6 bg-white border-b border-gray-200">
					
					<form action="#" id="form">
						<select name="characters" id="characters"></select>
						<input type="submit" value="Get Data">
					</form>

					<table id="table">
						<thead>
							<th>name</th>
							<th>brand</th>
							<th>code</th>
						</thead>
					</table>
					<form action="#" id="form2" method="POST"> 
					{{-- <form action="{{ route('client.senddat') }}" id="form2" method="POST">  --}}
						@csrf
						<label> Name
							<input type="text" name="name" value="abcd">
						</label>
						<br>
						<label> Description
							<input type="text" name="description" value="abcdefgh">
						</label>			
						<br>
						<label> Status
							<input type="text" name="status" value="1">
						</label>			
						<br>
						<input type="submit" value="Send Data">
					</form>
					<div id="mensaje"></div>


{{-- 					<div class="relative inline-block">
						<button id="dropdown-btn" class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
						  <span class="mr-1">Opciones</span>
						</button>
						<ul id="dropdown-menu"  class="hidden dropdown absolute  text-gray-700 pt-1">
						  <li><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Opción 1</a></li>
						  <li><a class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Opción 2</a></li>
						  <li><a class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Opción 3</a></li>
						</ul>
					</div> --}}
					<button id="myButton" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
						Mi botón
					  </button>
					  
					  <div id="myContextMenu" class="hidden bg-white shadow rounded w-40 absolute">
						<a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Opción 1</a>
						<a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Opción 2</a>
					  </div>

					<br>
					<br>
				</div>
            </div>
        </div>
    </div>



	<script src="{{ asset('js/prueba.js') }}"></script>
</x-app-layout>
