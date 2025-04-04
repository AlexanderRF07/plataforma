<!DOCTYPE html>
<html>
<head>
    <title>Crear Artista</title>
</head>
<body>
    <h1>Crear Nuevo Artista</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('artistas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="idevento">Evento:</label>
<select name="idevento" id="idevento">
    @foreach ($eventos as $evento)
        <option value="{{ $evento->id }}">{{ $evento->evento }}</option>
    @endforeach
</select>
        
        <br><br>

        <label for="nidentidad">N Identidad:</label>
        <input type="text" name="nidentidad" id="nidentidad"><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono"><br><br>

        <label for="foto">Foto:</label>
    <input type="file" name="foto" id="foto"><br><br>

        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion" id="descripcion"></textarea><br><br>

        <label for="fecharegistro">Fecha de Registro:</label>
        <input type="date" name="fecharegistro" id="fecharegistro"><br><br>

        <label for="estado">Estado:</label>
        <input type="text" name="estado" id="estado"><br><br>

        <button type="submit">Crear Artista</button>
    </form>
</body>
</html>