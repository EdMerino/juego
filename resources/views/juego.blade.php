<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Juego de Preguntas') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col items-center text-center">
        <div class="max-w-2xl w-full bg-gray-900 text-white shadow-lg rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">
                <i class="fas fa-question-circle"></i> Pregunta {{ $indicePregunta + 1 }} de {{ count(session('preguntas')) }}
            </h1>

            <p class="text-lg font-semibold mb-4 animate-pulse">
                {{ $preguntaActual->texto }}
            </p>

            <div class="w-full bg-gray-700 rounded-lg overflow-hidden mb-4">
                <div class="bg-blue-500 text-xs leading-none py-2 text-center text-white font-bold"
                     style="width: {{ (($indicePregunta + 1) / count(session('preguntas'))) * 100 }}%;">
                    Progreso: {{ round((($indicePregunta + 1) / count(session('preguntas'))) * 100) }}%
                </div>
            </div>

            <form action="{{ route('juego.responder') }}" method="POST" class="w-full">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    @foreach($respuestas as $respuesta)
                        <button type="submit" name="respuesta" value="{{ $respuesta->id }}"
                                class="btn-answer"
                                onclick="playSound('{{ $respuesta->es_correcta }}')">
                            <i class="fas fa-check-circle"></i> {{ $respuesta->texto }}
                        </button>
                    @endforeach
                </div>
            </form>

            <div class="mt-6">
                <p class="text-md">Puntuación: <span class="font-bold text-yellow-400">{{ session('puntuacion', 0) }}</span></p>
            </div>
        </div>
    </div>

    <style>
        .btn-answer {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #1d3557;
            color: white;
            font-size: 1em;
            padding: 12px;
            border-radius: 8px;
            width: 100%;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.5);
            text-align: center;
            font-weight: bold;
        }

        .btn-answer:hover {
            background: #457b9d;
            transform: scale(1.05);
        }

        .btn-answer:active {
            background: #e63946;
        }
    </style>

    <script>
        function playSound(isCorrect) {
            let sound = new Audio(isCorrect === "1" ? "{{ asset('sounds/correct.mp3') }}" : "{{ asset('sounds/incorrect.mp3') }}");
            sound.play();
        }
    </script>
</x-app-layout>
