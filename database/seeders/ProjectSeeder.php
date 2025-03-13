<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            [
                'titulo' => 'Sundae',
                'descripcion' => '<p>Quisque pharetra aliquet nibh bibendum vestibulum. Praesent mollis velit at dui venenatis, eu egestas neque suscipit. Maecenas et molestie augue, et rutrum augue. Aliquam mattis urna et nisi dignissim mattis.</p>',
                'imagen' => 'images/imagen/imagenhelado.png',
                'status' => 1,
                'steps' => '<p><span style="font-size:22px"><strong>Pasos de receta:</strong></span></p>
                <ul>
                    <li>Mezclar con 3 litros de agua</li>
                    <li>Verter sobre la maquina soft</li>
                    <li>Esperar 15 min y servir.</li>
                    <li>Decoraci&oacute;n:</li>
                    <li>Utilizar la jalea afrutada de cualquier sabor y agregar un topping, de tal forma que se vea deseable y antojable.</li>
                </ul>',
            ],
        ]);

        DB::table('ingredients')->insert([
            [
                'project_id' => 1,
                'titulo' => '1 Sobre de Mr Cremoso Premium',
                'imagen' => 'images/imagen/imagenhelado.png',
            ],
        ]);
    }
    
}
