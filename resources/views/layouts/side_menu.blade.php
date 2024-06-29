<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="#" class="app-brand-link">
            <img class="w-75" src="{{asset('img/logo/logo.png')}}" alt="" srcset="">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>


    @if (Auth::check())
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ (request()->is('/')) ? 'active' : '' }}">  
                <a href="{{ url('/') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-smart-home"></i>
                    <div>Dashboard</div>
                </a>
            </li>

            <!-- Recipes -->
            <li class="menu-item {{ (request()->is('recipe*')) ? 'active open' : '' }}">  
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-files"></i>
                    <div>Recipes</div>
                </a>
                <ul class="menu-sub">
                    @if (request()->is('recipe'))
                        <li class="menu-item active">
                            <a href="{{ url('recipe') }}" class="menu-link">
                                <div>Index</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('recipe-create') }}" class="menu-link">
                                <div>Add New Recipe</div>
                            </a>
                        </li>
                    @elseif(request()->is('recipe-create'))
                        <li class="menu-item">
                            <a href="{{ url('recipe') }}" class="menu-link">
                                <div>Index</div>
                            </a>
                        </li>
                        <li class="menu-item active">
                            <a href="{{ url('recipe-create') }}" class="menu-link">
                                <div>Add New Recipe</div>
                            </a>
                        </li>
                    @else
                        <li class="menu-item">
                            <a href="{{ url('recipe') }}" class="menu-link">
                                <div>Index</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('recipe-create') }}" class="menu-link">
                                <div>Add New Recipe</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <!-- Users -->
            <li class="menu-item {{ (request()->is('user*')) ? 'active open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div>Users</div>
                </a>
                <ul class="menu-sub">
                    @if (request()->is('user') || request()->is('user-edit*'))
                        <li class="menu-item active">
                            <a href="{{ url('user') }}" class="menu-link">
                                <div>List User</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('user-create') }}" class="menu-link">
                                <div>Add User</div>
                            </a>
                        </li>
                    @elseif(request()->is('user-create'))
                        <li class="menu-item">
                            <a href="{{ url('user') }}" class="menu-link">
                                <div>List User</div>
                            </a>
                        </li>
                        <li class="menu-item active">
                            <a href="{{ url('user-create') }}" class="menu-link">
                                <div>Add User</div>
                            </a>
                        </li>
                    @else
                        <li class="menu-item">
                            <a href="{{ url('user') }}" class="menu-link">
                                <div>List User</div>
                            </a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('user-create') }}" class="menu-link">
                                <div>Add User</div>
                            </a>
                        </li>
                    @endif
                </ul>
            </li>

            <!-- About -->
            {{-- <li class="menu-item {{ (request()->is('about')) ? 'active' : '' }}">  
                <a href="{{ url('about') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-color-swatch"></i>
                    <div>About</div>
                </a>
            </li> --}}

            <!-- Misc -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Misc</span>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-lifebuoy"></i>
                    <div data-i18n="Support">Support</div>
                </a>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="menu-link"> 
                    <i class="menu-icon tf-icons ti ti-file-description"></i>
                    <div data-i18n="Documentation">Documentation</div>
                </a>
            </li>
        </ul>
    @else
        <div class="p-3">
            <div class="card mb-3">
                <div class="card-header cursor-move">Selamat Datang <i class="fa-regular fa-hand"></i></div>
                <div class="card-body">
                    <h4 class="card-title mb-4">Admin Resep, Caw Studio</h4>
                    <p class="card-text">Silahkan Login menggunakan akun yang sudah kalian daftarkan pada website resep CawStudio</p>
                    <p class="card-text">Jika kalian belum melakukan <i>register</i>, silahkan klik <a href="https://recipe.ranggacaw.com/" target="_blank" rel="noopener noreferrer">link disini </a> <i class="fa-regular fa-face-smile"></i></p>
                </div>
            </div>
        </div>
    @endif
</aside>
<!-- / Menu -->
