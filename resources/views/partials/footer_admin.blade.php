    <footer class="app-footer bg-white d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-7 col-xl-7">
                    



        @if(Session::has('company'))
            @if(Session::get('company') == 'casatoro')
            <p class="mb-0 text-center">
                ©️ 2020. CasaToro S.A Todos los derechos reservados -  <a href="#" class="text-dark" data-toggle="modal" data-target="#legalModal" style="text-decoration: underline;">Términos y condiciones</a>. <span class="ml-1 d-none d-lg-inline-block d-xl-inline-block"> Powered by <strong class="font-weight-bold">bellpi</strong></span>
                
            </p>
            @elseif(Session::get('company') == 'motorysa')
             <p class="mb-0 text-center">
                ©️ 2020. Motores y Máquinas S.A Todos los derechos reservados - <a href="#" class="text-dark" data-toggle="modal" data-target="#legalModal" style="text-decoration: underline;">Términos y condiciones</a>.  <span class="ml-1 d-none d-lg-inline-block d-xl-inline-block"> Powered by <strong class="font-weight-bold">bellpi</strong></span>
                
            </p>
            @else
             <p class="mb-0 text-center">
                ©️ 2020. Bonaparte. Todos los derechos reservados - <a href="#" class="text-dark" data-toggle="modal" data-target="#legalModal" style="text-decoration: underline;">Términos y condiciones</a>.<span class="ml-1 d-none d-lg-inline-block d-xl-inline-block"> Powered by <strong class="font-weight-bold">bellpi</strong></span>
                
            </p>
            @endif
        @endif

                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}?time={{ date('YmdHis') }}" defer></script>