<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('home')}}"><img src="{{asset('stisla/dist/assets/img/')}}" alt="" widht="50" height="50">WS-LAS</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fas fa-fire"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="menu-header">Pages</li>
            @if (auth()->user()->role == 'admin')
            <li class="active">
                <a class="nav-link" href="{{route('proyek.index')}}">
                    <i class="fas fa-chart-line"></i>
                    <span>Data Proyek</span>
                </a>
            </li>
            @endif
            @if (auth()->user()->role == 'superadmin')
            <li class="active">
                <a class="nav-link" href="{{route('slide.index')}}">
                    <i class="far fa-address-card"></i>
                    <span>Slider</span>
                </a>
            </li>
            <li class="active">
                <a class="nav-link" href="{{route('produk.index')}}">
                    <i class="far fa-folder-open"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li class="active">
                <a class="nav-link" href="{{route('porto.index')}}">
                    <i class="fas fa-plane"></i>
                    <span>Portofolio</span>
                </a>
            </li>
            <li class="active">
                <a class="nav-link" href="{{route('sms.index')}}">
                    <i class="fas fa-chart-line"></i>
                    <span>Sms Gateway</span>
                </a>
            </li>
            <li class="active">
                <a class="nav-link" href="{{route('proyek.index')}}">
                    <i class="fas fa-chart-line"></i>
                    <span>Data Proyek</span>
                </a>
            </li>
            <li class="active">
                <a class="nav-link" href="{{route('aktual')}}">
                    <i class="fas fa-chart-line"></i>
                    <span>Aktual & Biaya</span>
                </a>
            </li>
            <li class="active">
                <a class="nav-link" href="{{route('users.index')}}">
                    <i class="fas fa-chart-line"></i>
                    <span>Users</span>
                </a>
            </li>
            @endif


        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a
                href="{{route('logout')}}"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i>
                Logout
            </a>
        </div>
    </aside>
</div>