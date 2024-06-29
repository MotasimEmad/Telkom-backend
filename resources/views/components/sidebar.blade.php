<div x-cloak :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
     class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

<div x-cloak :class="sidebarOpen ? 'translate-x-0 ease-in' : '-translate-x-full ease-out'"
     class="fixed inset-y-0 left-0 z-30 flex-col w-64 h-auto px-5 py-8 overflow-y-auto transition duration-200 transform bg-gray-900 border-r border-gray-100 lg:translate-x-0 lg:relative lg:inset-0">

    <div class="bg-white rounded-md p-2">
        <img class="h-10" src="/logo/logo.png" alt="logo" />
    </div>

    <hr class="my-6 border-gray-500">

    <nav class="-mx-3 space-y-6 ">
        <div class="space-y-3 ">
            <label class="px-3 text-xs text-gray-500 uppercase">Services</label>

            <a class="flex items-center px-3 py-2 transition-colors duration-300 transform rounded-lg text-gray-200 hover:bg-gray-800 hover:text-gray-200 {{ request()->is('services') ? 'bg-gray-800 text-gray-200' : '' }}"
               href="{{ route('services.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                </svg>

                <span class="mx-2 text-sm font-medium">Services</span>
            </a>
        </div>

        <div class="space-y-3 ">
            <label class="px-3 text-xs text-gray-500 uppercase">Setting</label>

            <a class="flex items-center px-3 py-2 transition-colors duration-300 transform rounded-lg text-gray-200 hover:bg-gray-800 hover:text-gray-200 {{ request()->is('settings*') ? 'bg-gray-800 text-gray-200' : '' }}"
               href="{{ route('settings.index') }}">
                <svg class="w-5 h-5" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                </svg>

                <span class="mx-2 text-sm font-medium">Setting</span>
            </a>
        </div>

        <div class="flex items-center px-2 py-2 transition-colors duration-300 transform rounded-lg bg-opacity-40 text-red-500 hover:text-red-600 hover:bg-red-100">
            <svg class="w-6 h-6 text-red-500" data-slot="icon" fill="none" stroke-width="1.5"
                 stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                 aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"></path>
            </svg>

            <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="mx-3 capitalize">
                Logout
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </nav>

</div>
