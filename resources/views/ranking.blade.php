<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ranking de Jugadores') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col items-center justify-center text-center">
        <div class="max-w-4xl w-full bg-gray-900 text-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4">
                <i class="fas fa-crown text-yellow-400"></i> Ranking de Jugadores <i class="fas fa-crown text-yellow-400"></i>
            </h1>
            <p class="text-lg mb-6">Los mejores jugadores según su puntuación.</p>

            <table class="table-auto w-full border-collapse border border-gray-600">
    <thead>
        <tr class="bg-gray-800 text-white">
            <th class="border border-gray-600 px-4 py-2">Posición</th>
            <th class="border border-gray-600 px-4 py-2">Jugador</th>
            <th class="border border-gray-600 px-4 py-2">Puntos</th>
        </tr>
    </thead>
    <tbody>
        @forelse($ranking as $index => $jugador)
            <tr class="text-center">
                <td class="border border-gray-600 px-4 py-2">{{ $index + 1 }}</td>
                <td class="border border-gray-600 px-4 py-2">{{ $jugador->user->name ?? 'Anónimo' }}</td>
                <td class="border border-gray-600 px-4 py-2">{{ $jugador->total_puntos }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center text-gray-400 py-4">No hay jugadores registrados aún.</td>
            </tr>
        @endforelse
    </tbody>
</table>


            <div class="flex flex-col space-y-4 mt-6">
                <a href="{{ route('juego.iniciar') }}" class="btn-custom bg-green-500 hover:bg-green-700">
                    <i class="fas fa-redo"></i> Volver a Jugar
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
