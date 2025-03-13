<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\General;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        General::updateOrCreate([
            'id' => 1
        ],[
            'address' => 'Av. Aramburu 1506',
            'inside' => 'Oficina 404 - Piso 4',
            'district' => 'Miraflores',
            'schedule' => "De Lunes a Viernes de 9:00am a 6:00pm y Sábados de 9:00am a 1:00pm",
            'city' => 'Lima',
            'country' => 'Perú',
            'cellphone' => '555-555-123' ,
            'office_phone' => '5555-1025' ,
            'email' => 'usuario@mundoweb.pe',
            'facebook' => 'https://www.facebook.com/mrcremoso.peru',
            'instagram' => 'https://www.instagram.com/mrcremoso_peru',
            'youtube' => 'https://www.youtube.com/@mrcremosobaseparahelados',
            'tiktok' => 'https://www.tiktok.com/@mrcremoso_peru',
            'linkedin' => 'https://www.linkedin.com/in/mr-cremoso-per%C3%BA-938b63234/',
            'twitter' => 'www.twitter.com',
            'whatsapp' => '555-555-123' ,
            'form_email' => 'usuario@mundoweb.pe',
            'business_hours' => 'horas',
            'mensaje_whatsapp' => 'Hola estamos atentos a lo que ud desee',
            'htop' =>'Las mejores ofertas',
            'aboutus' => '@cremosos',
            'ig_token' => 'Free delivery',
            'contacto' => '
            <ul>
            </ul>

            <h2><span style="font-size:20px"><strong>Atenci&oacute;n al cliente</strong></span></h2>

            <ul>
                <li><span style="font-size:16px">atclientes@mrcremoso.com.pe</span></li>
                <li><span style="font-size:16px">(+51) 905461259</span></li>
            </ul>

            <h2><span style="font-size:20px"><strong>Ventas</strong></span></h2>

            <ul>
                <li><span style="font-size:16px">ventas@mrcremoso.com.pe</span></li>
                <li><span style="font-size:16px">(+51) 947295946</span></li>
            </ul>

            <h2><span style="font-size:20px"><strong>Quieres ser distribuidor</strong></span></h2>

            <ul>
                <li><span style="font-size:16px">b2b@mrcremoso.com.pe</span></li>
                <li><span style="font-size:16px">(+51) 905461227</span></li>
            </ul>

            <h2><span style="font-size:20px"><strong>Canal B2B (Atenci&oacute;</strong><strong>n exclusiva a cadenas y franquicias)</strong></span></h2>

            <ul>
                <li><span style="font-size:16px">b2b@mrcremoso.com.pe</span></li>
                <li><span style="font-size:16px">(+51) 905461227</span></li>
            </ul>',

            'sedeslima' => '
            <h2><span style="font-size:20px"><strong>Sedes en Lima</strong></span></h2>
            <ul>
                <li><span style="font-size:16px">VILLA EL SALVADOR: Av. Central.</span></li>
                <li><span style="font-size:16px">SAN JUAN DE MIRAFLORES: Calle los Rosales Mz O lote 23.</span></li>
                <li><span style="font-size:16px">ATE: Av. Prolongaci&oacute;n Javier Prado &nbsp;Mz C2 Lt 16.</span></li>
                <li><span style="font-size:16px">HUAYCAN: UCV 25 lote 3 Zona B Calle Las Flores.</span></li>
                <li><span style="font-size:16px">SAN JUAN DE LURIGANCHO: Av. 1ro de mayo 3083.</span></li>
                <li><span style="font-size:16px">LA VICTORIA: Av. M&eacute;xico 2204.</span></li>
                <li><span style="font-size:16px">COMAS: Av. T&uacute;pac Amaru 5305 urb. Huaquillay.</span></li>
                <li><span style="font-size:16px">CALLAO: Mz J lote 9 sec. San Juan Masias.</span></li>
            </ul>',

            'sedesnacional' => '
            <h2><span style="font-size:20px"><strong>Sedes a Nivel Nacional</strong></span></h2>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Piura:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Av circunvalaci&oacute;n Mz B4, Lt 07 &ndash; Piura.</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 985802484</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Ja<span style="color:black">&eacute;</span>n:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Calle San Carlos 308 &ndash; Ja&eacute;n.</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 921325979</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Cajamarca:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Pasaje Mar&iacute;a auxiliadora 130 &ndash; Cajamarca.</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 976000323</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Chiclayo:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Av. Agricultura 700 &ndash; Chiclayo.</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 945712807</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Trujillo:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Lloque Yupanqui 302 &ndash; Trujillo</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 940230855</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Tarapoto:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Jr Martin de la Riva y herrera N&deg; 276</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 942018895</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Huanuco:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Jr. Hermilio Valdizan 125 &ndash; Pillco marca &ndash; Hu&aacute;nuco</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 973352409</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Junin:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Jr. Hu&aacute;nuco 175 &ndash; Huancayo</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 967249528</span></span></li>
                <li><span style="font-size:11.0pt"><span style="color:black">Jr. Ancash 1131</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 971338162</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Cusco:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Av. Tres cruces de Oro N&deg; 285</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 947295946</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Ayacucho:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Calle Nazareno 101 - 108</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 947295946</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Arequipa:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Horacio Zeballos Gomez Mz 1 &ndash; Lote 16 &ndash; Socabaya&nbsp;</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 948060917</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Moquegua:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Calle Omate 113 - Moquegua</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 953503559</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Tacna:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Av. La Cultura Mz A2 lote 1 &ndash; Tacna.</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 951448036</span></span></li>
            </ul>

            <h2><span style="font-size:18px"><strong>Mr Cremoso en Juliaca:</strong></span></h2>

            <ul>
                <li><span style="font-size:11.0pt"><span style="color:black">Jr Sandia 674 int 126</span></span></li>
                <li><span style="font-size:11pt"><span style="color:black">Cel. 950054426</span></span></li>
            </ul>',
        ]);
    }
}
