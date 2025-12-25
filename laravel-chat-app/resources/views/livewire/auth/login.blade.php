<x-layouts.auth>
    <div
        class="min-h-screen flex flex-col items-center justify-center bg-gradient-to-b from-blue-600 via-white to-red-600 p-6">

        <div class="w-full max-w-md bg-white shadow-xl rounded-2xl p-8 space-y-6 border border-blue-200">

            <h1 class="text-2xl font-bold text-center text-blue-700">
                Bienvenido al Centro de Cómputo de Informática y Sistemas
            </h1>

            <p class="text-center text-lg font-bold text-gray-700">
                Asistencia en tiempo real
            </p>

            <!-- Session Status -->
            <x-auth-session-status class="text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
                @csrf

                <!-- Email Address -->
                <flux:input name="email" label="Correo electrónico" type="email" required autofocus
                    autocomplete="email" placeholder="Ingresa tu correo electrónico" />

                <!-- Password -->
                <flux:input name="password" label="Contraseña" type="password" required autocomplete="current-password"
                    placeholder="Ingresa tu contraseña" viewable />

                <!-- Forgot Password (Nuevo lugar, debajo del campo contraseña) -->
                @if (Route::has('password.request'))
                    <div class="text-right -mt-4">
                        <flux:link class="text-sm text-blue-600 hover:underline" :href="route('password.request')"
                            wire:navigate>
                            ¿Olvidaste tu contraseña?
                        </flux:link>
                    </div>
                @endif

                <!-- Remember Me -->
                <flux:checkbox name="remember" label="Recordarme" :checked="old('remember')" />

                <!-- Login Button -->
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit"
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white" data-test="login-button">
                        Iniciar sesión
                    </flux:button>
                </div>
            </form>

            @if (Route::has('register'))
                <div class="space-x-1 text-sm text-center text-gray-600">
                    <span>¿No tienes una cuenta?</span>
                    <flux:link :href="route('register')" wire:navigate class="text-blue-700 hover:underline">
                        Registrarme
                    </flux:link>
                </div>
            @endif

        </div>
    </div>
</x-layouts.auth>
