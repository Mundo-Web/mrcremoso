<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('services')->insert([
            [
                'title' => 'Marca Blanca',
                'description' => '<p>Desarrollo de productos en la que los clientes podr&aacute; colocar su marca en el producto.</p>',
                'namebutton' => 'Pon tu marca aquí',
                'link' => '/',
                'visible' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Maquila',
                'description' => '<p>Ponemos toda nuestra ingenier&iacute;a e innovaci&oacute;n en procesos de producci&oacute;n y envasado en l&iacute;nea seca (mezclas de productos en polvo), a disposici&oacute;n de la distinguida clientela</p>',
                'namebutton' => '',
                'link' => '',
                'visible' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Formulación para Helados',
                'description' => '<p>Desarrollo de productos en la que los clientes podr&aacute; colocar su marca en el producto.</p>',
                'namebutton' => '',
                'link' => '',
                'visible' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Servicio técnico',
                'description' => '<p>La experiencia de nuestros t&eacute;cnicos, solucionar&aacute; los inconvenientes con sus equipos de trabajo de una forma r&aacute;pida y efectiva; y a trav&eacute;s de una capacitaci&oacute;n te ayudar&aacute; a prever futuras t&eacute;cnicas con tus equipos</p>',
                'namebutton' => '',
                'link' => '',
                'visible' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Alquiler y préstamo de máquinas para eventos',
                'description' => '<p>Realizamos pr&eacute;stamos y alquiler de m&aacute;quinas a cambio de usar nuestros productos</p>',
                'namebutton' => '',
                'link' => '',
                'visible' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Complemento Catering',
                'description' => '<p>Pr&eacute;stamos las m&aacute;quinas para catering.</p>',
                'namebutton' => '',
                'link' => '',
                'visible' => 1,
                'status' => 1,
            ],
          
        ]);
        
    }
}
