@extends('components.public.matrix', ['pagina' => 'rse'])

@section('css_importados')

@stop

<style>
    #Aboutus .prose {
        width: 100%;
        max-width: 100%;
        text-align: justify;
        margin-top: 0 !important;
        margin-bottom: 0 !important;
    }

    .prose p {

        margin-top: 0 !important;
        margin-bottom: 0 !important;

    }

    @media (max-width: 600px) {
        .fixedWhastapp {
            right: 116px !important;
        }
    }

    .swiper-testimonios .swiper-pagination-bullet {
            width: 14px;
            height: 8px;
            border-radius: 6px;
            background-color: #052F4E !important;
        
    }

    .swiper-testimonios .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: #05304e56!important;
            opacity: 1;
    }
</style>

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
                <div class="flex flex-col gap-5 md:gap-10 w-full px-[5%] py-10 md:py-16  bg-[#EBEDEF]">
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
                                                <div class="flex flex-col gap-2 p-3 bg-white rounded-xl line-clamp-5">
                                                    <h2 class="text-[#052F4E] text-sm font-galano_regular">
                                                        {{ $testimony->testimonie }}
                                                    </h2>
                                                    <h2 class="text-[#052F4E] text-lg font-galano_medium leading-none">
                                                        {{ $testimony->name }}</h2>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="swiper-testimonios !flex justify-center py-3 mt-3"></div>
                                </div>
                            </div>
                          
                        </div>
                        <div class="md:col-span-1 space-y-3">
                            <h2 class="text-[#052F4E] text-5xl font-galano_bold max-w-xl leading-none">
                                {{$textoshome->title9section ?? "Ingrese un texto"}}
                            </h2>
                            <div class="flex flex-row justify-start items-start">
                                <a href="#"
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




@section('scripts_importados')

    <script>

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
                clickable: true
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
        });


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
