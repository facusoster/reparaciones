<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reparacion;

class ReparacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reparacion::create([
            'cliente' => 'Juan Pérez',
            'marca' => 'Apple',
            'modelo' => 'iPhone 14 Pro Max',
            'descripcion_falla' => 'Pantalla rota y no responde al tacto',
            'fecha_ingreso' => '2026-06-01',
            'estado' => 'en_reparacion',
        ]);

        Reparacion::create([
            'cliente' => 'María García',
            'marca' => 'Samsung',
            'modelo' => 'Galaxy S23 Ultra',
            'descripcion_falla' => 'No carga la batería correctamente',
            'fecha_ingreso' => '2026-06-02',
            'estado' => 'ingresado',
        ]);

        Reparacion::create([
            'cliente' => 'Carlos López',
            'marca' => 'Xiaomi',
            'modelo' => 'Redmi Note 12',
            'descripcion_falla' => 'Cámara trasera no funciona',
            'fecha_ingreso' => '2026-05-28',
            'estado' => 'reparado',
        ]);

        Reparacion::create([
            'cliente' => 'Ana Rodríguez',
            'marca' => 'Google Pixel',
            'modelo' => 'Pixel 7 Pro',
            'descripcion_falla' => 'El micrófono tiene interferencia',
            'fecha_ingreso' => '2026-06-03',
            'estado' => 'ingresado',
        ]);

        Reparacion::create([
            'cliente' => 'Roberto Martínez',
            'marca' => 'Motorola',
            'modelo' => 'Edge 30 Ultra',
            'descripcion_falla' => 'Botón de encendido no responde',
            'fecha_ingreso' => '2026-05-30',
            'estado' => 'en_reparacion',
        ]);

        Reparacion::create([
            'cliente' => 'Laura Fernández',
            'marca' => 'Apple',
            'modelo' => 'iPhone 13',
            'descripcion_falla' => 'Fallo en el Face ID',
            'fecha_ingreso' => '2026-06-04',
            'estado' => 'reparado',
        ]);

        Reparacion::create([
            'cliente' => 'Diego Sánchez',
            'marca' => 'Samsung',
            'modelo' => 'Galaxy A52',
            'descripcion_falla' => 'Pantalla titila y se congela ocasionalmente',
            'fecha_ingreso' => '2026-06-05',
            'estado' => 'ingresado',
        ]);

        Reparacion::create([
            'cliente' => 'Sofía González',
            'marca' => 'OnePlus',
            'modelo' => 'OnePlus 11',
            'descripcion_falla' => 'Problema con el cargador rápido, carga lenta',
            'fecha_ingreso' => '2026-05-29',
            'estado' => 'en_reparacion',
        ]);

        Reparacion::create([
            'cliente' => 'Miguel Torres',
            'marca' => 'Huawei',
            'modelo' => 'P50 Pro',
            'descripcion_falla' => 'Daño por agua, no enciende',
            'fecha_ingreso' => '2026-06-06',
            'estado' => 'ingresado',
        ]);

        Reparacion::create([
            'cliente' => 'Claudia Ramírez',
            'marca' => 'LG',
            'modelo' => 'Velvet',
            'descripcion_falla' => 'Batería hinchada, requiere cambio urgente',
            'fecha_ingreso' => '2026-05-27',
            'estado' => 'entregado',
        ]);
    }
}
