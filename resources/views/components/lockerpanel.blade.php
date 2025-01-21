<button class="group flex items-center 
             bg-white
             py-2  
             rounded-lg 
             leading-relaxed 
             h-12 
             hover:shadow-xl 
             active:bg-gray-600 
             hover:border-2
             hover:border-gray-200
             btnPanel
             lg:h-16" 
             type="button" value={{ $id }} id={{ $id }}>
    <div class="w-1/6 flex justify-center border-r-2 border-gray-700">
        <span class="text-lg font-bold text-gray-700 lg:text-2xl lnumber" >{{ $number }}</span> 
    </div>
    <div class="flex flex-col w-5/6">
        <div class=" text-left leading-5 pl-2 pr-2 truncate">
            <span class="text-base tracking-wider leading-3 lname">{{ $name }}</span>
        </div>
        
        <div class="flex justify-between items-center">
            <div class="text-left leading-5 pl-2 pr-4">
                <span class="text-xs tracking-wider italic ltime_access">{{ $time_access }}</span> 
            </div>
            <div class="hidden rounded mr-3 w-2 h-2 bg-gray-600 lpoint">
            </div>
        </div>            
    </div>        

    <div class="hidden w-4/6 text-left leading-5">
        <span class="text-sm tracking-wider ldescription">{{ $description }}</span>
    </div>
</button>
