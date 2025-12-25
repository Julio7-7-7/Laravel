<div class="relative mb-6 w-full">

    <!-- Encabezado -->
    <flux:heading size="xl" level="1" class="text-blue-700 font-bold">
        {{ __('Chat de Asistencia') }}
    </flux:heading>

    <flux:subheading size="lg" class="mb-6 text-gray-700 font-semibold">
        {{ __('Soporte en tiempo real del Centro de Cómputo') }}
    </flux:subheading>

    <flux:separator variant="subtle" />

    <!-- Contenedor general -->
    <div
        class="flex h-[600px] text-sm border rounded-2xl shadow-xl overflow-hidden 
               bg-gradient-to-b from-blue-600 via-white to-red-600">

        <!-- Sidebar: Lista de usuarios -->
        <div class="w-1/4 bg-white/80 backdrop-blur-sm border-r">
            <div class="p-4 font-bold text-blue-700 text-lg border-b bg-white/90 rounded-tl-2xl">
                Usuarios
            </div>

            <div class="divide-y">
                @foreach ($users as $user)
                    <div wire:click="selectUser({{ $user->id }})"
                        class="p-4 cursor-pointer transition 
                        hover:bg-blue-100/80 
                        {{ $selectedUser->id === $user->id ? 'bg-blue-50 font-semibold text-blue-700' : 'text-gray-800' }}">
                        <div>{{ $user->name }}</div>
                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Sección principal -->
        <div class="w-3/4 backdrop-blur-sm bg-white/60 flex flex-col">

            <!-- Header Chat -->
            <div class="p-4 border-b bg-white/80">
                <div class="text-lg font-bold text-blue-700">{{ $selectedUser->name }}</div>
                <div class="text-xs text-gray-600">{{ $selectedUser->email }}</div>
            </div>

            <!-- Mensajes -->
            <div class="flex-1 p-4 overflow-y-auto space-y-3">

                @foreach ($messages as $message)
                    <div
                        class="flex 
                        {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">

                        <div
                            class="max-w-xs px-4 py-2 rounded-2xl shadow-lg
                            {{ $message->sender_id === auth()->id()
                                ? 'bg-blue-600 text-white rounded-br-none'
                                : 'bg-white text-gray-900 rounded-bl-none border border-gray-200' }}">
                            {{ $message->message }}
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Input -->
            <form wire:submit="submit" class="p-4 border-t bg-white/80 flex items-center gap-2 rounded-br-2xl">
                <input type="text" wire:model="newMessage"
                    class="flex-1 border border-gray-300 rounded-full px-4 py-2 text-sm 
                           text-gray-800 placeholder-gray-500 focus:outline-none 
                           focus:ring-2 focus:ring-blue-400 bg-white/90"
                    placeholder="Escribe tu mensaje para asistencia..." />

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-5 py-2.5 
                           rounded-full shadow transition">
                    Enviar
                </button>
            </form>

        </div>
    </div>
</div>
