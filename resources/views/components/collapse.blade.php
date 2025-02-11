@php
$default = [
    'id' => 'accordion-collapse',
    'data_accordion' => 'collapse',
    'class' => 'flex flex-col items-center',
];
@endphp

<div {{$attributes($default)}} >
    {{$slot}}
</div>