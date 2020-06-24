<div class="navbar navbar-expand-md navbar-light">
    <div class="text-center d-md-none w-100">
        <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
            <i class="icon-unfold mr-2"></i>
            Navigation
        </button>
    </div>

    <div class="navbar-collapse collapse" id="navbar-navigation">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="{{route('index.users')}}" class="navbar-nav-link active">
                    <i class="icon-home4 mr-2"></i>
                    Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('index.promo')}}" class="navbar-nav-link">
                    <i class="icon-home4 mr-2"></i>
                    Promo
                </a>
            </li>

        </ul>

        <ul class="navbar-nav ml-md-auto">
          

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-cog3"></i>
                    <span class="d-md-none ml-2">Configuración</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Salir</a>
                    {{-- <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a> --}}
                    {{-- <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a> --}}
                    {{-- <div class="dropdown-divider"></div> --}}
                    {{-- <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a> --}}
                </div>
            </li>
        </ul>
    </div>
</div>