@extends('components.public.matrix', ['pagina' => 'index'])
@section('css_importados')
    <style>
        @media (max-width: 600px) {
            .fixedWhastapp {
                right: 13px !important;
            }
        }

        .swiper-slider .swiper-pagination-bullet {
            width: 14px;
            height: 8px;
            border-radius: 6px;
            background-color: #ffffff !important;
        
        }

        .swiper-slider .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: rgba(255, 255, 255, 0.24)!important;
            opacity: 1;
        }

        .swiper-pagination-categorias .swiper-pagination-bullet {
            width: 14px;
            height: 8px;
            border-radius: 6px;
            background-color: #052F4E !important;
        
        }

        .swiper-pagination-categorias .swiper-pagination-bullet:not(.swiper-pagination-bullet-active) {
            background-color: #05304e56!important;
            opacity: 1;
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

        .prose{
            line-height: 1.25;       
        }

        .extractoblog .prose{
            overflow: hidden;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 3;
        }
    </style>
@stop

@php
    $bannersBottom = array_filter($banners, function ($banner) {
        return $banner['potition'] === 'inferior';
    });
    $bannerMid = array_filter($banners, function ($banner) {
        return $banner['potition'] === 'medio';
    });
@endphp

@section('content')

    <main class="z-[15]">

    {{-- @if (count($slider) > 0) 
        <section class="">
          <x-swipper-card :items="$slider" />
        </section>
      @endif --}}

      @if ($slider->isEmpty())
      @else
        <section class="w-full bg-[#052F4E] relative h-[700px] md:h-[550px]">
            <div class="w-full h-full absolute size-full"><img class="object-cover size-full" src="{{asset('images/imagen/texturacremosof.png')}}"/></div>
            <div class=" px-[5%] h-full flex flex-col">
                <div class="h-[580px] md:h-[420px] mt-10 lg:mt-16">
                <div class="swiper slider">
                    <div class="swiper-wrapper">
                        @foreach ($slider as $slide)
                            <div class="swiper-slide">
                                <div class="flex flex-col justify-center items-center w-full">
                                    <div class="bg-[#E6E4E5] h-[580px] md:h-[420px] gap-7 sm:gap-0 flex flex-col md:flex-row rounded-xl overflow-hidden w-full">
                                        <div class="flex flex-col h-[300px] sm:h-[350px] md:h-full justify-start md:justify-center gap-6 w-full lg:w-1/2 2xl:w-2/3 text-left pt-6 md:pt-0 px-[5%] lg:pl-[5%] lg:pr-0">
                                            <h2 class="text-[#052F4E] font-maille text-text28 sm:text-4xl md:text-text44 leading-none line-clamp-3">
                                                {{$slide->title ?? "Ingrese un texto para el titulo del slider"}}</h2>
                                            <p class="text-[#052F4E] font-galano_regular line-clamp-4">
                                                {{$slide->description ?? "Ingrese un texto para la descripcion del slider"}}</p>
                                            <div class="flex flex-row items-start justify-start">
                                                <a href="{{$slide->link1}}"><div class="text-white font-galano_semibold bg-[#052f4e] rounded-xl text-center w-auto py-2 px-6">{{$slide->botontext1 ?? "Comprar ahora"}}</div></a>
                                            </div>    
                                        </div>
                                        <div class="flex flex-col h-[280px] sm:h-[230px] md:h-full justify-center items-center w-full lg:w-1/2 2xl:w-1/3">
                                                <img src="{{ asset($slide->url_image . $slide->name_image) }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('images/imagen/helados.png') }}';" alt="producto"
                                                    class="w-full h-full object-contain md:object-cover  object-right md:object-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach    
                    </div>
                    <div class="swiper-slider !flex justify-center py-3 mt-3"></div>
                </div>
                </div>  
            </div>    
        </section>
      @endif


      @if ($categorias->isEmpty())  
      @else
        <section>
            <div class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
                    <div class="flex flex-col gap-2 max-w-4xl">
                        <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">{{$textoshome->title1section ?? "Ingrese un texto"}}</h4>
                        <h3 class="text-[#082252] font-galano_regular font-normal text-lg">
                            {{$textoshome->description1section ?? "Ingrese un texto"}}
                        </h3>
                    </div>
                    <div class="flex flex-row justify-start md:justify-center items-start">
                        <a href="{{route('catalogo.all')}}"
                            class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                            Ver todos los productos
                        </a>
                    </div>
                </div>
               
                <div class="w-full relative">  
                    <div class="swiper categorias h-max ">
                        <div class="swiper-wrapper">
                            @foreach ($categorias as $categoria)  
                                <div class="swiper-slide group">
                                    <div class="flex flex-col justify-center px-10 py-8 relative bg-[#EBEDEF] rounded-xl min-h-[210px] max-w-[300px] mx-auto transition-all duration-300 ease-in-out group-hover:bg-[#052F4E]">  
                                        <a href="{{ route('catalogo', $categoria->id ) }}">   
                                            <div class="flex flex-row w-full bottom-5">
                                                <div class="flex flex-col gap-4 justify-center items-center w-full">
                                                    {{-- <svg class="transition-all duration-300 ease-in-out " xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 65 65" fill="none">
                                                        <path class="group-hover:stroke-white" d="M20.5 32.6582L22.7051 39.8467C26.6886 52.8321 28.6803 59.3249 32.5 59.3249C36.3197 59.3249 38.3115 52.8321 42.2949 39.8467L44.5 32.6582" stroke="#052F4E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path class="group-hover:stroke-white" d="M32.5026 23.7719C32.5026 25.3633 32.9418 26.857 33.7109 28.1491M33.7109 28.1491C31.7487 30.8736 28.4559 32.6608 24.7248 32.6608C18.7111 32.6608 13.8359 28.0179 13.8359 22.2904C13.8359 17.2682 17.5846 13.0797 22.5624 12.1245C24.2644 8.51105 28.0749 5.99414 32.5026 5.99414C38.0277 5.99414 42.5914 9.91299 43.297 14.9913M33.7109 28.1491C35.3143 30.8429 38.3522 32.6608 41.8359 32.6608C46.9906 32.6608 51.1693 28.6811 51.1693 23.7719C51.1693 19.3361 47.7575 15.6591 43.297 14.9913M43.297 14.9913C43.3594 15.4406 43.3914 15.899 43.3914 16.3645C43.3914 17.955 43.0154 19.4619 42.3437 20.809" stroke="#052F4E" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg> --}}
                                                    <img class="group-hover:stroke-white group-hover:brightness-0 group-hover:invert" src="{{ asset($categoria->url_image . $categoria->name_image) }}" 
                                                    onerror="this.onerror=null;this.src='{{ asset('images/svg/heladoicono.svg') }}';" alt="producto"
                                                    class="w-full h-full object-contain md:object-cover object-right md:object-center">

                                                    <h2 class="text-[#052F4E] font-galano_semibold text-2xl text-center max-w-[200px] mx-auto line-clamp-2 transition-all duration-300 ease-in-out group-hover:text-white">
                                                        {{$categoria->name ?? "Nombre de categoria"}}
                                                    </h2>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach 
                        </div> 
                        
                    </div>
                    <div class="swiper-categorias-prev absolute top-1/2 -translate-y-1/2 -left-2 lg:-left-5 z-20 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-left text-5xl text-[#052F4E]"></i></div>
                    <div class="swiper-categorias-next absolute top-1/2 -translate-y-1/2 -right-2 lg:-right-5 z-20 bg-white rounded-full"><i class="fa-solid fa-circle-chevron-right text-5xl text-[#052F4E]"></i></div>
                </div>
            </div>
        </section>
      @endif
    
      @if ($productosPupulares->isEmpty())
      @else   
        <section id="productoscarrusel">
            <div class="flex flex-col gap-10 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col xl:flex-row xl:justify-between items-start xl:items-center gap-5">
                    <div class="flex flex-col gap-2 max-w-4xl">
                        <h4 class="font-galano_bold text-text32 md:text-text40 text-[#082252] leading-none">{{$textoshome->title2section ?? "Ingrese un texto"}}</h4>
                        <h3 class="text-[#082252] font-galano_regular font-normal text-lg">
                            {{$textoshome->description2section ?? "Ingrese un texto"}}
                        </h3>
                    </div>
                    <div class="flex flex-row justify-start md:justify-center items-start">
                        <a href="{{route('catalogo.all')}}"
                            class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                            Ver todos los productos
                        </a>
                    </div>
                </div>    
                <div class="w-full">  
                    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-y-5 gap-x-8">
                        @foreach ($productosPupulares as $item)
                            <x-product.card_product_cremoso :item="$item" />
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
      @endif


    <section>
        <div class="flex flex-col gap-10 w-full px-[5%] pt-10 pb-10 lg:pb-0 bg-[#052F4E] mt-10 lg:mt-16">
            <h2 class="text-white font-maille text-text36 sm:text-4xl md:text-text44 leading-none text-center">
                {{$textoshome->title3section ?? "Ingrese un texto"}}
            </h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 lg:gap-0">
                <div class="flex flex-col gap-4 sm:gap-10 lg:flex-col justify-center">

                    <div class="flex flex-col gap-1 lg:gap-2 p-0 lg:p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado.png')}}" />
                        <h2 class="text-white text-base md:text-lg lg:text-xl xl:text-2xl font-galano_medium leading-none sm:leading-normal">{{$textoshome->title4section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-xs md:text-sm lg:text-base xl:text-lg font-galano_regular"> {{$textoshome->description4section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[30px] w-auto object-contain -right-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha1.png')}}" />
                    </div>

                    <div class="flex flex-col gap-1 lg:gap-2 p-0 lg:p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado2.png')}}" />
                        <h2 class="text-white text-base md:text-lg lg:text-xl xl:text-2xl font-galano_medium leading-none sm:leading-normal">{{$textoshome->title5section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-xs md:text-sm lg:text-base xl:text-lg font-galano_regular"> {{$textoshome->description5section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[25px] w-auto object-contain -right-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha2.png')}}" />
                    </div>

                    <div class="flex flex-col gap-1 lg:gap-2 p-0 lg:p-2 max-w-xs relative sm:hidden">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado3.png')}}" />
                        <h2 class="text-white text-base md:text-lg lg:text-xl xl:text-2xl font-galano_medium leading-none sm:leading-normal">{{$textoshome->title6section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-xs md:text-sm lg:text-base xl:text-lg font-galano_regular"> {{$textoshome->description6section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[40px] w-auto object-contain -left-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha3.png')}}" />
                    </div>

                    <div class="flex flex-col gap-1 lg:gap-2 p-0 lg:p-2 max-w-xs relative sm:hidden">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado4.png')}}" />
                        <h2 class="text-white text-base md:text-lg lg:text-xl xl:text-2xl font-galano_medium leading-none sm:leading-normal">{{$textoshome->title7section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-xs md:text-sm lg:text-base xl:text-lg font-galano_regular"> {{$textoshome->description7section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[80px] w-auto object-contain -left-[130px] top-0 translate-y-0" src="{{asset('images/imagen/flecha4.png')}}" />
                    </div>
                    
                </div>

                <div class="flex flex-col justify-center sm:justify-end items-center">
                    <img class="h-[550px] lg:h-[550px] w-full object-contain object-bottom" src="{{asset($textoshome->url_image3section)}}"
                    onerror="this.onerror=null;this.src='{{ asset('images/imagen/mixto.png') }}';" alt="producto" />
                    <div class="lg:hidden flex flex-row justify-start md:justify-center items-start -mt-28">
                        <a href="#productoscarrusel"
                            class="text-[#052F4E] py-3 px-6 bg-white rounded-xl text-xs lg:text-base font-galano_regular font-semibold text-center max-w-xs mx-auto">
                            ¡Prueba la diferencia y dale un gusto a tu día!
                        </a>
                    </div>
                </div>

                <div class="sm:flex flex-col gap-5 sm:gap-10 lg:flex-col justify-center items-start lg:items-end hidden">
                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado3.png')}}" />
                        <h2 class="text-white text-base md:text-lg lg:text-xl xl:text-2xl font-galano_medium leading-none sm:leading-normal">{{$textoshome->title6section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-xs md:text-sm lg:text-base xl:text-lg font-galano_regular"> {{$textoshome->description6section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[40px] w-auto object-contain -left-1/2 top-1/2 translate-y-1/2" src="{{asset('images/imagen/flecha3.png')}}" />
                    </div>

                    <div class="flex flex-col gap-2 p-2 max-w-xs relative">
                        <img class="w-10" src="{{asset('images/imagen/iconohelado4.png')}}" />
                        <h2 class="text-white text-base md:text-lg lg:text-xl xl:text-2xl font-galano_medium leading-none sm:leading-normal">{{$textoshome->title7section ?? "Ingrese un texto"}}</h2>
                        <h2 class="text-white text-xs md:text-sm lg:text-base xl:text-lg font-galano_regular"> {{$textoshome->description7section ?? "Ingrese un texto"}}</h2>
                        <img class="hidden xl:flex absolute h-[80px] w-auto object-contain -left-[130px] top-0 translate-y-0" src="{{asset('images/imagen/flecha4.png')}}" />
                    </div>
                </div>
                
            </div>
        </div>
    </section>

    @if ($blogs->isEmpty())
    @else
        <section>
            <div class="flex flex-col gap-10 lg:gap-14 w-full px-[5%] pt-10 md:pt-20">
                <div class="flex flex-col gap-2 max-w-4xl mx-auto">
                    <h2 class="text-[#052F4E] font-galano_bold text-4xl md:text-text44 leading-none text-left lg:text-center">
                        {{$textoshome->title10section ?? "Ingrese un texto"}}
                    </h2>
                    <p class="text-[#052F4E] font-galano_regular text-lg text-left lg:text-center">
                        {{$textoshome->description10section ?? "Ingrese un texto"}}
                    </p>
                    <div class="flex flex-row justify-start md:justify-center items-start mt-3 lg:mt-6">
                        <a href="{{route('blog', 0)}}"
                            class="text-white py-3 px-6 bg-[#052F4E] rounded-xl font-galano_semibold text-center">
                            Ver todos
                        </a>
                    </div>
                </div>

                <div class="w-full grid grid-cols-1 md:grid-cols-2 gap-10">
                    @foreach ($blogs as $post)
                        <x-blog.container-post :post="$post" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
   

    {{-- <section>
        <div class="flex flex-col gap-10 lg:gap-14 w-full px-0 md:pl-[5%]  bg-[#EBEDEF] mt-10 md:mt-20">

            <div class="w-full grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="flex flex-col gap-1 md:col-span-2 pt-10  md:py-16 px-[5%] md:px-0">
                    
                    <h2 class="text-[#052F4E] text-4xl md:text-5xl font-galano_bold leading-none"> {{$textoshome->title11section ?? "Ingrese un texto"}}</h2>
                    <p class="text-[#052F4E] text-lg font-galano_regular line-clamp-3">
                        {{$textoshome->description11section ?? "Ingrese un texto"}}
                    </p>
                    <div class="flex flex-col md:flex-row gap-3 mt-10">
                        <form id="subsEmail">
                        <input id="emailFooter" type="email" name="email" class="rounded-xl text-base font-galano_regular w-[250px]"  placeholder="Ingresa tu correo electronico"  />
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <button type="submit" class="bg-[#052F4E] text-white px-6 py-2 rounded-xl font-galano_regular w-32"> Inscribirse </button>
                        </form>
                    </div>
                    <h2 class="text-[#052F4E] text-sm font-galano_regular mt-1">Al hacer clic en Inscribirse, confirma que acepta nuestros Términos y condiciones.</h2>
                </div>

                <div class="flex flex-col gap-1 md:col-span-1">
                    <img class="w-full min-h-[320px] h-full object-center object-cover" src="{{asset('images/imagen/heladosubscription.png')}}"
                    onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" alt="producto" />
                </div>
            </div>

        </div>
    </section> --}}

  
    <section>
        <div class="flex flex-col gap-10 w-full px-[5%] py-10 md:py-20 bg-white">
            
            <div class="grid grid-cols-2 lg:grid-cols-5 gap-5 lg:gap-0">
                <div class="col-span-2 flex flex-col justify-center">

                    <div class="flex flex-col p-2 justify-center items-start gap-8">
                        <h2 class="text-[#052F4E] text-4xl md:text-5xl font-maille leading-none">{{$textoshome->title8section ?? "Ingrese un texto"}}</h2>
                        <div class="flex flex-row justify-start items-start mx-auto sm:mx-0">
                            <a href="#productoscarrusel" id="scrollButton"
                                class="text-white py-3 px-6 bg-[#052F4E] rounded-xl text-base lg:text-lg font-galano_light font-semibold text-center max-w-xs">
                                {{$textoshome->one_description8section ?? "Ingrese un texto"}}
                            </a>
                        </div>
                        <h2 class="text-[#052F4E] text-base xl:text-lg font-galano_regular">
                            {{$textoshome->two_description8section ?? "Ingrese un texto"}}
                        </h2>
                    </div>

                </div>

                <div class="col-span-2 flex flex-col justify-end items-center">
                    <img class="h-96 md:h-[550px] w-full object-contain object-center" src="{{asset('images/imagen/heladoestadistica.png')}}"
                        onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" />
                </div>

                <div class="col-span-2 lg:col-span-1 flex flex-col sm:flex-row gap-5 sm:gap-10 lg:flex-col justify-around items-start lg:items-end">
                    <div class="grid grid-cols-2 lg:grid-cols-1 gap-2 xl:gap-4">
                       @foreach ($benefit as $beneficio)
                            @if($beneficio->link1)
                                <a href="{{$beneficio->link1}}">
                                    <div class="flex flex-col pl-2 max-w-xs text-left xl:text-right">
                                        <h3 class="text-[#052F4E] text-4xl font-galano_bold">{{$beneficio->descripcionshort ?? "Ingrese texto"}}</h3>
                                        <h2 class="text-[#052F4E] text-sm 3xs:text-base md:text-lg font-galano_medium leading-none">{{$beneficio->titulo ?? "Ingrese texto"}}</h2>
                                        <p class="text-[#052F4E] text-xs 3xs:text-sm md:text-sm font-galano_regular !leading-none mt-2">{{$beneficio->descripcion ?? "Ingrese texto"}}</p>
                                    </div>
                                </a>
                            @else
                                <div class="flex flex-col pl-2 max-w-xs text-left xl:text-right">
                                    <h3 class="text-[#052F4E] text-4xl font-galano_bold">{{$beneficio->descripcionshort ?? "Ingrese texto"}}</h3>
                                    <h2 class="text-[#052F4E] text-sm 3xs:text-base md:text-lg font-galano_medium leading-none">{{$beneficio->titulo ?? "Ingrese texto"}}</h2>
                                    <p class="text-[#052F4E] text-xs 3xs:text-sm md:text-sm font-galano_regular !leading-none mt-2">{{$beneficio->descripcion ?? "Ingrese texto"}}</p>
                                </div>
                            @endif
                       @endforeach
                    </div>
                </div>
                
            </div>

        </div>
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
                        <div class="gap-6 py-6 relative">
                                <div class="swiper testimonios ">
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



    <!-- Main modal -->
    <div id="modalofertas" class="modal modalbanner">
        <!-- Modal body -->
        <div class="p-1 ">
            <x-swipper-card-ofertas :items="$popups" id="modalOfertas" />
        </div>
    </div>

    @if(Session::has('welcome_message'))
    <div id="welcome-popup" class="claseocultar fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white p-6 rounded shadow-lg text-center">
                <h2 class="text-lg font-bold mb-4">{{ Session::get('welcome_message') }}</h2>
                <button id="close-popup" class="bg-blue-500 text-white px-4 py-2 rounded">Cerrar</button>
            </div>
        </div>
    @endif

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
        document.addEventListener('DOMContentLoaded', () => {
            const popup = document.getElementById('welcome-popup');
            const closeButton = document.getElementById('close-popup');

            if (popup) {
                popup.classList.remove('hidden'); // Mostrar el popup

                closeButton.addEventListener('click', () => {
                    popup.classList.add('hidden'); // Ocultar el popup
                });
            }
        });
    </script>  

    <script>
        let pops = @json($popups);

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

            $('#itemsTotal').text(`S/. ${suma.toFixed(2)} `)

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
    
    <script>

         var swiper = new Swiper(".slider", {
            slidesPerView: 1.2,
            spaceBetween: 10,
            centeredSlides: false,
            initialSlide: 1,
            grabCursor: true,
            loop: true,
             autoplay: {
                delay: 4000, 
                disableOnInteraction: false,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                600: {
                    slidesPerView: 1.2,
                    spaceBetween: 50,
                },
                1500: {
                    slidesPerView: 1.2,
                    spaceBetween: 100,
                }
            },
            pagination: {
                el: ".swiper-slider",
                clickable: true,
            },
        });


        var swiper = new Swiper(".categorias", {
            slidesPerView: 4,
            spaceBetween: 20,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            navigation: {
                nextEl: ".swiper-categorias-next",
                prevEl: ".swiper-categorias-prev",
            },
            pagination: {
                el: ".swiper-pagination-categorias",
                clickable: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                650: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                },
                1350: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
            },
        });


        var swiper = new Swiper(".otrasmarcas", {
            slidesPerView: 4,
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
                el: ".swiper-pagination-otrasmarcas",
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
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1350: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
            },
        });


        var swiper = new Swiper(".complementos", {
            slidesPerView: 5,
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
                el: ".swiper-pagination-complementos",
                clickable: true,
                dynamicBullets: true,
            },

            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 25,
                },
                600: {
                    slidesPerView: 2,
                    spaceBetween: 25,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 25,
                },
                1350: {
                    slidesPerView: 5,
                    spaceBetween: 25,
                },
            },
        });


        var swiper = new Swiper(".instagram", {
            slidesPerView: 6,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                },
                600: {
                    slidesPerView: 2,
                    spaceBetween: 0,
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 0,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 0,
                },
                1350: {
                    slidesPerView: 5,
                    spaceBetween: 0,    
                },
            },
        });


        var swiper = new Swiper(".promo", {
            slidesPerView: 1,
            spaceBetween: 50,
            loop: true,
            grabCursor: true,
            centeredSlides: false,
            initialSlide: 0,
            pagination: {
                el: ".swiper-pagination-promo",
                clickable: true,
                dynamicBullets: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
                768: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
                1024: {
                    slidesPerView: 1,
                    spaceBetween: 50,
                },
            },
        });
    </script>
    <script>
        document.getElementById('scrollButton').addEventListener('click', function(event) {
            event.preventDefault(); // Evita el comportamiento predeterminado del enlace
            smoothScroll('#productoscarrusel', 800); // 800ms de duración del desplazamiento
        });
    
        // Función para desplazamiento suave
        function smoothScroll(target, duration) {
            const targetElement = document.querySelector(target);
            const targetPosition = targetElement.getBoundingClientRect().top;
            const startPosition = window.pageYOffset;
            let startTime = null;
    
            function animation(currentTime) {
                if (startTime === null) startTime = currentTime;
                const timeElapsed = currentTime - startTime;
                const run = easeInOutQuad(timeElapsed, startPosition, targetPosition, duration);
                window.scrollTo(0, run);
                if (timeElapsed < duration) requestAnimationFrame(animation);
            }
    
            // Función de easing para suavizar el desplazamiento
            function easeInOutQuad(t, b, c, d) {
                t /= d / 2;
                if (t < 1) return c / 2 * t * t + b;
                t--;
                return -c / 2 * (t * (t - 2) - 1) + b;
            }
    
            requestAnimationFrame(animation);
        }
    </script>
@stop

@stop
