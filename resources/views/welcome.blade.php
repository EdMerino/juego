<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Preguntas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        body {
            background: url('https://source.unsplash.com/1600x900/?galaxy,nebula') no-repeat center center/cover;
            overflow: hidden;
        }
        .background-overlay {
            position: fixed;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: -1;
        }
        .main-container {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }
        .btn-play {
            background: #ff4757;
            color: white;
            font-size: 1.5rem;
            padding: 15px 40px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0px 4px 8px rgba(255, 71, 87, 0.5);
            transition: transform 0.3s ease-in-out;
        }
        .btn-play:hover {
            background: #e84118;
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="background-overlay"></div>
    <div class="main-container">
        <h1 class="title">🎮 Juego de Preguntas 🎮</h1>
        <p>¿Listo para jugar?</p>
        <a href="{{ route('login') }}" class="btn-play">Iniciar Sesión</a>
        <a href="{{ route('register') }}" class="btn-play">Registrarse</a>
    </div>
</body>
</html>

