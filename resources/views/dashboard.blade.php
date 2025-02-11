<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 flex flex-col items-center justify-center text-center">
        <div class="max-w-sm w-full bg-gray-900 text-white shadow-lg rounded-lg p-6">
            <h1 class="text-lg font-bold mb-6 animate-pulse flex items-center justify-center">
                <i class="fas fa-gamepad mr-2"></i> ¡Bienvenido al Juego! <i class="fas fa-gamepad ml-2"></i>
            </h1>
            <p class="text-md mb-4">Selecciona una opción:</p>

            <div class="flex flex-col space-y-6 items-center">
                <a href="{{ route('juego.iniciar') }}" class="btn-custom" onclick="playSound()">
                    <i class="fas fa-play-circle"></i> Jugar
                </a>
                <a href="{{ route('ranking') }}" class="btn-custom" onclick="playSound()">
                    <i class="fas fa-trophy"></i> Ranking
                </a>
                <a href="{{ route('progreso') }}" class="btn-custom" onclick="playSound()">
                    <i class="fas fa-chart-line"></i> Progreso
                </a>
            </div>
        </div>
    </div>

    <style>
        .btn-custom {
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e63946;
            color: white;
            font-size: 0.9em;
            padding: 8px 12px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            width: 100%;
            max-width: 150px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0px 3px 5px rgba(230, 57, 70, 0.5);
        }

        .btn-custom i {
            margin-right: 6px;
        }

        .btn-custom:hover {
            background: #d62828;
            box-shadow: 0px 4px 8px rgba(230, 57, 70, 0.8);
            transform: scale(1.05);
        }
    </style>

    <script>
        function playSound() {
            let sound = new Audio("{{ asset('sounds/button-click.mp3') }}");
            sound.play();
        }

        document.addEventListener("DOMContentLoaded", function () {
            let music = new Audio("{{ asset('sounds/background-music.mp3') }}");
            music.loop = true;
            music.volume = 0.5; // Volumen moderado
            music.play().catch(() => {
                document.addEventListener("click", () => {
                    music.play();
                }, { once: true });
            });
        });
    </script>
</x-app-layout>
