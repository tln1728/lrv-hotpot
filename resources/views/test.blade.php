@extends('layout.index')

@section('content')

<h1>Array function</h1>

<form action="" method="get">
    <textarea tabindex="1" name="cc" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{old('cc')}}</textarea>

    <input type="submit">
</form>

@php
$cc = request() -> cc;
//dump(array_filter(explode(',', $data['cc'])));
//dump(array_filter(array_map('trim', explode(',',$cc))));
//dump(             array_map('trim', explode(',',$cc)))
@endphp


@endsection