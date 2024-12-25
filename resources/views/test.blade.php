@extends('layout.index')

@php
$notifications = auth() -> user() -> notifications;
@endphp

@section('content')
@if ($notifications)
@foreach ($notifications as $noti)
<div id="{{$noti->id}}" class="flex items-center p-4 mb-4 text-blue-800 rounded-lg bg-blue-50" role="alert">
    <div class="ms-3 text-sm font-medium">
        {{ "[{$noti -> created_at}] {$noti->data['title']}" }}
    </div>
    <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-blue-50 text-blue-500 rounded-lg focus:ring-2 focus:ring-blue-400 p-1.5 hover:bg-blue-200 inline-flex items-center justify-center h-8 mark-as-read" data-dismiss-target="{{$noti->id}}" aria-label="Close">
        <span class="sr-only">Close</span>
        <span class="text-blue-600" href="">Mark as read</span>
    </button>
</div>
@endforeach
@endif
@endsection