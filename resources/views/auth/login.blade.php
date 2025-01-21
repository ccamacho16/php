<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-60 h-35 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

{{--            <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                <div class="relative">
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <button id="togglePassword" type="button" class="absolute inset-y-0 right-0 px-1 flex items-center" >
                        <img src="{{url('/ico/outline/eye-slash-copia.svg')}}">
{{--                  
                        {{-- <i id="icon" class="far fa-eye"></i> --}}
                    </button>
                </div>

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="mt-4">

                <x-input-label for="branch_id" :value="__('Branch')" />

                {{-- <x-text-input id="branch_id" class="block mt-1 w-full"
                                type="password"
                                name="branch_id" required /> --}}

                <x-xselect name="branch_id" id="branch_id" class="block mt-1 w-full" required>    
                    <x-slot name="content"> 
                        @foreach ($branches as $branch)
                            <option value="{{ $branch->id }}"> {{ $branch->name }}</option>
                        @endforeach                  
                    </x-slot>
                </x-xselect>                                 

                <x-input-error :messages="$errors->get('branch_id')" class="mt-2" />

            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
{{--                 @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
        <script>
            const passwordField = document.getElementById("password");
            const passwordToggle = document.getElementById("togglePassword");
            
            passwordToggle.addEventListener("click", function() {
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    passwordToggle.innerHTML = '<img src="{{url("/ico/outline/eye-copia.svg")}}"/>';
                } else {
                    passwordField.type = "password";
                    passwordToggle.innerHTML = '<img src="{{url("/ico/outline/eye-slash-copia.svg")}}"/>';
                }
            });            
        </script>    
    </x-auth-card>

    
</x-guest-layout>
