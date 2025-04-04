<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Artistas Activos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-header {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        .card-body img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .card-body p {
            margin: 10px 0;
        }

        .card-footer {
            background-color: #f7f7f7;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        @foreach ($artistas as $artist)
            <div class="card">
                <div class="card-header">
                    <h2>{{ $artist->nombre }}</h2>
                </div>
                <div class="card-body">
                    <p><strong>Documento:</strong> {{ $artist->nidentidad }}</p>
                    <p><strong>Descripción:</strong> {{ $artist->descripcion }}</p>
                    <p><strong>Teléfono:</strong> {{ $artist->telefono }}</p>
                    <img src="{{ $artist->foto }}" alt="Foto de {{ $artist->nombre }}">
                </div>
                <div class="card-footer">
                    <p>Artista Activo</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
