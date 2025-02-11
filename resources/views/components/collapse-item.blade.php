@props(['id', 'title','expanded' => false])

<button id="{{$id}}" type="button" 
    class="flex mb-6 items-center justify-between w-full p-5 font-medium rtl:text-right border border-gray-300 rounded-se-xl gap-3" 
    data-accordion-target="#{{$id}}-body" 
    aria-expanded="{{$expanded}}" 
    aria-controls="{{$id}}-body">

    <span>{{$title}}</span>

    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
    </svg>
</button>

<div id="{{$id}}-body" class="hidden shadow-sm -mt-6 mb-6" aria-labelledby="{{$id}}">
    {{$slot}}
</div>