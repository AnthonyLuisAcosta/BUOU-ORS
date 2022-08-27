<x-guest-layout>
  <x-jet-authentication-card>
    <x-slot name="logo">
      <x-jet-authentication-card-logo />
    </x-slot>

    <x-jet-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <!--MODIFIED FIELDS-->
      <div>
        <x-jet-label for="name" value="{{ __('First Name') }}" />
        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="first_name" :value="old('name')" required autofocus autocomplete="name" />
      </div>

      <div>
        <x-jet-label for="name" value="{{ __('Middle Name') }}" />
        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="middle_name" :value="old('name')" required autofocus autocomplete="name" />
      </div>

      <div>
        <x-jet-label for="name" value="{{ __('Last Name') }}" />
        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="last_name" :value="old('name')" required autofocus autocomplete="name" />
      </div>

      <!--ASSIGN DEFAULT ROLE ON REGISTER (5 is role_id for Applicant)-->
      <div hidden>
        <x-jet-label for="role" value="{{ __('Default Role') }}" />
        <x-jet-input id="role" class="block mt-1 w-full" type="number" name="role_id" value="5" />
      </div>
      <!--END-->

      <div class="mt-4">
        <x-jet-label for="email" value="{{ __('Email') }}" />
        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
      </div>

      <div class="mt-4">
        <x-jet-label for="password" value="{{ __('Password') }}" />
        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
      </div>

      <div class="mt-4">
        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
      </div>

      @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
      <div class="mt-4">
        <x-jet-label for="terms">
          <div class="flex items-center">
            <x-jet-checkbox name="terms" id="terms" />

            <div class="ml-2">
              {!! __('I agree to the :terms_of_service and :privacy_policy', [
              'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
              'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
              ]) !!}
            </div>
          </div>
        </x-jet-label>
      </div>
      @endif

      <div class="flex items-center justify-end mt-4">
        <div class="text-center m-0 p-0">
          <a class="underline text-xs lg:text-sm text-blue-500 hover:text-amber-500" href="{{ route('login') }}">
            {{ __('Sign in to your Account') }}
          </a>
        </div>
        <button class="ml-4 inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest text-gray-800 shadow-md bg-amber-100 hover:bg-amber-200 hover:text-white disabled:opacity-25 transition ease-in-out duration-150">
          {{ __('Register') }}
        </button>
      </div>
    </form>
  </x-jet-authentication-card>
</x-guest-layout>
