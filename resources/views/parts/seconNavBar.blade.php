<div >
    <div class="navbar navbar-expand-md navbar-light">
        
        <div class="col-lg-4 text-center text-lg-left">
            <img src="{{ asset('site_') }}assets/img/logo.svg" class="logo" width="80" alt="logo">
        </div>
        <div class="text-center d-md-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-navigation">
                
                Menú
            </button>
        </div>
        <div class="col-lg-8">
            <div class="navbar-collapse collapse justify-content-lg-end" id="navbar-navigation">
                <ul class="navbar-nav">
                    <li class="nav-item {{ (request()->is('admin')) ? 'active' : '' }}">
                        <a href="{{route('admin.index.home')}}" class="navbar-nav-link">
                            Inicio
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/users*')) ? 'active' : '' }}">
                        <a href="{{route('admin.index.users')}}" class="navbar-nav-link">
                            Replicadores
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('admin/promo*')) ? 'active' : '' }}">
                        <a href="{{route('admin.index.promo')}}" class="navbar-nav-link">
                            Cupón de descuento
                        </a>
                    </li>
        
                </ul>
        
                <ul class="navbar-nav">
                  
        
                    <li class="nav-item dropdown">
                        <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-user color-blue"></i>
                            <span class="d-md-none ml-2">Perfil</span>
                        </a>
        
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="#" class="dropdown-item"  href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();"><i class="icon-user-lock"></i> Salir</a>
                            
                        
        
                                            <form id="logout-form" action="{{ route('admin.post.logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                            {{-- <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a> --}}
                            {{-- <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a> --}}
                            {{-- <div class="dropdown-divider"></div> --}}
                            {{-- <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a> --}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>


    </div>
</div>