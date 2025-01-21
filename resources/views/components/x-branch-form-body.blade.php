@csrf
<div>
    {{-- BRANCH --}}
    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputname" value="Name" />
            <x-text-input id="Inputname" class="block mt-1 w-full " type="text" name="name" value="{{ old('name', $branch->name) }}" required/>
        </div>

    </div>

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputcountry" value="Country" />
            <x-xselect name="country" id="Inputcountry" class="block mt-1 w-full">    
                <x-slot name="content"> 
                    @foreach ($countrys as $country)
                    <option value="{{ $country->value }}" @selected(old('country', $branch->country) == $country->value)> {{ $country->value }}</option>
                @endforeach             
                </x-slot>
            </x-xselect>
        </div>

        <div  class="ml-4">
            <x-input-label for="Inputcity" value="City" />
            <x-xselect name="city" id="Inputcity" class="block mt-1 w-full">    
                <x-slot name="content"> 
                    @foreach ($citys as $city)
                        <option value="{{ $city->value }}" @selected(old('city', $branch->city) == $city->value)> {{ $city->value }}</option>
                    @endforeach             
                </x-slot>
            </x-xselect>
        </div>

    </div>        

    <div class="mt-4">
        <x-input-label for="Inputaddress" value="Address" />
        <x-text-input id="Inputaddress" class="block mt-1 w-full" type="text" name="address" value="{{old('address', $branch->address)}}" required/>
    </div>


    
    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputcode" value="Code" />
            <x-text-input id="Inputcode" class="block mt-1 w-full" type="text" name="code" value="{{ old('code',  $branch->code) }}"/>
        </div>

        <div class="ml-4">
            <x-input-label for="Inputphones" value="Phones" />
            <x-text-input id="Inputphones" class="block mt-1 w-full" type="text" name="phones" value="{{ old('phones',  $branch->phones) }}" placeholder="000-00000; 000-00000" required/>
        </div>
    </div>       

 

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputstatus" value="Status" style="{{ $isnew ?: 'display:none;' }}"/>
            <x-xselect name="status" id="Inputstatus" class="block mt-1 w-full" style="{{ $isnew ?: 'display:none;' }}" >    
                <x-slot name="content"> 
                    @for ( $i=0 ; $i<count($status) ; $i++)
                        <option value="{{ $i }}" @selected(old('status', $status[$branch->status]) == $status[$i])> {{ $status[$i] }} </option>
                    @endfor
                </x-slot>
            </x-select>

        </div>
    </div>    


    <div class="flex items-center justify-end mt-4">
        <x-xlink-button ref="{{ route('branch.index') }}">
            Back
        </x-xlink-button>
        <x-primary-button class="ml-2" type="submit">
            Save
        </x-primary-button>
    </div>
    
</div>