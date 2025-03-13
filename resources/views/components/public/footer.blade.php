<footer class="bg-[#052F4E]">
    <style>
        #modalPoliticasDev, 
        #modalTerminosCondiciones,
        #modallinkPoliticasDatos,
        
        #modallinkTiempoEnvios,  
        #modallinkPlazoReembolso,  
        #modallinkTratamientoDatos,  
        #modallinkPoliticasCookies,  
        #modallinkCampanasPublicitarias,  
        #modallinkBeneficios,  
        #modallinkSeguimientoPedido,  
        #modallinkNuestrasTiendas  
        
        {
            height: 70vh;
            overflow-y: auto;
        }

        #modalPoliticasDev .prose,
        #modalTerminosCondiciones .prose,
        #modallinkPoliticasDatos .prose,
        #modalgaleria .prose,
        #modallinkTiempoEnvios  .prose,
        #modallinkPlazoReembolso  .prose,
        #modallinkTratamientoDatos  .prose,
        #modallinkPoliticasCookies  .prose,
        #modallinkCampanasPublicitarias  .prose,
        #modallinkBeneficios  .prose,
        #modallinkSeguimientoPedido  .prose,
        #modallinkNuestrasTiendas  .prose
        {
            max-width: 100%;
            text-align: justify;

        }

        .prose * {
            margin-bottom: 0% !important;
            margin-top: 0% !important;
            max-width: 100%!important;
        }
    </style>
    
    <div class="grid grid-cols-2 md:grid-cols-12 w-11/12 mx-auto py-10 gap-10 md:gap-5">
        
        <div class="md:col-span-3 xl:col-span-5 w-full md:max-w-[500px] flex flex-col gap-5" data-aos="fade-up" data-aos-offset="150">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/svg/cremosofooter.svg') }}" alt="MrCremoso" class="w-[180px]" />
            </a>
        </div>

        {{-- <div class="md:col-span-1 grid grid-cols-2 lg:grid-cols-7 gap-10 md:gap-5 justify-start items-start"> --}}

            <div class="flex flex-col gap-5 md:col-span-2 xl:col-span-2">
                <p class="font-galano_medium uppercase text-[#E1CBB3] text-lg">
                   ENLACES
                </p>
                <div class="flex flex-col gap-1 text-[#FFF9F1] font-galano_regular text-sm">
                    <a href="{{ route('index') }}">Inicio</a>
                    @if (count($services) > 0)
                        <a href="{{ route('servicios', $services->first()->id) }}">Servicios</a>
                    @endif
                    <a href="{{route('catalogo',0)}}">Productos</a>
                    <a href="{{route('rse')}}">Recetas</a>
                    <a href="{{route('blog',0)}}">Blog</a>
                    <a href="{{route('contacto')}}">Contacto</a>
                </div>
            </div>


            <div class="flex flex-col gap-5 md:col-span-4 xl:col-span-3">
                <p class="font-galano_medium uppercase text-[#E1CBB3] text-lg">
                   CONTACTO
                </p>
                <div class="flex flex-col gap-3 text-[#FFF9F1] font-galano_regular text-sm">
                    <span>{{ $general[0]->address }}, {{ $general[0]->inside }},
                                        {{ $general[0]->district }} - {{ $general[0]->city }}</span>
                    <span>Correo Electrónico: <br> {{ $general[0]->email }}</span> 
                    <span>Teléfono:<br> {{ $general[0]->cellphone }}</span>
                </div>
            </div>


            <div class="flex flex-col gap-5 cols-span-1 md:col-span-3 xl:col-span-2">
                <p class="font-galano_medium uppercase text-[#E1CBB3] text-lg">
                   AVISO LEGAL
                </p>
                <div class="flex flex-col gap-3 text-[#FFF9F1] font-galano_regular text-sm">
                    <a class="cursor-pointer" id="linkPoliticas">Política de Privacidad</a>
                    <a class="cursor-pointer" id="linkTerminos">Términos y Condiciones</a>
                    <a href="{{ route('librodereclamaciones') }}"><img class="w-24"
                        src="{{ asset('images/imagen/reclamaciones.png') }}" /></a>
                </div>
            </div>
 
        {{-- </div> --}}
    </div>

    <div
        class="flex flex-col items-center gap-3 md:flex-row md:justify-between md:items-center w-11/12 mx-auto pt-5 pb-10 border-t border-white">
        <a href="#" target="_blank" class="text-[#FFF9F1] font-galano_regular font-normal text-text14">&copy; 2024 Cremoso.
            Reservados todos los derechos</a>
        <div class="flex justify-start items-center gap-5">
        <div class="flex flex-row gap-2">
                    @if ($general[0]->facebook)
                        <a href="{{ $general[0]->facebook }}" target="_blank"
                            class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                            <img class="w-5 h-5" src="{{ asset('images/imagen/facebookcremoso.png') }}" alt="facebook" />
                        </a>
                    @endif
                    @if ($general[0]->instagram)
                        <a href="{{ $general[0]->instagram }}" target="_blank"
                            class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                            <img class="w-5 h-5" src="{{ asset('images/imagen/instagramcremoso.png') }}" alt="instagram" /> 
                        </a>
                    @endif
                    @if ($general[0]->linkedin)
                        <a href="{{ $general[0]->linkedin }}" target="_blank"
                            class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                            <img class="w-5 h-5" src="{{ asset('images/imagen/linkedincremoso.png') }}" alt="linkedin" />
                        </a>
                    @endif
                    @if ($general[0]->youtube)
                        <a href="{{ $general[0]->youtube }}" target="_blank"
                            class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                            <i class="fa-brands fa-youtube text-lg text-white"></i>
                        </a>
                    @endif
                    @if ($general[0]->tiktok)
                        <a href="{{ $general[0]->tiktok }}" target="_blank"
                            class="flex justify-start items-center gap-2 text-white font-roboto font-normal text-text14">
                            <i class="fa-brands fa-tiktok text-lg text-white"></i>
                        </a>
                    @endif
            </div>
        </div>
    </div>

    
    <div id="modalTerminosCondiciones" class="modal" style="max-width: 900px !important;width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Términos y Condiciones</h1>
            <div class="font-galano_regular prose p-2">{!! $terminos->content ?? '' !!}</div>
        </div>
    </div>

    <div id="modalPoliticasDev" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Política de privacidad</h1>
            <div class="font-galano_regular prose p-2">{!! $politicas->content ?? '' !!}</div>
        </div>
    </div>

    {{-- <div id="modallinkPoliticasDatos" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Políticas de Datos</h1>
            <div class="font-galano_regular prose p-2">{!! $politicaDatos->content ?? '' !!}</div>
        </div>
    </div> --}}
        
    {{-- <div id="modallinkTiempoEnvios" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Tiempo y Costos de Envío</h1>
            <div class="font-galano_regular prose p-2">{!! $TimeAndPriceDelivery->content ?? '' !!}</div>
        </div>
    </div> --}}

    {{-- <div id="modallinkPlazoReembolso" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Plazos de Reembolso</h1>
            <div class="font-galano_regular prose p-2">{!! $PlazosDeReembolso->content ?? '' !!}</div>
        </div>
    </div> --}}

    {{-- <div id="modallinkTratamientoDatos" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
      
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Tratamiento de Datos Adicional</h1>
            <div class="font-galano_regular prose p-2">{!! $TratamientoAdicionalDatos->content ?? '' !!}</div>
        </div>
    </div> --}}

    {{-- <div id="modallinkPoliticasCookies" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Políticas de Cookies</h1>
            <div class="font-galano_regular prose p-2">{!! $PoliticasCookies->content ?? '' !!}</div>
        </div>
    </div> --}}

    {{-- <div id="modallinkCampanasPublicitarias" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Campanas Publicitarias</h1>
            <div class="font-galano_regular prose p-2">{!! $CampanasPublicitarias->content ?? '' !!}</div>
        </div>
    </div> --}}

    {{-- <div id="modallinkBeneficios" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Beneficios 0% Intereses</h1>
            <div class="font-galano_regular prose p-2">{!! $BeneficiosSinIntereses->content ?? '' !!}</div>
        </div>
    </div> --}}

    {{-- <div id="modallinkSeguimientoPedido" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Seguimiento de Pedido</h1>
            <div class="font-galano_regular prose p-2">{!! $SeguimientoPedido->content ?? '' !!}</div>
        </div>
    </div> --}}

    {{-- <div id="modallinkNuestrasTiendas" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
       
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Nuestras Tiendas</h1>
            <div class="font-galano_regular prose p-2">{!! $NuestrasTiendas->content ?? '' !!}</div>
        </div>
    </div> --}}

