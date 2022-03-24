<header class="position-relative mb-3">
    <div class="overlay"></div>
    <nav class="navbar navbar-expand-lg navbar-light shadow-sm p-0">
        <div class="container-lg">
            <a href="{{route('index')}}" class="navbar-brand fs-4 d-block" style="height: 60px">
                <!-- Trang chủ -->
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">
                            Quản lý đơn vị
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('groups.create')}}">Thêm đơn vị</a></li>
                            <li><a class="dropdown-item" href="{{route('groups.index')}}">Danh sách đơn vị</a></li>
                        </ul>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">
                            Quản lý địa điểm
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('points.create')}}">Thêm địa điểm</a></li>
                            <li><a class="dropdown-item" href="{{route('points.index')}}">Danh sách địa điểm</a></li>
                        </ul>
                    </div>
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#">
                            Quản lý đường đi
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('ways.create')}}">Thêm đường đi</a></li>
                            <li><a class="dropdown-item" href="{{route('ways.index')}}">Danh sách đường đi</a></li>
                            <li><a class="dropdown-item" href="{{route('import.ways.index')}}">Import đường đi</a></li>
                        </ul>
                    </div>
                    @auth
                    <a class="btn-rounded-left" href="{{route('logout')}}">Đăng xuất</a>
                    @endauth
                    @guest
                    <a class="btn-rounded-left" href="{{route('login')}}">Đăng nhập</a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>