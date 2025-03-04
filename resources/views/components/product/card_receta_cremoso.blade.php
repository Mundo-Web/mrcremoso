<div class="flex flex-col group relative">

  <a href="{{ route('detallereceta', $item->id) }}">
      <div class="bg-[#F2F5F7] border-[2px] border-[#052F4E66] rounded-xl flex flex-col justify-center aspect-[17/20] max-w-[350px]">
          <div class="max-w-full flex flex-col items-center justify-center p-2 sm:p-5">
              <img class="w-full h-[150px] 3xs:h-[250px] md:max-h-[300px] object-contain object-bottom" alt="{{ $item->titulo }}" src="{{ asset($item->imagen)}}" onerror="this.onerror=null;this.src='{{ asset('images/imagen/noimagen.jpg') }}';" />
          </div>
          <div class="p-2 sm:p-5">
            <a class="text-center line-clamp-2" href="{{ route('detallereceta', $item->id) }}">  
              <h2 class="font-galano_regular xl:font-galano_bold font-semibold text-[#052F4E] leading-5 text-base md:text-lg xl:text-2xl line-clamp-2">{{ $item->titulo }}</h2>
            </a>
          </div>
      </div>
  </a>

  {{-- <div class="flex flex-col justify-center items-center gap-1 mt-3">
      <div class="flex flex-col md:flex-row w-full">
          <div class="flex flex-col w-full gap-1">
             
          </div>
      </div>
  </div> --}}
 
</div>
