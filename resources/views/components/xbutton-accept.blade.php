<button 
{{ $attributes->merge(['type' => 'submit', 
                               'class' => '
                                           items-center 
                                           px-4 py-2 
                                           border border-transparent 
                                           rounded-md 
                                           font-semibold 
                                           text-xs 
                                           text-white 
                                           uppercase 
                                           tracking-widest 
                                           hover:shadow-lg

                                           bg-blue-600 
                                           hover:bg-blue-700 
                                           active:bg-blue-900 
                                           focus:border-blue-900 
                                           focus:ring ring-blue-300 

                                           focus:outline-none 
                                           disabled:opacity-25 
                                           transition ease-in-out duration-150
                                           ',
                                           'onclick' => ''
                              ]) }}>
    {{ $slot }}
</button>


