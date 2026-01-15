<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipo;

class EquipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $equipos = [
            ['nombre' => 'Teclado Logitech', 'marca' => 'Logitech', 'numero_serie' => 'SENA-0001', 'categoria' => 'Periféricos', 'estado' => 'en uso'],
            ['nombre' => 'Mouse Razer', 'marca' => 'Razer', 'numero_serie' => 'SENA-0002', 'categoria' => 'Periféricos', 'estado' => 'libre'],
            ['nombre' => 'Monitor Samsung', 'marca' => 'Samsung', 'numero_serie' => 'SENA-0003', 'categoria' => 'Monitores', 'estado' => 'reparacion'],
            ['nombre' => 'Laptop HP', 'marca' => 'HP', 'numero_serie' => 'SENA-0004', 'categoria' => 'Portátiles', 'estado' => 'en uso'],
            ['nombre' => 'Impresora Epson', 'marca' => 'Epson', 'numero_serie' => 'SENA-0005', 'categoria' => 'Impresoras', 'estado' => 'dado_de_baja'],
            ['nombre' => 'Teclado Microsoft', 'marca' => 'Microsoft', 'numero_serie' => 'SENA-0006', 'categoria' => 'Periféricos', 'estado' => 'en uso'],
            ['nombre' => 'Monitor LG', 'marca' => 'LG', 'numero_serie' => 'SENA-0007', 'categoria' => 'Monitores', 'estado' => 'libre'],
            ['nombre' => 'Laptop Dell', 'marca' => 'Dell', 'numero_serie' => 'SENA-0008', 'categoria' => 'Portátiles', 'estado' => 'reparacion'],
            ['nombre' => 'Mouse Logitech', 'marca' => 'Logitech', 'numero_serie' => 'SENA-0009', 'categoria' => 'Periféricos', 'estado' => 'en uso'],
            ['nombre' => 'Proyector Epson', 'marca' => 'Epson', 'numero_serie' => 'SENA-0010', 'categoria' => 'Proyectores', 'estado' => 'libre'],
        ];

        foreach ($equipos as $equipo) {
            Equipo::updateOrCreate(
                ['numero_serie' => $equipo['numero_serie']], // evita duplicados
                $equipo
            );
        }
    }
}
