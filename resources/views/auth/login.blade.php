<x-guest-layout>
    <div class="connex">
        <section class="form login">
            
            <!-- Session Status -->
            <x-auth-session-status :status="session('status')" />

            <form class="formulaire formlogin" method="POST" action="{{ route('login') }}"> 
                @csrf
                <h5 class="form-title">Connexion</h5><br>
                <!-- Email Address -->
                <div class="champlogin">
                    <x-input-label for="email" :value="__('Courriel')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus class="login__input"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                
                <!-- Password -->
                <div class="champlogin">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    
                    <x-text-input id="password" type="password" name="password" required autocomplete="current-password" class="login__input"/>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Remember Me -->
                <div>
                    <input id="remember_me" type="checkbox" name="remember">
                    <span>{{ __('Se souvenir de moi!') }}</span>
                </div>

                <div class="signature">
                        <a href="{{ route('register') }}">
                            {{ __('Nouveau membre?') }}
                        </a>

                    <x-primary-button>
                        {{ __('S\'authentifier') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </div>
</x-guest-layout>
