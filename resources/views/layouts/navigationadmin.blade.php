<div class="menuAdmin">
    <div class="titreAdmin">
        Admin Panel
    </div>

    <div class="divLogoAdmin">
        <a href="{{ route('admin') }}">
            <img class="logoAdmin" src="{{ asset('img/vinologo.png') }}" alt="logo" title="Page d'accueil (Admin)">
        </a>
    </div>

    <div class="divDeconnexionAdmin">
        <form method="POST" action="{{ route('logout') }}" class="iconLogout">
            @csrf
            
            <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                this.closest('form').submit();">
                <div class="flexDeconnexion">
                    <div>
                        <img class="iconeDeconnexion" src="{{ asset('img/logout.png') }}" alt="logout" title="Déconnexion">                    
                    </div>
                </div>
            </x-dropdown-link>
        </form>
    </div>
</div>


