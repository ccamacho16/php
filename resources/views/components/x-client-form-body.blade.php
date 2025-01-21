@csrf
<div>
    <div class="grid grid-cols-3 gap-1 my-2">
        <div>
            <x-input-label for="Inputdni" value="DNI" />                         
            <x-text-input id="Inputdni" 
                          class="block mt-1 w-full" 
                          type="text" 
                          name="dni" 
                          value="{{ old('dni', isset($client) ? $client->dni : '') }}"
                          {{-- value="{{ old('dni', $client->dni) }}"  --}}
                          placeholder="..." 
                          autofocus  
                          required                           
                          readonly="{{ isset($isnew) ? $isnew : '' }}"
                          /> 
        </div>

        {{-- style="{{ $isnew ?: 'display:none;' }}" --}}
{{--         isset($client) ? $client->last_name : '' --}}
        {{-- value="{{ old('dni', isset($client) ? $client->dni : '') }}"
        value="{{ old('dni', $client ? $client->dni : '') }}" --}}

{{--         <div class="ml-4">
            <x-input-label for="Inputcity" value="Ext" />
            <x-xselect name="city" id="Inputcity">    
                <x-slot name="content"> 
                    @for ( $i=0 ; $i<count($city) ; $i++)
                        <option value="{{ $city[$i] }}" @selected(old('status', $client->city) == $city[$i])> {{ $city[$i] }} </option>
                    @endfor
                </x-slot>
            </x-xselect>
        </div> --}}
    </div>

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputname" value="Name" />
            <x-text-input id="Inputname" class="block mt-1 w-full " type="text" 
             name="name"
             value="{{ old('name', isset($client) ? $client->name : '') }}"
             {{-- value="{{ old('name', $client->name) }}"  --}}
             required/>
                {{-- onkeyup="this.value=this.value.toUpperCase()" --}}
        </div>

        <div class="ml-4 col-span-2">
            <x-input-label for="Inputlast_name" value="Last Name" />
            <x-text-input id="Inputlast_name" class="block mt-1 w-full" type="text" 
             name="last_name" 
             value="{{ old('last_name', isset($client) ? $client->last_name : '') }}"
             {{-- value="{{ old('last_name', $client->last_name) }}"  --}}
             required />
            {{-- style="text-transform: capitalize" --}}
            {{-- oninput="this.value = this.value.toUpperCase()" --}}
        </div>
    </div>

    <div class="grid grid-cols-3 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputsex" value="Sex" />
            <x-xselect name="sex" id="Inputsex" class="block mt-1 w-full">    
                <x-slot name="content"> 
                    @if(isset($sex) && is_countable($sex) && count($sex) > 0)                    
                        @for ( $i=0 ; $i<count($sex) ; $i++)
                                                        {{-- que la opcion quede seleccionada, si la condicion dentro del select se cumple --}}
                            <option value="{{ $sex[$i] }}" @selected(old('sex', isset($client) ? $client->sex : '') == $sex[$i])> {{ $sex[$i] }} </option>                               
                            {{-- <option value="{{ $sex[$i] }}" @selected(old('sex', $client->sex) == $sex[$i])> {{ $sex[$i] }} </option> --}}
                        @endfor
                    @endif
                </x-slot>
            </x-xselect>
        </div>

        <div class="ml-4">
            <x-input-label for="Inputbirth_date" value="Birth Date" /> 
            {{-- <x-input-label for="Inputbirth_date" :value="$value ?? ''" /> --}}
            <x-text-input id="Inputbirth_date" class="block mt-1 w-full" type="date" 
             name="birth_date" 
             value="{{ old('birth_date', isset($client) && $client->birth_date ? $client->birth_date->format('Y-m-d') : '') }}"
             {{-- value="{{ old('birth_date', isset($client) ? $client->birth_date->format('Y-m-d') : '') }}" --}}
             {{-- value="{{ old('birth_date', $client->birth_date->format('Y-m-d')) }}" --}}
             required/>    
        </div>
    </div>
    

    <div class="mt-4">
        <x-input-label for="Inputhome_address" value="Home Address" />
        <x-text-input id="Inputhome_address" class="block mt-1 w-full" type="text" 
         name="home_address" 
         value="{{ old('home_address', isset($client) ? $client->home_address : '') }}"
         {{-- value="{{ old('home_address', $client->home_address) }}" --}}
         />
        {{-- <x-text-input id="Inputhome_address" class="block mt-1 w-full" type="text" name="home_address" value="{{ old('home_address', $client->home_address) }}"/>             --}}
    </div>

    <div class="mt-4">
        <x-input-label for="Inputbusiness_address" value="Business Address" />
        <x-text-input id="Inputbusiness_address" class="block mt-1 w-full" type="text" 
        name="business_address" 
        value="{{ old('business_address', isset($client) ? $client->business_address : '') }}"
        {{-- value="{{ old('business_address', $client->business_address) }}" --}}
        />
    </div>

    <div class="grid grid-cols-2 gap-1 my-2 mt-4">
        <div>
            <x-input-label for="Inputphones" value="Phones" />
            <x-text-input id="Inputphones" class="block mt-1 w-full" type="text" 
             name="phones" 
             value="{{ old('phones', isset($client) ? $client->phones : '') }}"
             {{-- value="{{ old('phones',  $client->phones) }}" --}} 
             placeholder="000-00000; 000-00000" required/>
            {{-- <x-text-input id="Inputphones" class="block mt-1 w-full" type="text" name="phones" value="{{ old('phones',  $client->phones) }}" placeholder="000-00000; 000-00000" required/> --}}
        </div>

        <div class="ml-4">
            <x-input-label for="Inputemail" value="Email" />
            <x-text-input id="Inputemail" class="block mt-1 w-full" type="email" 
            name="email"
            value="{{ old('email', isset($client) ? $client->email : '') }}"
             {{-- name="email" value="{{ old('email',  $client->email) }}"  --}}
             placeholder="example@gmail.com"  />
        </div>
    </div>

    <div class="grid grid-cols-2 gap-1 my-2 mt-4">

        <div class="col-span-1">
            <x-input-label for="Inputjob" value="Jobe" />
            <x-xselect name="job" id="Inputjob" class="block mt-1 w-full">    
                <x-slot name="content"> 
                    @if(isset($jobs) && is_countable($jobs) && count($jobs) > 0)                    
                        @foreach ($jobs as $job)
                            <option value="{{ $job->value }}" @selected(old('job', isset($client) ? $client->job : '') == $job->value)> {{ $job->value }}</option>
                            {{-- <option value="{{ $job->value }}" @selected(old('job', $client->job) == $job->value)> {{ $job->value }}</option> --}}
                        @endforeach                  
                    @endif    
                </x-slot>
            </x-select>            
        </div>
        {{-- readonly="{{ isset($isnew) ? $isnew : '' }}" --}}
        <div class="ml-4">
            <x-input-label for="Inputstatus" value="Status" style="{{ isset($isnew) ?: 'display:none;' }}"/>
            <x-xselect name="status" id="Inputstatus" class="block mt-1 w-full" style="{{ isset($isnew) ?: 'display:none;' }}" >    
                <x-slot name="content"> 
                    
                    {{-- @if((is_countable($status) > 0) && (count($status) > 0))        --}}
                    @if(isset($status) && is_countable($status) && count($status) > 0)                                                     
                        @for ( $i=0 ; $i<count($status) ; $i++)
                            {{-- <option value="{{ $i }}">{{ $status[$i]}}</option> --}}
                            <option value="{{ $i }}" @selected(old('status', isset($client) ? $status[$client->status] : '') == $status[$i])> {{ $status[$i] }} </option>
                            {{-- <option value="{{ $i }}" @selected(old('status', $status[$client->status]) == $status[$i])> {{ $status[$i] }} </option> --}}
                        @endfor
                    @endif    
                </x-slot>
            </x-select>

        </div>
    </div>        

    <div class="flex items-center justify-end mt-4">
        <x-xlink-button ref="{{ route('client.index') }}">
            Back
        </x-xlink-button>
        <x-primary-button class="ml-2" type="submit">
            Save
        </x-primary-button>
    </div>
    <!-- Do what you can, with what you have, where you are. - Theodore Roosevelt -->
    
</div>