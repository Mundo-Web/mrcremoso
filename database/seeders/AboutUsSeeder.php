<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about_us')->insert([
            [
                'titulo' => 'Mr Cremoso todo lo que tu heladería necesita',
                'descripcion' => '',
                'imagen' => '',
                'status' => 1,
            ],
            [
                'titulo' => 'Historia',
                'descripcion' => 'Mr Cremoso una marca peruana que emergió desde el inmenso frío del invierno limeño',
                'imagen' => 'images/imagen/cremosonosotros.png',
                'status' => 1,
            ],
            [
                'titulo' => 'Misión y Visión',
                'descripcion' => '<p><strong>Misi&oacute;n</strong></p>

                <p>Somos una marca peruana l&iacute;der en la industria heladera, reconocida por nuestra innovaci&oacute;n y excelencia en cada desarrollo. Creamos formulaciones a medida seg&uacute;n las necesidades de cada cliente y abastecemos helader&iacute;as con insumos de alta calidad a precios justos. Asimismo, ofrecemos asesor&iacute;a especializada para maximizar la rentabilidad de sus negocios y asegurar su &eacute;xito</p>
                
                <p>&nbsp;</p>
                
                <p><strong>Visi&oacute;n</strong></p>
                
                <p>Revolucionar el sector heladero simplificando procesos y consolidarnos como la empresa peruana l&iacute;der en exportaci&oacute;n en LATAM. En los pr&oacute;ximos cinco a&ntilde;os, fortaleceremos nuestro liderazgo nacional mediante la innovaci&oacute;n y la excelencia en cada desarrollo, manteniendo altos est&aacute;ndares de calidad, precios justos y garantizando la rentabilidad y sostenibilidad de nuestros clientes.</p>
                
                <p>&nbsp;</p>
                
                <p><strong>Compromiso</strong></p>
                
                <p>Nos comprometemos a abastecer tu negocio con insumos de alta calidad, asegurando tu &eacute;xito en el mercado.&nbsp;<br />
                <strong>&ldquo;Somos Mr Cremoso todo lo que tu helader&iacute;a necesita&rdquo;</strong></p>',
                'imagen' => 'images/imagen/cremosonosotros2.png',
                'status' => 1,
            ],
            [
                'titulo' => '¿Por que trabajar con MrCremoso',
                'descripcion' => '<ul>
                <li>Por la excelencia en cada desarrollo de productos y a medida seg&uacute;n la necesidad de cada cliente, manteniendo los est&aacute;ndares de alta calidad.</li>
                <li>Por la variedad de productos de alta calidad para empresas y negocios.</li>
                <li>Acompa&ntilde;amiento constante a los clientes ofreciendo soluciones eficientes &nbsp;que permite minimizar sus riesgos de emprendedor y asegurando su &eacute;xito en el mercado.</li>
                <li>Por el abastecimiento &nbsp;r&aacute;pido y constante, ya que tenemos cobertura a nivel nacional.</li>
                </ul>',
                'imagen' => 'images/imagen/cremosonosotros.png',
                'status' => 1,
            ],
            [
                'titulo' => 'Responsabilidad Social',
                'descripcion' => '<ul>
                <li>Operamos esta industria sin contaminar el medio ambiente</li>
                <li>Socialmente, cooperamos con el entorno social desarrollando actividades comunitarias, y apoyando a ong&acute;s&hellip;.. colaborando con la sociedad.</li>
                <li>Seguridad y salud en el trabajo&hellip;. relacionado a nuestros trabajadores</li>
                <li>Seguridad alimentaria&hellip;&nbsp; relacionado a nuestros clientes</li>
                </ul>',
                'imagen' => 'images/imagen/cremosonosotros.png',
                'status' => 1,
            ],
            [
                'titulo' => 'Revolucionamos la Industria Heladera',
                'descripcion' => '<p>En Mr. Cremoso, hemos transformado la industria heladera. Gracias a nuestra base en polvo, hacer helado ahora es más fácil, rápido y rentable. Brindamos insumos y soluciones estratégicas que optimizan el negocio de nuestros clientes, impulsando su crecimiento y eficiencia. ¡Somos el cambio que revoluciona el mundo del helado</p>',
                'imagen' => 'images/imagen/cremosonosotros.png',
                'status' => 1,
            ],
            [
                'titulo' => 'Insumos de Calidad para Heladerías Excepcionales',
                'descripcion' => 'Sed non iaculis felis, eget egestas risus. Nullam vitae hendrerit purus. Suspendisse at sodales lectus. Nunc facilisis lorem id lacinia luctus.',
                'imagen' => 'images/imagen/conoscremoso.png',
                'status' => 1,
            ],
          
        ]);
    }
}
