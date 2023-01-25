<x-guest-layout>
    <div class="connex">

        <section class="form login">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h5 class="form-title">Inscription</h5><br>
                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Nom')" />
                    <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Courriel')" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Mot de passe')" />

                    <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Confirmer le mot de passe')" />

                    <x-text-input id="password_confirmation" type="password" name="password_confirmation" required />

                    <x-input-error :messages="$errors->get('password_confirmation')" />
                </div>

                <div>
                    <a href="{{ route('login') }}">
                        {{ __('Déjà membre?') }}
                    </a>

                    <x-primary-button>
                        {{ __('S\'enregistrer') }}
                    </x-primary-button>
                </div>
            </form>
        </section>
    </div>
</x-guest-layout>