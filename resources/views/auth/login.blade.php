<x-guest-layout>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-input-label for="email" value="Adresse e-mail" />

            <x-text-input id="email"
                          class="block mt-1 w-full"
                          type="email"
                          name="email"
                          :value="old('email')"
                          required
                          autofocus
                          autocomplete="username" />

            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div style="margin-top: 18px;">
            <x-input-label for="password" value="Mot de passe" />

            <x-text-input id="password"
                          class="block mt-1 w-full"
                          type="password"
                          name="password"
                          required
                          autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div style="margin-top: 16px;">
            <label for="remember_me" style="display:flex; align-items:center; gap:8px;">
                <input id="remember_me"
                       type="checkbox"
                       name="remember">

                <span>Se souvenir de moi</span>
            </label>
        </div>

        <div style="display:flex; align-items:center; justify-content:space-between; margin-top:25px;">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            @endif

            <button type="submit">
                Connexion
            </button>
        </div>
    </form>

</x-guest-layout>