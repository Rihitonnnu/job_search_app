<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between md:h-22 h-17 md:pt-3 md:pb-3">
            <div class="flex ">
                <!-- Logo -->
                <div class="md:w-1/6 w-1/3">
                    <div class="md:w-10/12 w-full">
                        <a href="{{ route('user.dashboard') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                        ホーム
                    </x-nav-link>
                    <x-nav-link :href="route('user.recruit.index')" :active="request()->routeIs('user.recruit.index')">
                        企業の募集一覧
                    </x-nav-link>
                    <x-nav-link :href="route('user.info.edit',['info'=>Auth::id()])" :active="request()->routeIs('user.info.edit')">
                        基本情報編集
                    </x-nav-link>
                    <x-nav-link :href="route('user.sheet.create')" :active="request()->routeIs('user.sheet.create')">
                        シート登録
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <form method="POST" action="{{ route('user.logout') }}">
                            @csrf
                            <button class="flex items-center text-md font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>ログアウト</div>
                            </button>
                        </form>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('user.logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('user.logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                ログアウト
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button id="user_hamburger"  class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden" id="user_res_nav">
        <div class="pt-2 space-y-1">
            <x-responsive-nav-link :href="route('user.dashboard')" :active="request()->routeIs('user.dashboard')">
                ホーム
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.recruit.index')" :active="request()->routeIs('user.recruit.index')">
                企業の募集一覧
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.info.edit',['info'=>Auth::id()])" :active="request()->routeIs('user.info.edit')">
                基本情報編集
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('user.sheet.create')" :active="request()->routeIs('user.sheet.create')">
                シート登録
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            {{-- <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div> --}}

            <div class="m space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('user.logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        ログアウト
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
