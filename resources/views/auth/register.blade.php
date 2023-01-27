<x-guest-layout>
    <div class="connex">
        <section class="form register">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h5 class="form_title">Inscription</h5><br>

                <!-- Name -->
                <div class="champRegister">
                    <x-input-label for="name" :value="__('Nom')" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus class="register__input"/>
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Email Address -->
                <div class="champRegister">
                    <x-input-label for="email" :value="__('Courriel')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required class="register__input"/>
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div class="champRegister">
                    <x-input-label for="password" :value="__('Mot de passe')" />

                    <x-text-input id="password"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" class="register__input"/>
                    <x-input-error :messages="$errors->get('password')" />
                </div>

                <!-- Confirm Password -->
                <div class="champRegister">
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />
                    <x-text-input id="password_confirmation"
                                    type="password"
                                    name="password_confirmation" required class="register__input"/>
                    <x-input-error :messages="$errors->get('password_confirmation')"/>
                </div>

                <div class="signature">
                    <a href="{{ route('login') }}">
                        {{ __('Déjà membre?') }}
                    </a>

                    <x-primary-button class="myButton">
                        {{ __('S\'enregistrer') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </div>
</x-guest-layout>
