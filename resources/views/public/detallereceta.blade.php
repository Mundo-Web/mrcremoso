@extends('components.public.matrix', ['pagina' => 'rse'])

@section('title', 'Receta | ' . config('app.name', 'Laravel'))

@section('css_importados')

@stop

@section('content')
    <?php
    // Definición de la función capitalizeFirstLetter()
    // function capitalizeFirstLetter($string)
    // {
    //     return ucfirst($string);
    // }
    ?>
    <style>
        /* imagen de fondo transparente para calcar el dise;o */
        .clase_table {
            border-collapse: separate;
            border-spacing: 10;
        }

        .fixedWhastapp {
            right: 2vw !important;
        }

        .clase_table td {
            /* border: 1px solid black; */
            border-radius: 10px;
            -moz-border-radius: 10px;
            padding: 10px;
        }

        .swiper-pagination-bullet-active {
            background-color: #272727;
        }

        .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: #979693 !important;
        }

        .blocker {
            z-index: 20;
        }


        @media (min-width: 600px) {
            #offers .swiper-slide {
                margin-right: 100px !important;
            }

            #offers .swiper-slide::before {
                content: '+';
                display: block;
                position: absolute;
                top: 50%;
                right: -70px;
                transform: translateY(-50%);
                font-size: 32px;
                font-weight: bolder;
                color: #ffffff;
                padding: 0px 12px;
                background-color: #0d2e5e;
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0, 0, 0, .125);
            }

            #offers .swiper-slide:last-child::before {
                content: none;
            }

        }
    </style>

    <main  id="mainSection">
        @csrf
        <section class="w-full px-[5%] py-10 lg:py-20">
            
            <div class="grid grid-cols-1 2md:grid-cols-2 gap-10 md:gap-16">    
               
                <div class="flex flex-col justify-start items-center gap-5">
                    <div id="containerProductosdetail"
                        class="w-full flex justify-center items-center aspect-square overflow-hidden border rounded-3xl border-[#082252]">
                        <img src="{{ asset($receta->imagen) }}" alt="computer" class="w-full h-full object-contain"
                            data-aos="fade-up" data-aos-offset="150"
                            onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';">
                    </div>
                </div>  

                <div class="flex flex-col gap-3">
                     
                    <div class="text-[#052F4E] text-3xl xl:text-5xl font-normal font-galano_bold flex flex-col gap-3">
                       <h2>{{$receta->titulo}}</h2>
                    </div>

                    <div class="text-[#052F4E] text-lg font-normal font-galano_regular flex flex-col gap-3">
                       {!!$receta->descripcion!!}
                    </div>

                    <div class="grid grid-cols-2 3xs:grid-cols-3 2md:grid-cols-2 xl:grid-cols-3  gap-4">
                        @foreach ($receta->ingredients as $ingrediente)
                            <div class="bg-[#F2F5F7] border-[2px] border-[#052F4E66] rounded-xl flex flex-col gap-3 justify-around aspect-[17/20] max-w-[350px]">
                               
                                <div class="max-w-full flex flex-col items-center justify-center px-2 sm:px-5 pt-2 sm:pt-5">
                                    <img class="w-full h-[150px] md:h-[200px] 2md:h-[150px] xl:h-[150px] 2xl:h-[200px] object-contain object-bottom" alt="{{ $ingrediente->titulo }}" src="{{ asset($ingrediente->imagen)}}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" />
                                </div>

                                <div class="px-2 sm:px-5 pb-2 sm:pb-5">
                                    <h2 class="font-galano_regular xl:font-galano_semibold font-semibold text-[#052F4E] leading-5 text-base md:text-lg text-center line-clamp-2">{{ $ingrediente->titulo }}</h2>
                                </div>

                            </div>
                        @endforeach
                     </div>

                    <div class="text-[#052F4E] text-lg font-normal font-galano_regular flex flex-col gap-3">
                        {!!$receta->steps!!}
                     </div>
                </div>
            </div>
        </section>
        

        @if ($ProdComplementarios->isEmpty())
        @else
            <section>
                <div class="flex flex-col gap-10 w-full px-[5%] py-10 lg:py-16 bg-[#EBEDEF]">
                    <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
                        <div class="flex flex-col gap-2 max-w-4xl">
                            <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">Otras ideas:</h4>
                        </div>
                    </div>
                    <div class="w-full">  
                        <div class="swiper carruselproductos h-max">
                            <div class="swiper-wrapper">
                                @foreach ($ProdComplementarios as $item)
                                    <div class="swiper-slide">
                                        <x-product.card_receta_cremoso :item="$item" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>    
                </div>
            </section>
        @endif

       

    </main>

    <style>
        #zoomImage {
            transition: transform 0.3s ease;
        }
    </style>

