<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Equipos</title>
    <style>
        .mantenimiento {
            background-color: #bd1010;
        }
    </style>
</head>
<body>

<h1>Listado de Equipos</h1>

<table border="1" cellpadding="5">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Marca</th>
            <th>Categoría</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipos as $equipo)
            <tr class="{{ $equipo->estado === 'reparacion' ? 'mantenimiento' : '' }}">
                <td>{{ $equipo->nombre }}</td>
                <td>{{ $equipo->marca }}</td>
                <td>{{ $equipo->categoria }}</td>
                <td>{{ $equipo->estado }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
