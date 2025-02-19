<button 
{{ $attributes->merge(['type' => 'submit', 
                               'class' => '
                                           items-center 
                                           px-4 py-2 
                                           bg-red-600 
                                           border border-transparent 
                                           rounded-md 
                                           font-semibold 
                                           text-xs 
                                           text-white 
                                           uppercase 
                                           tracking-widest 
                                           hover:bg-red-500                                            
                                           active:bg-red-700 
                                           focus:outline-none 
                                           focus:border-red-700 
                                           focus:ring ring-red-300 
                                           disabled:opacity-25 
                                           transition ease-in-out duration-150
                                           ',
                                           
                              ]) }}>
    {{ $slot }}
</button>

{{-- inline-flex  --}}
