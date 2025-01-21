@csrf
<div>
    {{-- CATEGORY --}}

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputname" value="Name" />
            <x-text-input id="Inputname" class="block mt-1 w-full " type="text" name="name" value="{{ old('name', $category->name) }}" required readonly="{{ $isnew }}"/>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div class="col-span-2">
            <x-input-label for="Inputdescription" value="Description" />
            <x-xtextarea id="Inputdescription" class="block mt-1 w-full" rows="4" name="description">  
                <x-slot name="content">{{old('description', $category->description)}}</x-slot>
                
            </x-xtextarea>
            {{-- <x-text-input id="Inputdescription" class="block mt-1 w-full" type="text" name="description" value="{{ old('description', $category->descrption) }}" />  --}}
        </div>
    </div>

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputstatus" value="Status" style="{{ $isnew ?: 'display:none;' }}"/>
            <x-xselect name="status" id="Inputstatus" class="block mt-1 w-full" style="{{ $isnew ?: 'display:none;' }}" >    
                <x-slot name="content"> 
                    @for ( $i=0 ; $i<count($status) ; $i++)
                        <option value="{{ $i }}" @selected(old('status', $status[$category->status]) == $status[$i])> {{ $status[$i] }} </option>
                    @endfor
                </x-slot>
            </x-select>

        </div>
    </div>    


    <div class="flex items-center justify-end mt-4">
        <x-xlink-button ref="{{ route('category.index') }}">
            Back
        </x-xlink-button>
        <x-primary-button class="ml-2" type="submit">
            Save
        </x-primary-button>
    </div>
    
</div>