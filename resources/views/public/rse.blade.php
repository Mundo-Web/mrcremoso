@extends('components.public.matrix', ['pagina' => 'rse'])

@section('css_importados')

@stop

@section('content')

    <main>

        <section>
            <div class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
                    <div class="flex flex-col gap-4 max-w-5xl mx-auto text-center">
                        <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">Haz que tu heladería destaque con estas recetas.</h4>
                        <h3 class="text-[#082252] font-galano_regular font-normal text-lg">
                          {{$textoshome->description2section ?? "Ingrese un texto"}}
                        </h3>
                    </div>
                </div>    
            </div>
        </section>

        <section>
            <div class="flex flex-col gap-10 w-full px-[5%] py-10 ">
                <div class="w-full">  
                    <div id="getProductAjax" class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-3 sm:gap-y-5 gap-x-5 sm:gap-x-8">
                          @foreach ($rse as $item)
                              <x-product.card_receta_cremoso :item="$item" />
                          @endforeach
                    </div>
                </div>
            </div>
      
            {{-- <div class="flex justify-center items-center mb-10">
                  <a href="javascript:;" @if (empty($page) || $page == 0) style="display:none;" @endif
                      data-page={{ $page }}
                      class="text-white py-3 px-5 border-2 bg-[#052F4E] rounded-xl font-galano_regular font-semibold  w-60 text-center  text-sm md:text-base  px-6 cargarMas">
                      Cargar más modelos
                  </a>
            </div> --}}
        </section>    


        @if ($testimonie->isEmpty())
        @else
            <section>
                <div class="flex flex-col gap-5 md:gap-10 w-full px-[5%] py-10 md:py-20 bg-[#EBEDEF]">
                    <div class="grid grid-cols-1 xl:grid-cols-3 gap-12">
                        <div class="md:col-span-2">
                            <h2 class="text-[#052F4E] text-2xl font-galano_bold max-w-lg">
                                {{$textoshome->subtitle9section ?? "Ingrese un texto"}}
                            </h2>
                            <div class="gap-6 py-6">
                                    <div class="swiper testimonios">
                                        <div class="swiper-wrapper">
                                            @foreach ($testimonie as $testimony)
                                            <div class="swiper-slide">
                                                <div class="flex flex-col gap-2 p-2 bg-white rounded-xl">
                                                    @if ($testimony->video)
                                                        <div class="w-full rounded-xl overflow-hidden video-container relative" controls>
                                                            <div class="absolute top-0 left-0 size-full poster-container">
                                                                <img class="w-full h-full object-cover size-full" src="https://i.ytimg.com/vi/{{ $testimony->video }}/hq720.jpg" onerror="this.onerror=null;this.src='{{ asset('images/img/noimagen.jpg') }}';"/>
                                                            </div>
                                                            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 play-icon-container cursor-pointer group-hover:scale-110 transition-transform duration-300"><img src="{{ asset('images/imagen/iconoplay.png') }}"/></div>
                                                            <iframe width="100%" height="250px" class="youtube-video rounded-xl overflow-hidden" src="https://www.youtube.com/embed/{{ $testimony->video }}"
                                                                frameborder="0"
                                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                                allowfullscreen></iframe>
                                                        </div>
                                                    @endif
                                                </div>  
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="flex flex-row justify-center">
                                            <div class="swiper-testimonios !flex justify-center py-3 mt-3 "></div>
                                        </div>
                                    </div>
                            </div>
                            <a id="abrirgaleria" class="bg-[#052F4E] text-white px-6 py-2.5 rounded-xl font-galano_medium mt-2"> Ver más historias </a>
                        </div>
                        <div class="md:col-span-1 space-y-3">
                            <h2 class="text-[#052F4E] text-5xl font-galano_bold max-w-xl leading-none">
                                    {{$textoshome->title9section ?? "Ingrese un texto"}}
                            </h2>
                            <div class="flex flex-row justify-start items-start">
                                <a
                                    class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-base font-galano_light font-semibold text-left">
                                    {{$textoshome->one_description9section ?? "Ingrese un texto"}}   
                                </a>
                            </div>
                            <h2 class="text-[#052F4E] text-lg font-galano_regular">
                                    {{$textoshome->two_description9section ?? "Ingrese un texto"}}   
                            </h2>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    </main>

    <div id="modalgaleria" class="modal" style="max-width: 900px !important; width: 100% !important;  ">
        <div class="p-4 flex flex-col gap-2">
            <h1 class="font-galano_bold text-2xl lg:text-3xl text-center">Testimonios</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($testimonie as $testimony)
                    @if ($testimony->imagen)
                        <img class="w-auto h-[300px] max-h-96 object-contain object-center mx-auto" src="{{$testimony->imagen}}"/>
                    @endif
                @endforeach
            </div>
        </div>
    </div>


@section('scripts_importados')
    <script>
        $(document).on('click', '#abrirgaleria', function() {
            $('#modalgaleria').modal({
                show: true,
                fadeDuration: 400,
            })
        })
        
        document.addEventListener('DOMContentLoaded', () => {

            const videoContainers = document.querySelectorAll('.video-container');

            videoContainers.forEach(container => {
                const playIcon = container.querySelector('.play-icon-container');
                const poster = container.querySelector('.poster-container');
                const iframe = container.querySelector('.youtube-video');
                
                playIcon.addEventListener('click', () => {

                    pauseAllVideos();
                    // Oculta el ícono y el póster
                    playIcon.style.display = 'none';
                    poster.style.display = 'none';

                    // Agrega autoplay al iframe
                    const src = iframe.getAttribute('src');
                    iframe.setAttribute('src', src + (src.includes('?') ? '&autoplay=1' : '?autoplay=1'));
                });
            });

            var swiper = new Swiper(".testimonios", {
                slidesPerView: 2,
                spaceBetween: 25,
                loop: true,
                grabCursor: true,
                centeredSlides: false,
                initialSlide: 0,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-testimonios",
                    clickable: true,
                    dynamicBullets: true,
                },

                breakpoints: {
                    0: {
                        slidesPerView: 1,
                        spaceBetween: 25,
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 25,
                    }
                },
                on: {
                        slideChange: function () {
                            pauseAllVideos();
                        },
                }
            });

            function pauseAllVideos() {
                videoContainers.forEach(container => {
                    const playIcon = container.querySelector('.play-icon-container');
                    const poster = container.querySelector('.poster-container');
                    const iframe = container.querySelector('.youtube-video');

                    // Reiniciar iframe src para pausar video
                    const src = iframe.getAttribute('src');
                    iframe.setAttribute('src', src.replace(/&?autoplay=1/, ''));

                    // Restaurar ícono y póster
                    playIcon.style.display = 'flex';
                    poster.style.display = 'block';
                
                });
            }

            
        });
    </script>
    <script>

        function calcularTotal() {
            let articulos = Local.get('carrito')
            let total = articulos.map(item => {
                let monto
                if (Number(item.descuento) !== 0) {
                    monto = item.cantidad * Number(item.descuento)
                } else {
                    monto = item.cantidad * Number(item.precio)

                }
                return monto

            })
            const suma = total.reduce((total, elemento) => total + elemento, 0);

            $('#itemsTotal').text(`S/. ${suma} `)

        }
        $(document).ready(function() {
            console.log(pops.length)
            if (pops.length > 0) {
                $('#modalofertas').modal({
                    show: true,
                    fadeDuration: 100
                })

            }


            $(document).ready(function() {
                articulosCarrito = Local.get('carrito') || [];

                // PintarCarrito();
            });

        })
    </script>


@stop

@stop
