{{-- se recibe el parametro disable con un valor por defecto --}}
@props(['disabled' => false, 'readonly' => false])

<input {{ $readonly ? 'readonly' : '' }} {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50']) !!}>
