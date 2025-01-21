@csrf
<div>
    {{-- SUPPLIER --}}
    <div class="grid grid-cols-3 gap-1 my-2">
        <div>
            <x-input-label for="Inputtin" value="TIN" />                         
            <x-text-input id="Inputtin" 
                          class="block mt-1 w-full" 
                          type="text" 
                          name="tin" 
                          value="{{ old('tin', $supplier->tin) }}" 
                          placeholder="..." 
                          autofocus  
                          required                           
                          readonly="{{ $isnew }}"
                          /> 
        </div>
    </div>

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputname" value="Name" />
            <x-text-input id="Inputname" class="block mt-1 w-full " type="text" name="name" value="{{ old('name', $supplier->name) }}" required/>
        </div>

        <div class="ml-4 col-span-2">
            <x-input-label for="Inputaddress" value="Address" />
            <x-text-input id="Inputaddress" class="block mt-1 w-full" type="text" name="address" value="{{ old('address', $supplier->address) }}" required />
        </div>
    </div>

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputcity" value="City" />
            <x-xselect name="city" id="Inputcity" class="block mt-1 w-full">    
                <x-slot name="content"> 
                    @foreach ($citys as $city)
                        <option value="{{ $city->value }}" @selected(old('city', $supplier->city) == $city->value)> {{ $city->value }}</option>
                    @endforeach             
                </x-slot>
            </x-xselect>
        </div>        
        <div class="ml-4">
            <x-input-label for="Inputphones" value="Phones" />
            <x-text-input id="Inputphones" class="block mt-1 w-full" type="text" name="phones" value="{{ old('phones',  $supplier->phones) }}" placeholder="000-00000; 000-00000" required/>
        </div>
    </div>        

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputemail" value="Email" />
            <x-text-input id="Inputemail" class="block mt-1 w-full" type="email" name="email" value="{{ old('email',  $supplier->email) }}" placeholder="example@gmail.com"  />
        </div>

        <div class="ml-4 col-span-2">
            <x-input-label for="Inputaccount" value="Bank Account" />
            <x-text-input id="Inputaccount" class="block mt-1 w-full" type="text" name="account" value="{{ old('account', $supplier->account) }}" placeholder="bank : account;"/>
        </div>
    </div>    

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div class="col-span-2">
            <x-input-label for="Inputcontact" value="Contact" />
            <x-text-input id="Inputcontact" class="block mt-1 w-full" type="text" name="contact" value="{{ old('contact',  $supplier->contact) }}"  required/>
        </div>

        <div class="ml-4">
            <x-input-label for="Inputstatus" value="Status" style="{{ $isnew ?: 'display:none;' }}"/>
            <x-xselect name="status" id="Inputstatus" class="block mt-1 w-full" style="{{ $isnew ?: 'display:none;' }}" >    
                <x-slot name="content"> 
                    @for ( $i=0 ; $i<count($status) ; $i++)
                        <option value="{{ $i }}" @selected(old('status', $status[$supplier->status]) == $status[$i])> {{ $status[$i] }} </option>
                    @endfor
                </x-slot>
            </x-select>

        </div>
    </div>    


    <div class="flex items-center justify-end mt-4">
        <x-xlink-button ref="{{ route('supplier.index') }}">
            Back
        </x-xlink-button>
        <x-primary-button class="ml-2" type="submit">
            Save
        </x-primary-button>
    </div>
    
</div>