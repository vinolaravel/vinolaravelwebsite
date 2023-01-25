<x-guest-layout>

<div class="connex">
    
    <section class="form login">
    <!-- Session Status -->
    <x-auth-session-status  :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h5 class="form-title">Connexion</h5><br>
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Courriel')"/> 
            <x-text-input id="email"  type="email" name="email" :value="old('email')" required autofocus/>
            <x-input-error :messages="$errors->get('email')"/> 
        </div>

        <!-- Password -->
        <div >
            <x-input-label for="password" :value="__('Mot de passe')" />

            <x-text-input id="password" 
                            type="password"
                            name="password"
                            required autocomplete="current-password"/>

            <x-input-error :messages="$errors->get('password')"/>
        </div>

        <!-- Remember Me -->
        <div >
            <label for="remember_me" >
                <input id="remember_me" type="checkbox" name="remember">
                <span >{{ __('Se souvenir de moi!') }}</span>
            </label>
        </div>

        <div >
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié?') }}
                </a>
            @endif

            <x-primary-button>
                {{ __('S\'authentifier') }}
            </x-primary-button>
        </div>
    </form>

    </section>
</div> 
</x-guest-layout>
