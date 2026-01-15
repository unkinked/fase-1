<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Préstamo</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        select, button {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
        }

        button {
            background: #4f46e5;
            color: white;
            border: none;
            margin-top: 20px;
            cursor: pointer;
        }

        button:hover {
            background: #4338ca;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registrar Préstamo</h2>

    <form method="POST" action="#">
        @csrf

        <label for="user_id">Aprendiz</label>
        <select name="user_id" id="user_id">
            <option value="">Seleccione un aprendiz</option>
            {{-- usuarios aquí --}}
        </select>

        <label for="equipo_id">Equipo</label>
        <select name="equipo_id" id="equipo_id">
            <option value="">Seleccione un equipo</option>
            {{-- equipos aquí --}}
        </select>

        <button type="submit">Registrar Préstamo</button>
    </form>
</div>

</body>
</html>
