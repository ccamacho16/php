{{-- @props(['disabled' => false]) --}}

<table {!! $attributes->merge(['class' => 'w-full text-sm text-left text-gray-500']) !!}>
    {{ $content }}
</table>