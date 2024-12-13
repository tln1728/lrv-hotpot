@extends('layout.index')

@section('title')
Products Bin
@endsection

@section('content')
<div class="flex justify-between">
    <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal"
        class="border inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100" type="button">
        Action
    </button>

    <a href="{{route('products.index')}}">
        <button type="button" class="text-white bg-blue-600 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Back
        </button>
    </a>

    <!-- Dropdown menu -->
    <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
        <ul class="text-sm text-gray-700" aria-labelledby="dropdownMenuIconHorizontalButton">
            <li>
                <button onclick="return confirm('you sure?')"
                    class="block text-white font-bold px-4 py-2 w-full bg-red-600 hover:bg-red-800"
                    type="submit" name="action" value="force_deletes" form="actionForm">
                    Force delete
                </button>
            </li>

            <li class="mt-2">
                <button
                    class="block text-white font-bold px-4 py-2 w-full bg-green-500 hover:bg-green-800"
                    type="submit" name="action" value="restore" form="actionForm">
                    Restore
                </button>
            </li>
        </ul>
    </div>
</div>

<form method="post" action="{{route('products.action')}}" id="actionForm">
    @csrf
</form>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all" type="checkbox">
                        <label for="checkbox-all" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">Product name</th>
                <th scope="col" class="px-6 py-3">Cover</th>
                <th scope="col" class="px-6 py-3">Price</th>
                <th scope="col" class="px-6 py-3">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $p)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="w-4 p-4">
                    <div class="flex items-center">
                        <input form="actionForm" name="ids[]" value="{{$p -> id}}" class="checkbox-item" type="checkbox">
                    </div>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$p -> title}}
                </th>
                <td class="px-6 py-4">
                    <img class="h-36 rounded object-contain" src="{{Storage::url($p -> cover)}}" alt="bg">
                </td>
                <td class="px-6 py-4">{{$p -> price}}</td>
                <td class="px-6 py-4">
                    <form method="post" action="{{route('products.force_delete',$p -> id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Delete" onclick="return confirm('you sure?')"
                            class="text-red-500 cursor-pointer font-bold">
                    </form>

                    <br><br>

                    <form method="post" action="{{route('products.restore',$p -> id)}}">
                        @csrf
                        <input type="submit" value="Restore"
                            class="text-green-500 cursor-pointer font-bold">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{$products -> links()}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const selectAllCheckbox = document.getElementById('checkbox-all');
        const checkboxes = document.querySelectorAll('.checkbox-item');

        selectAllCheckbox.addEventListener('change', function() {
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
        });

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const allChecked = Array.from(checkboxes).every(cb => cb.checked);
                selectAllCheckbox.checked = allChecked;
            });
        });
    });
</script>
@endsection