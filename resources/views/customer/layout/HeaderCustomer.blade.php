<header class='mb-3'>
    <nav class="navbar navbar-expand navbar-light">
        <div class="container-fluid">
            <a href="#" class="burger-btn d-block">
                <i class="bi bi-justify fs-3"></i>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="dropdown ms-auto mb-2 mb-lg-0">
                    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-menu d-flex">
                            <div class="user-name text-end me-3">
                                {{-- <h6 class="mb-0 text-gray-600">{{Session::get('nama_tenagaKerja')}}</h6>
                                <p class="mb-0 text-sm text-gray-600">{{Session::get('status_tenagaKerja')}}</p> --}}
                            </div>
                            <div class="user-img d-flex align-items-center">
                                {{-- <div class="">
                                    <i class="fas fa-shopping-cart"></i>
                                </div> --}}
                                <div class="avatar avatar-md">
                                    <img @if (empty(Auth::guard('customer')->user()->foto_profil))
                                    src="{{ asset('/pengguna/assets/images/foto_profil/user1.jpg')}}"
                                    @else
                                    src="{{ url('pengguna/assets/images/foto_profil/'.Auth::guard('customer')->user()->foto_profil)}}"
                                    @endif>
                                </div>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li>
                            <h6 class="dropdown-header">Hello, {{Auth::guard('customer')->user()->nama_customer}}</h6>
                        </li>
                        <li><a class="dropdown-item" href="{{('/customer/ubahProfil')}}"><i
                                    class="icon-mid bi bi-person me-2"></i> My
                                Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="{{url('/logout')}}"><i
                                    class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
