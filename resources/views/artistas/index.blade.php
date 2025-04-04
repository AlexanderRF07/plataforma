<!DOCTYPE html>
<html>

<head>
    <title>Lista de Artistas</title>
</head>

<body>
    <h1>Lista de Artistas</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Foto</th>
                <th>Descripción</th>
                <th>Fecha de Registro</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($artistas as $artist)
                <tr>
                    <td>{{ $artist->nombre }}</td>
                    <td>{{ $artist->email }}</td>
                    <td>{{ $artist->telefono }}</td>
                    <td>
                        @if ($artist->foto)
                            <img src="{{ Storage::url($artist->foto) }}" alt="Foto del artista">
                        @endif
                    </td>
                    <td>{{ $artist->descripcion }}</td>
                    <td>{{ $artist->fecharegistro }}</td>
                    <td>{{ $artist->estado }}</td>
                    <td>
                        <form action="{{ route('artistas.toggleStatus', $artist->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit">{{ $artist->estado == 'Activo' ? 'Desactivar' : 'Activar' }}</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>