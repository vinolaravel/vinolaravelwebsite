<nav x-data="{ open: false }" class="custom-nav">
    <!-- Primary Navigation Menu -->
  
                <!-- Logo -->
                <div class="logo">
                    <a href="{{ route('celliers') }}">
                        <img src="{{ asset('img/vin.svg') }}" alt="wineBottle">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="nav-links">
                    <x-nav-link :href="route('celliers')" :active="request()->routeIs('celliers')">
                        {{ __('celliers') }}
                    </x-nav-link>
                    <x-nav-link :href="route('celliers.create')" :active="request()->routeIs('celliers.create')">
                        {{ __('Creer un cellier') }}
                    </x-nav-link>
                </div>
           

            <!-- Settings Dropdown -->
            <div class="settings-dropdown">
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="dropdown-button">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profileeee') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
 

</nav>