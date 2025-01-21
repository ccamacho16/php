               <aside class="w-64 min-h-screen block" aria-label="Sidebar">
                  <div class="px-3 py-4 mt-1 shadow-lg h-full overflow-y-auto rounded bg-white">
                     <ul class="space-y-2">
                        <li>
                           <button type="button" class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 " onclick="location.href='{{route('dashboard')}}'">
                                 <img src="{{url('/ico/outline/chart-pie.svg')}}" class="w-6" />
                                 {{-- whitespace-nowrap: Para que el nombre del boton no tenga espacion o saltos de linea --}}
                                 {{-- flex-1: utilidad de Flexbox que permite establecer la proporción de ancho de un elemento dentro de un contenedor Flexbox. La clase flex-1 significa que el elemento ocupará el 100% del ancho disponible en el contenedor Flexbox. --}}
                                 <span class="flex-1 ml-3 text-left whitespace-nowrap">Dashboard</span>
                                 
                           </button>
                        </li>                       
                        <li>
                          <button type="button" class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 ">
                                <img src="{{url('/ico/outline/cog-8-tooth.svg')}}" class="w-6" />
                                <span class="flex-1 ml-3 text-left whitespace-nowrap">Parameters</span>
                                <img src="{{url('/ico/outline/chevron-down.svg')}}" class="w-6" />
                          </button>
                        </li>
                        <li>
                           <button type="button" class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 " onclick="dropdown()">
                                 <img src="{{url('/ico/outline/cube.svg')}}" class="w-6" />
                                 <span class="flex-1 ml-3 text-left whitespace-nowrap">Entities</span>
                                 <img src="{{url('/ico/outline/chevron-down.svg')}}" class="w-6" id="img1"/>
                                 <img src="{{url('/ico/outline/chevron-up.svg')}}" class="w-6 hidden" id="img2"/>
                                 
                           </button>
                           <ul id="submenu1" class="hidden py-2 space-y-2">
                                 <li>
                                    <a href="{{ route('branch.index') }}" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg pl-11 hover:bg-gray-100 hover:font-bold">Branches</a>
                                 </li>
                                 <li>
                                    <a href="{{ route('client.index') }}" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg pl-11 hover:bg-gray-100 hover:font-bold">Clients</a>
                                 </li>
                                 <li>
                                    <a href="{{ route('supplier.index') }}" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg pl-11 hover:bg-gray-100 hover:font-bold">Suppliers</a>
                                 </li>
                                 <li>
                                  <a href="{{ route('category.index') }}" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg pl-11 hover:bg-gray-100 hover:font-bold">Categories</a>
                                 </li>
                                 <li>
                                  <a href="{{ route('product.index') }}" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg pl-11 hover:bg-gray-100 hover:font-bold">Products</a>
                                 </li>
                           </ul>
                        </li>

                        <li>
                          <button type="button" class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 ">
                           <img src="{{url('/ico/outline/table-cells.svg')}}" class="w-6" />
                                <span class="flex-1 ml-3 text-left whitespace-nowrap">Transactions</span>
                                <img src="{{url('/ico/outline/chevron-down.svg')}}" class="w-6" />
                          </button>
                       </li>                        
                       <li>
                        <button type="button" class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 " >
                              <img src="{{url('/ico/outline/document-text.svg')}}" class="w-6" />
                              <span class="flex-1 ml-3 text-left whitespace-nowrap">Reports</span>
                              <img src="{{url('/ico/outline/chevron-down.svg')}}" class="w-6" />
                        </button>
                       </li>                       
                       <li>
                        <button type="button" class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 " >
                              <img src="{{url('/ico/outline/information-circle.svg')}}" class="w-6" />
                              {{-- se elimina la propiedad sidebar-toggle-item de la etiqueta span--}}
                              <span class="flex-1 ml-3 text-left whitespace-nowrap">Abouts</span>
                              
                        </button>
                       </li>                       
                     </ul>
                  </div>
               </aside>