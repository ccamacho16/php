<aside class="w-64 min-h-screen block" aria-label="Sidebar">
    <div class="px-3 py-4 mt-1 shadow-lg h-full overflow-y-auto rounded bg-white">
       <ul id="menu" class="space-y-2">

          @foreach (session('options') as $menu)  
                  @if ( $menu->order == '-1' )
                          <li>

                              <a href="{{ $menu->url }}" class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 ">
                                  <img src="{{ $menu->icon }}" class="w-6" />
                                  <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $menu->name }}</span>
                              </a>                                            

                          </li>                                                                    
                  @else
                          @if ( $menu->order == '0' )
                              <li>
                                  <a href="{{ $menu->url }}" class="flex items-center w-full p-2 text-sm text-gray-900 transition duration-75 rounded-lg hover:bg-gray-100 ">
                                      <img src="{{ $menu->icon }}" class="w-6" />
                                      <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ $menu->name }}</span>
                                      <img src="{{url('/ico/outline/chevron-down.svg')}}" class="w-6" id="img1"/>
                                      <img src="{{url('/ico/outline/chevron-up.svg')}}" class="w-6 hidden" id="img2"/>
                                  </a>

                                  <ul  class="hidden py-2 space-y-2">
                                      @foreach (session('options') as $submenu)
                                          @if (($submenu->order != '0') && ($submenu->number == $menu->number))
                                              <li>
                                                  <a href="{{ route($submenu->url) }}" class="flex items-center w-full p-2 text-sm font-normal text-gray-900 transition duration-75 rounded-lg pl-11 hover:bg-gray-100 hover:font-bold">{{ $submenu->name }}</a>
                                              </li>                                                
                                          @endif
                                      @endforeach
                                  </ul>                              
                              </li>
                          @else
                              @continue
                          @endif
                  @endif        

          @endforeach
       </ul>
    </div>
 </aside> 
 
 
