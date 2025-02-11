<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Revisión de Respuestas') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col items-center justify-center text-center">
        <div class="max-w-4xl w-full bg-gray-900 text-white shadow-lg rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4">
                <i class="fas fa-check-circle"></i> Revisión de Respuestas <i class="fas fa-check-circle"></i>
            </h1>
            <p class="text-lg mb-6">Aquí puedes ver en qué acertaste y dónde cometiste errores.</p>

            <table class="w-full border-collapse border border-gray-700 text-white">
                <thead>
                    <tr class="bg-gray-800">
                        <th class="p-3 border border-gray-700">Pregunta</th>
                        <th class="p-3 border border-gray-700">Tu Respuesta</th>
                        <th class="p-3 border border-gray-700">Correcto</th>
                        <th class="p-3 border border-gray-700">Explicación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($respuestas as $respuesta)
                        <tr class="{{ $respuesta->correcta ? 'bg-green-500 text-black' : 'bg-red-500 text-black' }}">
                            <td class="p-3 border border-gray-700">{{ $respuesta->pregunta }}</td>
                            <td class="p-3 border border-gray-700">{{ $respuesta->respuesta_usuario }}</td>
                            <td class="p-3 border border-gray-700">
                                @if($respuesta->correcta)
                                    ✅
                                @else
                                    ❌
                                @endif
                            </td>
                            <td class="p-3 border border-gray-700">{{ $respuesta->explicacion }}</td>
                        </tr>
                    @endforeach
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