</footer>


<script>
    $(document).ready(function() {


        $(document).on('click', '#linkTerminos', function() {
            $('#modalTerminosCondiciones').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#terminoslibro', function() {
            $('#modalTerminosCondiciones').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        $(document).on('click', '#linkPoliticas', function() {
            $('#modalPoliticasDev').modal({
                show: true,
                fadeDuration: 400,
            })
        })

        // $(document).on('click', '#linkPoliticasDatos', function() {
        //     $('#modallinkPoliticasDatos').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

        // $(document).on('click', '#linkTiempoEnvios', function() {
        //     $('#modallinkTiempoEnvios').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

        // $(document).on('click', '#linkPlazoReembolso', function() {
        //     $('#modallinkPlazoReembolso').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

        // $(document).on('click', '#linkTratamientoDatos', function() {
        //     $('#modallinkTratamientoDatos').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

        // $(document).on('click', '#linkPoliticasCookies', function() {
        //     $('#modallinkPoliticasCookies').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

        // $(document).on('click', '#linkCampanasPublicitarias', function() {
        //     $('#modallinkCampanasPublicitarias').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

        // $(document).on('click', '#linkBeneficios ', function() {
        //     $('#modallinkBeneficios ').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

        // $(document).on('click', '#linkSeguimientoPedido', function() {
        //     $('#modallinkSeguimientoPedido').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

        // $(document).on('click', '#linkNuestrasTiendas', function() {
        //     $('#modallinkNuestrasTiendas').modal({
        //         show: true,
        //         fadeDuration: 400,
        //     })
        // })

      

        function alerta(message) {
            Swal.fire({
                title: message,
                icon: "error",
            });
        }

        function validarEmail(value) {
            const regex =
                /^(([^<>()\[\]\\.,;:\s@”]+(\.[^<>()\[\]\\.,;:\s@”]+)*)|(“.+”))@((\[[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}\.[0–9]{1,3}])|(([a-zA-Z\-0–9]+\.)+[a-zA-Z]{2,}))$/

            if (!regex.test(value)) {
                alerta("Por favor, asegúrate de ingresar una dirección de correo electrónico válida");
                return false;
            }
            return true;
        }


        $("#subsEmail").submit(function(e) {

            console.log('enviando subscripcion');

            e.preventDefault();

            Swal.fire({

                title: 'Realizando suscripción',
                html: `Registrando... 
          <div class="max-w-2xl mx-auto overflow-hidden flex justify-center items-center mt-4">
              <div role="status">
              <svg aria-hidden="true" class="w-8 h-8 text-blue-600 animate-spin dark:text-gray-600 " viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
              </svg>

              </div>
          </div>
          `,
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });


            if (!validarEmail($('#emailFooter').val())) {
                return;
            };
            $.ajax({
                url: '{{ route('guardarUserNewsLetter') }}',
                method: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    Swal.close();
                    Swal.fire({
                        title: response.message,
                        icon: "success",
                    });
                    $('#subsEmail')[0].reset();
                },
                error: function(response) {
                    let message = ''

                    let isDuplicado = response.responseJSON.message.includes(
                        'Duplicate entry')
                    console.log(isDuplicado)

                    if (isDuplicado) {
                        message =
                            'El correo que ha ingresado ya existe. Utilice  otra direccion de correo'
                    } else {
                        message = response.responseJSON.message
                    }
                    Swal.close();
                    Swal.fire({
                        title: message,
                        icon: "error",
                    });
                }
            });

        })






    })
</script>
