@csrf
<div>
    {{-- PRODUCT --}}
    <div class="grid grid-cols-3 gap-1 my-2">
        <div>
            <x-input-label for="Inputcode" value="Code" />                         
            <x-text-input id="Inputcode" 
                          class="block mt-1 w-full" 
                          type="text" 
                          name="code" 
                          value="{{ old('code', $product->code) }}" 
                          placeholder="..." 
                          autofocus  
                          required                           
                          readonly="{{ $isnew }}"
                          /> 
        </div>
    </div>

    <div class="grid grid-cols-4 gap-1 my-2 mt-4">
        <div class="col-span-2">
            <x-input-label for="Inputname" value="Name" />
            <x-text-input id="Inputname" class="block mt-1 w-full " type="text" name="name" value="{{ old('name', $product->name) }}" required/>
        </div>

        <div class="ml-4 col-span-2">
            <x-input-label for="Inputtradename" value="Tradename" />
            <x-text-input id="Inputtradename" class="block mt-1 w-full" type="text" name="tradename" value="{{ old('tradename', $product->tradename) }}" required />
        </div>
    </div>



    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div >
            <x-input-label for="Inputbrand" value="Brand" />
            <x-text-input id="Inputbrand" class="block mt-1 w-full" type="text" name="brand" value="{{ old('brand',  $product->brand) }}"/>
        </div>

        <div  class="ml-4">
            <x-input-label for="Inputcategory" value="Category" />
            <x-xselect name="category_id" id="Inputcategory" class="block mt-1 w-full" required>    
                <x-slot name="content"> 

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)> {{ $category->name }}</option>
                    @endforeach                  

                </x-slot>

      {{--           <select name="category_id">
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}" @selected($category->id == old('category_id', $product->category_id))>{{ $category->name }}</option>
                    @endforeach
                </select> --}}
                                  
            </x-xselect> 

        </div>        

    </div>        


    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div class="col-span-2">
            <x-input-label for="Inputdescription" value="Description" />
            <x-xtextarea id="Inputdescription" class="block mt-1 w-full" rows="4" name="description">  
                <x-slot name="content">{{old('description', $product->description)}}</x-slot>
                
            </x-xtextarea>
        </div>
    </div>
    
    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputquantity_min" value="Quantity Min." />
            <x-text-input id="Inputquantity_min" class="block mt-1 w-full" type="number" name="quantity_min" value="{{ old('quantity_min',  $product->quantity_min) }}" />
        </div>

        <div class="ml-4">
            <x-input-label for="Inputquantity_max" value="Quantity Max." />
            <x-text-input id="Inputquantity_max" class="block mt-1 w-full" type="number" name="quantity_max" value="{{ old('quantity_max',  $product->quantity_max) }}" />
        </div>
    </div>    

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputbarcode" value="Barcode" />
            <x-text-input id="Inputbarcode" class="block mt-1 w-full" type="text" name="barcode" value="{{ old('barcode',  $product->barcode) }}"/>
        </div>

        <div class="ml-4">
            <x-input-label for="Inputstatus" value="Status" style="{{ $isnew ?: 'display:none;' }}"/>
            <x-xselect name="status" id="Inputstatus" class="block mt-1 w-full" style="{{ $isnew ?: 'display:none;' }}" >    
                <x-slot name="content"> 
                    @for ( $i=0 ; $i<count($status) ; $i++)
                        <option value="{{ $i }}" @selected(old('status', $status[$product->status]) == $status[$i])> {{ $status[$i] }} </option>
                    @endfor
                </x-slot>
            </x-select>

        </div>
    </div>    


    <div class="flex items-center justify-end mt-4">
        <x-xlink-button ref="{{ route('product.index') }}">
            Back
        </x-xlink-button>
        <x-primary-button class="ml-2" type="submit">
            Save
        </x-primary-button>
    </div>
    
</div>