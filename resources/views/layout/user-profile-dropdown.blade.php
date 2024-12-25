<!-- Dropdown -->
<div class="z-50 hidden my-4 p-3 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow" id="user-profile-dropdown">
    <div class="border-none flex-col" role="none">
        @auth
        <div class="text-center py-2.5">
            <span>
                {{auth() -> user() -> name}}
            </span>
        </div>
        @endauth

        @if (auth() -> user() -> is_admin)
        <a href="/admin">
            <div class="text-white bg-blue-700 hover:bg-blue-800 w-full font-medium text-sm px-5 py-2.5">
                Dashboard
            </div>
        </a>
        @endif

        <div>
            <form method="post" class="m-0" action="{{route('logout')}}">
                @csrf
                <button type="submit" onclick="return confirm('Are you sore?')"
                    class="text-white bg-red-700 hover:bg-red-800 w-full font-medium text-sm px-5 py-2.5">
                    Logout
                </button>
            </form>
        </div>

        <!-- <div>
            <a href="/locale/vi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                <div class="inline-flex items-center">
                    Tiếng việt
                </div>
            </a>
        </div> -->
    </div>
</div>