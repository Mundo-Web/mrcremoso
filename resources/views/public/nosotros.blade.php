@extends('components.public.matrix', ['pagina' => 'index'])

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


  ul {
      list-style-type: disc!important; 
      padding-left: 20px;   
  }
  li {
      margin-bottom: 10px;  
      margin-left: 20px;  
  }
   
</style>

@section('content')

  <main>

    {{-- <section class="bg-[#f1f1f1] ">
      <x-swipper-card :items="$slider" />
    </section> --}}

    <section class="px-[5%] pt-12 xl:pt-16">
      <div class="flex flex-col gap-2 max-w-3xl mx-auto">
          <h2 class="text-[#052F4E] font-maille text-4xl md:text-5xl leading-none text-left lg:text-center max-w-2xl mx-auto">
              {{$nosotros[0]->titulo ?? "Ingrese texto" }}
          </h2>
          <div class="text-[#052F4E] font-galano_regular text-lg text-left lg:text-center">
              {!! $nosotros[0]->descripcion ?? "Ingrese texto" !!}
          </div>
      </div>
   </section>


   <section class="pt-12 xl:pt-16 px-[5%]">
      <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-12 xl:gap-16">
          
          <div class="flex flex-col justify-center items-center">
              <img src="{{ asset($nosotros[1]->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/cremosonosotros.png') }}';" class="object-cover" />
          </div>
        
          <div class="flex flex-col justify-center gap-5 lg:gap-7">
              <h1
                  class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                  {{$nosotros[1]->titulo ?? "Ingrese texto" }}
              </h1>
              <div class="text-[#052F4E] text-lg font-galano_regular">
                  {!! $nosotros[1]->descripcion ?? "Ingrese texto" !!}
              </div>
          </div>

      </div>
    </section>



    <section class="flex flex-col gap-5 pt-12 xl:pt-16">
        <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-10 lg:gap-24 px-[5%] pb-12 xl:pb-16">
            <div class="flex flex-col justify-center gap-5">
              <h1
                    class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                    {{$nosotros[2]->titulo ?? "Ingrese texto" }}
              </h1>

              <div class="text-[#052F4E] text-lg font-galano_regular">
                  {!! $nosotros[2]->descripcion ?? "Ingrese texto" !!}
              </div>
               
            </div>

            <div class="flex flex-col justify-center items-center">

                <img src="{{ asset($nosotros[2]->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/cremosonosotros2.png') }}';" />
            </div>
        </div>
    </section>
    
    {{-- --------- --}}

    <section class="pt-12 xl:pt-16 px-[5%]">
      <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-12 xl:gap-16">
          <div class="flex flex-col justify-center items-center">
              <img src="{{ asset($nosotros[3]->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/cremosonosotros.png') }}';" class="object-cover" />
          </div>
        
          <div class="flex flex-col justify-center gap-5 lg:gap-7">
              <h1
                  class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                  {{$nosotros[3]->titulo ?? "Ingrese texto" }}
              </h1>
              <div class="text-[#052F4E] text-lg font-galano_regular">
                  {!! $nosotros[3]->descripcion ?? "Ingrese texto" !!}
              </div>
          </div>
      </div>
    </section>


    @if ($logos->isEmpty())
    @else
            <section class="py-6 bg-[#052F4E] mt-12 xl:mt-16 w-full px-[5%]">
                <div class="max-w-[700px] mx-auto pb-6">
                    <h2 class="text-white text-center font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                        Aliados Comerciales
                    </h2>
                </div>

                <div class="w-full mx-auto max-w-5xl relative">
                    <div class="swiper marcas h-max">
                        <div class="swiper-wrapper items-center ">
                            @foreach ($logos as $logo)
                                <div class="swiper-slide">
                                    <div class="flex justify-center items-center">
                                        <img src="{{ asset($logo->price) }}" alt="logo" />
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-logos-prev absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-16 z-20 bg-[#052F4E] border-white  rounded-full"><i class="fa-solid fa-circle-chevron-left text-5xl text-white"></i></div>
                    <div class="swiper-logos-next absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-16 z-20 bg-[#052F4E] border-white  rounded-full"><i class="fa-solid fa-circle-chevron-right text-5xl text-white"></i></div>
                </div>
            </section>
    @endif


    <section class="flex flex-col gap-5 pt-12 xl:pt-16">
        <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-10 lg:gap-24 px-[5%] pb-12 xl:pb-16">
            <div class="flex flex-col justify-center gap-5">
              <h1
                    class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                    {{$nosotros[4]->titulo ?? "Ingrese texto" }}
              </h1>

              <div class="text-[#052F4E] text-lg font-galano_regular">
                  {!! $nosotros[4]->descripcion ?? "Ingrese texto" !!}
              </div>
              
            </div>

            <div class="flex flex-col justify-center items-center">

                <img src="{{ asset($nosotros[4]->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/cremosonosotros2.png') }}';" />
            </div>
        </div>
    </section>


    <section class="pt-12 xl:pt-16 px-[5%]">
      <div class="grid grid-cols-1 xl:grid-cols-2 w-full gap-12 xl:gap-16">
          <div class="flex flex-col justify-center items-center">
              <img src="{{ asset($nosotros[5]->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/cremosonosotros.png') }}';" class="object-cover" />
          </div>
        
          <div class="flex flex-col justify-center gap-5 lg:gap-7">
              <h1
                  class="text-[#052F4E] font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                  {{$nosotros[5]->titulo ?? "Ingrese texto" }}
              </h1>
              <div class="text-[#052F4E] text-lg font-galano_regular">
                  {!! $nosotros[5]->descripcion ?? "Ingrese texto" !!}
              </div>
          </div>
      </div>
    </section>

  {{-- ------ --}}


    @if ($certificaciones->isEmpty())
    @else
              <section class="py-6 lg:py-10 bg-[#052F4E] mt-12 xl:mt-16 w-full px-[5%]">
                  <div class="max-w-[700px] mx-auto pb-6">
                      <h2 class="text-white text-center font-galano_bold tracking-tighter text-3xl md:text-5xl leading-none">
                          Certificaciones
                      </h2>
                  </div>

                  <div class="w-full mx-auto max-w-5xl relative">
                      <div class="swiper certificaciones h-max">
                          <div class="swiper-wrapper items-center ">
                              @foreach ($certificaciones as $cartificacion)
                                  <div class="swiper-slide">
                                      <div class="flex flex-col justify-center items-center gap-3 bg-white rounded-2xl px-7 py-5">
                                          <img src="{{ asset($cartificacion->url_image) }}" alt="logo" class="w-28 h-28 object-contain" />
                                          <h2 class="text-[#052F4E] text-center font-galano_bold tracking-tighter text-2xl leading-none">
                                            {{$cartificacion->title}}
                                          </h2>
                                          <p class="text-[#052F4E] text-center font-galano_regular tracking-tighter text-base">
                                            {{$cartificacion->description}}
                                          </p>
                                      </div>
                                  </div>
                              @endforeach
                          </div>
                      </div>
                      <div class="swiper-certificacion-prev absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-16 z-20 bg-[#052F4E] border-white  rounded-full"><i class="fa-solid fa-circle-chevron-left text-5xl text-white"></i></div>
                      <div class="swiper-certificacion-next absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-16 z-20 bg-[#052F4E] border-white  rounded-full"><i class="fa-solid fa-circle-chevron-right text-5xl text-white"></i></div>
                  </div>
              </section>
      @endif




    <section class="flex flex-col gap-5 px-[5%] my-10 lg:my-16">
        <div class="grid grid-cols-1 xl:grid-cols-2 w-full  bg-[#EBEDEF] px-[5%] gap-0 lg:gap-16 rounded-xl">
            <div class="flex flex-col justify-center items-start gap-3 py-12 xl:py-16">
                <h1 class="text-[#052F4E] font-galano_semibold tracking-tight text-3xl leading-none">
                    {{$nosotros[6]->titulo ?? "Ingrese texto" }}
                </h1>
                <div class="text-[#052F4E] text-lg font-galano_regular">
                  {!! $nosotros[6]->descripcion ?? "Ingrese texto" !!}
                </div>
                <div class="flex flex-row justify-start items-start">
                    <a href="{{route('catalogo.all')}}"
                        class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-base font-galano_light font-semibold text-left">
                        Comprar ahora
                    </a>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <img src="{{ asset($nosotros[6]->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/conoscremoso.png') }}';" class="object-cover" />
            </div>
        </div>
    </section>




    {{-- @if ($benefit->count() > 0)
      <section class="py-10 lg:py-13 bg-[#F8F8F8] w-full px[5%]" data-aos="zoom-out-right">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 ">
          @foreach ($benefit as $item)
            <div class="flex flex-col items-center w-full gap-1 justify-center text-center px-[10%] xl:px-[18%]">
              <img src="{{ asset($item->icono) }}" alt="">
              <h4 class="text-xl font-bold font-Inter_Medium"> {{ $item->titulo }} </h4>
              <div class="text-lg leading-8 text-[#444444] font-Inter_Medium">{!! $item->descripcionshort !!}</div>
            </div>
          @endforeach
        </div>
      </section>
    @endif --}}





  </main>


  <!-- Main modal -->
  {{-- 
    <div id="modalofertas" class="modal">

      <!-- Modal body -->
      <div class="p-1 ">
        <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
      </div>
    </div> 
  --}}


@section('scripts_importados')

  <script>
    
    var swiper = new Swiper(".marcas", {
            slidesPerView: 6,
            spaceBetween: 30,
            centeredSlides: false,
            initialSlide: 0,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
             navigation: {
                nextEl: ".swiper-logos-next",
                prevEl: ".swiper-logos-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 3,
                    centeredSlides: false,
                },
                1024: {
                    slidesPerView: 6,
                    centeredSlides: false,
                },
            },
     });

     var swiper = new Swiper(".certificaciones", {
            slidesPerView: 3,
            spaceBetween: 30,
            centeredSlides: false,
            initialSlide: 0,
            loop: true,
            autoplay: {
                delay: 1500,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: ".swiper-certificacion-next",
                prevEl: ".swiper-certificacion-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    centeredSlides: true,
                },
                768: {
                    slidesPerView: 2,
                    centeredSlides: false,
                },
                1024: {
                    slidesPerView: 3,
                    centeredSlides: false,
                },
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

<script src="/ckeditor/ckeditor.js"></script>
<script>
   CKEDITOR.replace('description', {
        toolbar: [
            { name: 'document', items: ['Source'] }, // Código fuente
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', '-', 'Undo', 'Redo'] },
            { name: 'styles', items: ['Styles', 'Format', 'FontSize'] }, // Tamaño y fuente
            { name: 'colors', items: ['TextColor', 'BGColor'] }, // Color de texto y fondo
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', '-', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Blockquote'] },
            { name: 'insert', items: ['Table', 'HorizontalRule'] },
            { name: 'links', items: ['Link', 'Unlink'] },
            { name: 'tools', items: ['Maximize'] } // Maximizar
        ],
        extraPlugins: 'colorbutton,font', // Activa plugins para color y fuentes
        removePlugins: 'elementspath', // Elimina la ruta de elementos
        resize_enabled: true // Permite redimensionar el editor
    });
</script>

@stop

@stop
