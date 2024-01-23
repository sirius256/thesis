@extends('main.layouts.public')

@section('content')
    <div class="container">
        <form class="pt-10" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Нікнейм')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Пошта')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Пароль')" />

                <x-text-input id="password" class="block mt-1 w-full"
                              type="password"
                              name="password"
                              required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Введіть пароль ще раз    ')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                              type="password"
                              name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <x-text-input id="device_model_id" type="hidden" name="device_model_id" value="{{ $deviceModelId }}"/>
            <x-text-input id="redirect_after_register_to" type="hidden" name="redirect_after_register_to" value="{{ $redirectAfterRegisterTo }}"/>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Уже зареєстровані?') }}
                </a>
                <x-primary-button class="ms-4">
                    @if(!empty($deviceModelId))
                        {{ __('Зареєструватись і перейти до наступного кроку') }}
                    @else
                        {{ __('Зареєструватись') }}
                    @endif
                </x-primary-button>
            </div>
        </form>
    </div>
@endsection
