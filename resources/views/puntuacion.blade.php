<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Puntuación Final') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col items-center justify-center text-center">
        <div class="max-w-4xl w-full bg-gray-900 text-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4 animate-pulse">
                <i class="fas fa-trophy"></i> ¡Puntuación Final! <i class="fas fa-trophy"></i>
            </h1>

            <p class="text-lg mb-6">
                Has obtenido <span class="font-bold text-green-400 text-2xl">{{ $puntuacion }}</span> puntos.
            </p>

            <h3 class="text-xl font-bold mb-3">Respuestas Correctas</h3>
            <ul class="text-green-400 mb-4">
                @forelse($respuestas_correctas as $respuesta)
                    <li>✅ {{ $respuesta }}</li>
                @empty
                    <li>No hay respuestas correctas registradas.</li>
                @endforelse
            </ul>

            <h3 class="text-xl font-bold mb-3">Respuestas Incorrectas</h3>
            <ul class="text-red-400 mb-6">
                @forelse($respuestas_incorrectas as $respuesta)
                    <li>❌ {{ $respuesta }}</li>
                @empty
                    <li>No hay respuestas incorrectas registradas.</li>
                @endforelse
            </ul>

            <div class="flex flex-col space-y-4">
                <a href="{{ route('juego.iniciar') }}" class="btn-custom bg-green-500 hover:bg-green-700">
                    <i class="fas fa-redo"></i> Volver a Jugar
                </a>
                <a href="{{ route('ranking') }}" class="btn-custom bg-blue-500 hover:bg-blue-700">
                    <i class="fas fa-list"></i> Ver Ranking
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
