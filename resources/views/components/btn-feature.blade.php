@props([
    'color' => 'blue', 
    'needLogin' => false, 
    'route' => false, 
    'type'  => 'a',
])

@php
$colors = [
'blue'   => 'from-blue-500 via-blue-600 to-blue-700 focus:ring-blue-300 shadow-blue-500/50',
'purple' => 'from-purple-500 via-purple-600 to-purple-700 focus:ring-purple-300 shadow-purple-500/50',
'green'  => 'from-green-400 via-green-500 to-green-600 focus:ring-green-300 shadow-green-500/50',
'cyan'   => 'from-cyan-400 via-cyan-500 to-cyan-600 focus:ring-cyan-300 shadow-cyan-500/50',
'teal'   => 'from-teal-400 via-teal-500 to-teal-600 focus:ring-teal-300 shadow-teal-500/50',
'red'    => 'from-red-400 via-red-500 to-red-600 focus:ring-red-300 shadow-red-500/50',
'pink'   => 'from-pink-400 via-pink-500 to-pink-600 focus:ring-pink-300 shadow-pink-500/50',
'lime'   => 'from-lime-200 via-lime-400 to-lime-500 focus:ring-lime-300 shadow-lime-500/50 text-gray-900',
];

$colorClasses = $colors[$color];
$baseClasses = "text-white bg-gradient-to-r hover:bg-gradient-to-br focus:ring-4 focus:outline-none shadow-lg font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2";
$href = $route ? route($route) : '#';

@endphp



@if ($needLogin && !Auth::check())
    <span data-tooltip-target="tooltip-default-{{$href}}" class="bg-gray-500 relative cursor-not-allowed {{$baseClasses}}">
        {{$slot}}
    </span>

    <div id="tooltip-default-{{$href}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
        You need to login
        <div class="tooltip-arrow" data-popper-arrow></div>
    </div>

@else
    <{{$type}} href="{{$href}}" {{$attributes->merge(['class' => "{$colorClasses} {$baseClasses}"])}}>
        {{$slot}}
    </{{$type}}>
@endif