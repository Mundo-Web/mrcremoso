<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog')->insert([
            [
                'category_id' => 1,
                'title' => '¿Sabían que Mr Cremoso esta revolucionando el Mercado Heladero?',
                'extract' => 'Así es como podemos leerlo. Mr cremoso es una marca peruana, que aplica tecnología italiana para el desarrollo de fórmulas que busca la simplificación de procesos en la producción de helados.',
                'description' => '<p>As&iacute; es como podemos leerlo. Mr cremoso es una marca peruana, que aplica tecnolog&iacute;a italiana para el desarrollo de f&oacute;rmulas que busca la simplificaci&oacute;n de procesos en la producci&oacute;n de helados.</p>
                <p>Qu&eacute;date aqu&iacute; y conoce m&aacute;s de Mr cremoso!</p>',
                'url_image' => 'images/imagen/',
                'name_image' => 'noimagenslider.jpg',
                'visible' => 1,
                'status' => 1,
            ],
        ]);
    }
}
