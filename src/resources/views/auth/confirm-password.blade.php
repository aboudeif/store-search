<x-guest-layout>
    <x-auth-card>
      <style type="text/css">.min-h-screen {background:
        linear-gradient(red, transparent),
        linear-gradient(to top left, lime, transparent),
        linear-gradient(to top right, blue, transparent);
    background-blend-mode: screen;}</style>
        <x-slot name="logo">
            <a href="/">
<!--                 <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
              <img class="w-20 h-20 fill-current text-green-500" src="https://indyme.com/wp-content/uploads/2020/11/shopping-cart-icon.png" alt="Store logo"></img>
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
