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
            <div class="flex flex-col justify-start gap-5">
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


    <section class="flex flex-col gap-5 px-[5%] my-10 lg:my-16">
        <div class="grid grid-cols-1 xl:grid-cols-2 w-full  bg-[#EBEDEF] px-[5%] gap-0 lg:gap-16 rounded-xl">
            <div class="flex flex-col justify-center items-start gap-3 py-12 xl:py-16">
                <h1 class="text-[#052F4E] font-galano_semibold tracking-tight text-3xl leading-none">
                    {{$nosotros[3]->titulo ?? "Ingrese texto" }}
                </h1>
                <div class="text-[#052F4E] text-lg font-galano_regular">
                  {!! $nosotros[3]->descripcion ?? "Ingrese texto" !!}
                </div>
                <div class="flex flex-row justify-start items-start">
                    <a href="{{route('catalogo.all')}}"
                        class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-base font-galano_light font-semibold text-left">
                        Comprar ahora
                    </a>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center">
                <img src="{{ asset($nosotros[3]->imagen) }}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/conoscremoso.png') }}';" class="object-cover" />
            </div>
        </div>
    </section>


    {{-- <section>
            
      @if ($nosotros->isEmpty())
          
      @else
          <div class="w-11/12 mx-auto flex flex-col gap-8 my-5 lg:my-16 ">
              @foreach ($nosotros as $item)
              <div>
                  <h2 class="text-[#082252] font-roboto font-bold text-4xl lg:text-text48 leading-none">{{$item->titulo}}</h2>
                  <div class="text-[#082252] font-roboto font-normal text-text18 mt-3">
                          {!!$item->descripcion!!}
                  </div>
              </div>
              @endforeach
          </div>
      @endif

  </section> --}}


    {{-- seccion Ultimos Productos  --}}

    {{-- <section class="w-full px-[8%] py-10 lg:py-20 ">
      <div class="flex flex-col md:flex-col  w-full gap-3" data-aos="zoom-out-left">
        <h1 class="text-[22px] md:text-3xl font-semibold font-Inter_Medium  text-[#006BF6]">Sobre nosotros</h1>
        <h1 class="text-[48px] md:text-3xl font-semibold font-Inter_Medium  text-[#333333] mt-3">{{ $nosotros[2]->titulo }}
        </h1>


      </div>
      <div class="mt-6  text-justify grid grid-cols-1" id="Aboutus">
        <div class="col-span-1 text-[18px]">{!! $nosotros[2]->descripcion !!}</div>
        <div><img src="{{ asset($nosotros[2]->imagen) }}" alt=""></div>
      </div>

    </section> --}}



    {{-- seccion Productos populares  --}}

    {{-- <section class=" bg-[#F8F8F8]">
      <div class="w-full px-[5%] py-14 lg:py-20" data-aos="fade-down-left">
        <div class="pl-10 flex flex-col md:flex-row justify-between w-full gap-3">
          <h1 class="text-2xl md:text-3xl font-semibold font-Inter_Medium text-[#323232]">Misión</h1>
          <div class="flex  flex-col md:flex-row gap-2 md:gap-8">
              <a href="/catalogo" class="flex items-center   font-Inter_Medium  hover:text-[#006BF6] ">Todos</a>
              @foreach ($categoriasAll as $item)
                <a href="/catalogo/{{ $item->id }}"
                  class="flex items-center font-Inter_Medium  hover:text-[#006BF6]  transition ease-out duration-300 transform  ">{{ $item->name }}
                </a>
              @endforeach
            </div>
        </div> --}}

        {{-- <div class="grid grid-cols-1 md:grid-cols-2  gap-16 mt-14 w-full px-10 ">
          <div><img src="{{ asset($nosotros[0]->imagen) }}" alt=""></div>
          <div class="flex flex-col content-center text-center justify-center gap-16">
            <div class="flex flex-col items-center justify-center">
              <div class="rounded-full w-10 h-10 bg-[#006BF5] flex items-center justify-center mb-4">
                <img src="images/idea.png" alt="">
              </div>
              <h1 class="text-2xl md:text-3xl font-semibold font-Inter_Medium text-[#323232]">Nuestra Misión</h1>
              <div class="text-justify">{!! $nosotros[0]->descripcion !!}</div>
            </div>


            <div class="flex flex-col items-center justify-center">
              <div class="rounded-full w-10 h-10 bg-[#006BF5] flex items-center justify-center"><img src="images/idea.png"
                  alt="">
              </div>
              <h1 class="text-2xl md:text-3xl font-semibold font-Inter_Medium text-[#323232]">Nuestra Visión</h1>
              <div class=" text-justify">{!! $nosotros[3]->descripcion !!}</div>
            </div>


          </div>

        </div>

      </div>
    </section> --}}



    {{-- <section class="w-full px-[5%] py-7 lg:py-14" data-aos="fade-up" data-aos-offset="150">
      <div class="grid grid-cols-1 md:grid-cols-2 w-full">
        <div class=" flex flex-col md:flex-col  w-full gap-3 px-10">
          <h1 class="text-[22px] md:text-3xl font-semibold font-Inter_Medium  text-[#006BF6]">Nuestro sello de Garantia
          </h1>
          <h1 class="text-[48px] md:text-3xl font-semibold font-Inter_Medium  text-[#006BF6] mb-3">

            {{ $nosotros[1]->titulo }}
          </h1>
          <div class=" flex flex-col align-items-end  text-justify">{!! $nosotros[1]->descripcion !!}</div>

        </div>

        <div class="px-10"><img src="{{ asset($nosotros[1]->imagen) }}" alt="" class="object-cover"></div>


      </div>


    </section> --}}


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

  {{-- modalOfertas --}}



  <!-- Modal toggle -->


  <!-- Main modal -->
  {{-- 
  <div id="modalofertas" class="modal">

    <!-- Modal body -->
    <div class="p-1 ">
      <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
    </div>


  </div> --}}


@section('scripts_importados')

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
