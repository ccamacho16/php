@props(['ref']) 

<a href="{{ $ref  }}" 
   class="
   inline-flex 
   items-center 
   px-4 py-2 
   bg-green-600
   border border-transparent 
   rounded-md 
   font-semibold 
   text-xs 
   text-white 
   uppercase
   tracking-widest 
   hover:bg-green-700 
   hover:shadow-lg
   active:bg-green-900 
   focus:outline-none 
   focus:border-green-900 
   focus:ring ring-green-800 
   disabled:opacity-25 
   transition ease-in-out duration-150
          ">
    {{ $slot }}
</a>
