<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Progreso del Jugador') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col items-center justify-center text-center">
        <div class="max-w-4xl w-full bg-gray-900 text-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4">
                <i class="fas fa-chart-line"></i> Tu Progreso <i class="fas fa-chart-line"></i>
            </h1>

            <p class="text-lg mb-4">Nivel Actual: <span class="font-bold text-yellow-400 text-2xl">{{ $progreso->nivel }}</span></p>
            <p class="text-lg mb-6">Experiencia: <span class="font-bold text-green-400 text-2xl">{{ $progreso->experiencia }}</span>/100</p>

            <div class="w-full bg-gray-700 rounded-lg overflow-hidden">
                <div class="bg-green-500 text-xs leading-none py-2 text-center text-white font-bold"
                     style="width: {{ ($progreso->experiencia / 100) * 100 }}%;">
                    {{ $progreso->experiencia }}%
                </div>
            </div>

            <p class="mt-4 text-lg">
                @if($progreso->nivel < 5)
                    Sigue practicando, ¡estás mejorando! 🚀
                @elseif($progreso->nivel < 10)
                    ¡Impresionante! Ya eres un jugador avanzado. 🏆
                @else
                    ¡Eres un experto en el juego! 🎯
                @endif
            </p>

            <div class="flex flex-col space-y-4 mt-6">
                <a href="{{ route('juego.iniciar') }}" class="btn-custom bg-green-500 hover:bg-green-700">
                    <i class="fas fa-play"></i> Volver a Jugar
                </a>
            </div>
        </div>
    </div>

    <style>
        .btn-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            color: white;
            font-size: 1.2em;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.5);
        }

        .btn-custom i {
            margin-right: 10px;
        }
    </style>
</x-app-layout>
