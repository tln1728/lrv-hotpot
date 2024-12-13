@props(['color' => 'green'])

<div id="alert-{{$color}}" class="flex items-center p-4 mb-4 text-{{$color}}-800 rounded-lg bg-{{$color}}-50" role="alert">
    {{$slot}}

    <button class="ms-auto -mx-1.5 -my-1.5 bg-{{$color}}-50 text-{{$color}}-500 rounded-lg p-1.5 hover:bg-{{$color}}-200 inline-flex items-center justify-center h-8 w-8" 
    data-dismiss-target="#alert-{{$color}}" aria-label="Close"
    type="button">
        <span class="sr-only">Close</span>
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
    </button>
</div>