@php
$default = [
    'id' => 'accordion-collapse',
    'data_accordion' => 'collapse',
    'class' => 'flex flex-col items-center px-3',
];
@endphp

<div {{$attributes($default)}} >
    {{$slot}}
</div>