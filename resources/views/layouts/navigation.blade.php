<div class="flexDDF">

    <div class="dropdown">
        <button class="dropdown-btn">
            
        <div class="flexProfilImg">
            <div>
                <span>{{ Auth::user()->name }}</span>
            </div>
            
            <div>
                <img src="/img/down.png" alt="down">
            </div>
        </div>
        </button>
    
        <div class="dropdown-content">
            <x-nav-link :href="route('profile.edit')">
                {{ __('Profile') }}
            </x-nav-link>
            <x-nav-link :href="route('celliers')" :active="request()->routeIs('celliers')">
                {{ __('Mes celliers') }}
            </x-nav-link>
            <x-nav-link :href="route('celliers.create')" :active="request()->routeIs('celliers.create')">
                {{ __('Creer un cellier') }}
            </x-nav-link>
        </div>
    </div>

    <div class="flexDivLogo">
        <img class="logo" src="{{ asset('img/vinologo.png') }}" alt="logo">
    </div>

    <div class="flexDivDeconnexion">
        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            
            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                <div class="flexDeconnexion">
                    <div>
                        <img class="iconeDeconnexion" src="{{ asset('img/logout.png') }}" alt="logout">                    
                    </div>
                    <div class="flexDeconnexionPara">
                        <p>Se deconnecter</p>
                    </div>
                </div>
            </x-dropdown-link>
        </form>
    </div>

</div>