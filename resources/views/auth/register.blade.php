@extends('components.public.matrix', ['pagina' => 'index'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
@section('content')
  
  <div class="flex flex-col max-w-4xl mx-auto py-12 lg:py-20">

        <!-- Primer div -->
        <div class="w-full text-[#151515] flex justify-center items-center font-Helvetica_Medium max-w-2xl mx-auto">
            <div class="w-5/6 flex flex-col gap-5">
                <div class="flex flex-col gap-5 text-center md:text-left">
                    <h1 class="font-semibold font-galano_regular text-center text-4xl tracking-normal">Crear una cuenta
                    </h1>
                    <p class="text-center text-base font-galano_regular tracking-normal">
                        ¿Ya tienes una cuenta?
                        <a href="{{ route('login') }}" class="font-bold font-galano_regular text-lg text-[#082252]">Iniciar
                            Sesión</a>
                    </p>
                </div>
                <div class="">
                    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-5">
                        @csrf
                        <div>
                            <span for="name"
                                class="font-galano_regular font-semibold text-[#111111] text-[15px] tracking-wide">Nombre
                                completo</span>
                            <input type="text" placeholder="Ingresa tu nombre" id="name" name="name"
                                :value="old('name')" required autofocus
                                class="font-galano_regular mt-2 w-full rounded-xl py-3 px-3 focus:outline-none text-[#082252] placeholder-[#082252] focus:placeholder-[#082252] text-base bg-[#cfdbf05d] rounded-0 border-2 border-transparent focus:border-2 focus:border-[#082252] focus:ring-0" />
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <span for="email"
                                class="font-galano_regular font-semibold text-[#111111] text-[15px] tracking-wide">Email</span>
                            <input type="text" placeholder="Tu correo electrónico" id="email" name="email"
                                :value="old('email')" required
                                class="font-galano_regular mt-2 w-full rounded-xl py-3 px-3 focus:outline-none text-[#082252] placeholder-[#082252] focus:placeholder-[#082252] text-base bg-[#cfdbf05d] rounded-0 border-2 border-transparent focus:border-2 focus:border-[#082252] focus:ring-0" />
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative w-full">
                            <!-- Input -->
                            <span for="password"
                                class="font-galano_regular font-semibold text-[#111111] text-[15px] tracking-wide">Contraseña</span>
                            <div class="relative w-full mt-2">
                                <input type="password" placeholder="Tu contraseña" id="password" name="password" required
                                    autocomplete="new-password"
                                    class="font-galano_regular mt-2 w-full rounded-xl py-3 px-3 focus:outline-none text-[#082252] placeholder-[#082252] focus:placeholder-[#082252] text-base bg-[#cfdbf05d] rounded-0 border-2 border-transparent focus:border-2 focus:border-[#082252] focus:ring-0" />

                                <!-- Imagen -->
                                <img src="./images/svg/pass_eyes.svg" alt="password"
                                    class="absolute right-4 top-8 transform -translate-y-1/2 cursor-pointer ojopassWord" />
                            </div>
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative w-full">
                            <!-- Input -->
                            <input type="password" placeholder="Confirma tu contraseña" id="password_confirmation"
                                name="password_confirmation" required autocomplete="new-password"
                                class="font-galano_regular mt-2 w-full rounded-xl py-3 px-3 focus:outline-none text-[#082252] placeholder-[#082252] focus:placeholder-[#082252] text-base bg-[#cfdbf05d] rounded-0 border-2 border-transparent focus:border-2 focus:border-[#082252] focus:ring-0" />
                            <!-- Imagen -->
                            <img src="./images/svg/pass_eyes.svg" alt="password"
                                class="absolute right-4 top-8 transform -translate-y-1/2 cursor-pointer ojopassWord_confirmation" />
                            @error('password_confirmation')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex gap-3 my-4">
                            <input type="checkbox" id="acepto_terminos"
                                class="w-5 h-5 appearance-none rounded-[0.25rem] border border-solid  outline-none focus:ring-[#082252] checked:bg-[#082252] text-[#082252] focus:ring-0 focus:border-[#082252] border-[#082252]"
                                required />
                            <label name="newsletter" id="newsletter" class="font-normal text-base font-galano_regular">

                                Acepto la
                                <span class="font-bold text-[#082252] cursor-pointer open-modal font-galano_regular"
                                    data-tipo='PoliticaPriv'> Política de
                                    Privacidad</span>
                                y los
                                <span class="font-bold text-[#082252] cursor-pointer open-modal font-galano_regular"
                                    data-tipo='terminosUso'>
                                    Términos de Uso
                                </span>
                            </label>
                        </div>

                        <div class="">
                            <input type="submit" value="Crear cuenta"
                                class="text-white bg-[#082252] w-full py-3 rounded-0 cursor-pointer font-galano_regular font-semibold text-base tracking-wider" />
                        </div>
                    </form>
                    <x-validation-errors class="mt-4" />
                </div>
            </div>
        </div>

        <!-- Segundo div -->
        {{-- <div>
            <img src= "{{ asset('images/imagen/fondofwc.png') }}" class="object-contain bg-center w-full h-full">
        </div> --}}

    </div>

  <div id="modaalpoliticas" class="modal modalbanner">
    <div class="p-2" id="modal-content">
      <h1 id="modal-title">MODAL POLITICAS</h1>
      <div id="modal-body-content"></div>
    </div>
  </div>

  <script>
    const politicas = @json($politicas);
    const terminos = @json($terminos);

    $(document).on('click', '.open-modal', function() {
      var tipo = $(this).data('tipo');
      var title = '';
      var content = '';
      console.log(politicas)
      console.log(terminos)

      if (tipo == 'PoliticaPriv') {
        title = 'Política de Privacidad';
        content = politicas.content;
      } else if (tipo == 'terminosUso') {
        title = 'Términos y condiciones';
        content = terminos.content;
      }

      $('#modal-title').text(title);
      $('#modal-body-content').html(content);

      $('#modaalpoliticas').modal({
        show: true,
        fadeDuration: 100
      });
    });

    $(document).on("click", '.ojopassWord', function() {


      var input = $(this).siblings('input');

      // Alterna el tipo de entrada entre 'password' y 'text'
      if (input.attr('type') === 'password') {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password');
      }

    })
    $(document).on("click", '.ojopassWord_confirmation', function() {
      var input = $(this).siblings('input');

      // Alterna el tipo de entrada entre 'password' y 'text'
      if (input.attr('type') === 'password') {
        input.attr('type', 'text');
      } else {
        input.attr('type', 'password');
      }


    })
  </script>

@stop