@section('scripts_importados')
   
    <script>
        const zoomImage = document.getElementById('zoomImage');

        zoomImage.addEventListener('mousemove', (e) => {
            const rect = zoomImage.getBoundingClientRect();
            const x = e.clientX - rect.left; // Posición X del mouse en la imagen
            const y = e.clientY - rect.top;  // Posición Y del mouse en la imagen

            // Ajustar el nivel de zoom y la posición
            zoomImage.style.transformOrigin = `${x}px ${y}px`;
            zoomImage.style.transform = 'scale(1.5)'; // Ajusta el nivel de zoom según sea necesario
        });

        zoomImage.addEventListener('mouseleave', () => {
            zoomImage.style.transform = 'scale(1)'; // Restaura el zoom al salir
        });
    </script>
    <script>
        var swiper = new Swiper(".carruselproductos", {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination-carruseltop",
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                650: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                850: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1350: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });
    </script>
    <script>
        var headerServices = new Swiper(".productos-relacionados", {
            slidesPerView: 4,
            spaceBetween: 10,
            loop: false,
            centeredSlides: false,
            initialSlide: 0, // Empieza en el cuarto slide (índice 3) */
            /* pagination: {
              el: ".swiper-pagination-estadisticas",
              clickable: true,
            }, */
            //allowSlideNext: false,  //Bloquea el deslizamiento hacia el siguiente slide
            //allowSlidePrev: false,  //Bloquea el deslizamiento hacia el slide anterior
            allowTouchMove: true, // Bloquea el movimiento táctil
            autoplay: {
                delay: 5500,
                disableOnInteraction: true,
                pauseOnMouseEnter: true
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    centeredSlides: true,
                    loop: false,
                },
                420: {
                    slidesPerView: 2,
                    centeredSlides: false,

                },
                700: {
                    slidesPerView: 3,
                    centeredSlides: false,

                },
                850: {
                    slidesPerView: 4,
                    centeredSlides: false,

                },
            },
        });
    </script>

    <script> 
        function capitalizeFirstLetter(string) {
            string = string.toLowerCase()
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        // })
        $('#disminuir').on('click', function() {
            let cantidad = Number($('#cantidadSpan span').text())
            if (cantidad > 0) {
                cantidad--
                $('#cantidadSpan span').text(cantidad)
            }


        })
        // cantidadSpan
        $('#aumentar').on('click', function() {
            let cantidad = Number($('#cantidadSpan span').text())
            cantidad++
            $('#cantidadSpan span').text(cantidad)

        })
    </script>
    
    <script>
        $(document).ready(function() {

            $(document).on('click', '#linkmodal', function() {
            $('#modaltallas').modal({
                show: true,
                fadeDuration: 400,
            })
        })
            
        })
    </script>

    <script>
        tippy('#myButton', {
          content: 'My tooltip!',
        });
    </script>

    <script>
        var appUrl = <?php echo json_encode($url_env); ?>;
        
        $(document).ready(function() {
            articulosCarrito = Local.get('carrito') || [];
        });
        
    </script>
      
@stop

@stop
