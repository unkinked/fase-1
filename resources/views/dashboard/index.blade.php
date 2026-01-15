<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Inventario</title>
    <style>
        body {
            font-family: Arial;
            background: #f4f6f8;
        }
        .container {
            width: 90%;
            margin: auto;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0,0,0,.1);
            text-align: center;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📊 Dashboard de Inventario</h1>

    <div class="cards">
        <div class="card">
            <h3>Total Equipos</h3>
            <p>{{ $totalEquipos }}</p>
        </div>

        <div class="card">
            <h3>Disponibles</h3>
            <p>{{ $equiposDisponibles }}</p>
        </div>

        <div class="card">
            <h3>En Uso</h3>
            <p>{{ $equiposEnUso }}</p>
        </div>

        <div class="card">
            <h3>En Reparación</h3>
            <p>{{ $equiposReparacion }}</p>
        </div>

        <div class="card">
            <h3>Dado de Baja</h3>
            <p>{{ $equiposBaja }}</p>
        </div>

        <div class="card">
            <h3>Préstamos Activos</h3>
            <p>{{ $prestamosActivos }}</p>
        </div>
    </div>
</div>

</body>
</html>
