<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="index.html"><img src="{{url('assets/img/logo1.png')}}" alt="Logo" class="img-fluid"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Request::is('customer/DashboardCustomer') ? "active" : "" }}">
                    <a href="{{('/customer/DashboardCustomer')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Data Jasa</span>
                    </a>
                </li>
                <li class="sidebar-item  {{ Request::is('customer/dataOutsourcing') ? "active" : "" }}">
                    <a href="{{('/customer/dataOutsourcing')}}" class='sidebar-link'>
                        <i class="fas fa-building"></i>
                        <span>Data Pelamar</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="fas fa-list"></i>
                        <span>Data Penyewaan</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item {{ Request::is('/customer/riwayatSewa') ? "active" : "" }}">
                            <a href="{{url ('/customer/riwayatSewa')}}">Pengajuan</a>
                        </li>
                        <li class="submenu-item {{ Request::is('/customer/riwayatSewaProgress') ? "active" : "" }}">
                            <a href="{{url ('/customer/riwayatSewaProgress')}}">In Progress</a>
                        </li>
                        <li class="submenu-item {{ Request::is('/customer/riwayatSewaFinish') ? "active" : "" }}">
                            <a href="{{url ('/customer/riwayatSewaFinish')}}">Finish</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Request::is('/customer/riwayatKomplain') ? "active" : "" }} ">
                    <a href="{{('/customer/riwayatKomplain')}}" class='sidebar-link'>
                        <i class="fas fa-book"></i>
                        <span> Data Komplain</span>
                    </a>
                </li>
                <li class="sidebar-item {{ Request::is('/customer/riwayatKomplain') ? "active" : "" }} ">
                    <a href="{{('/customer/riwayatKomplain')}}" class='sidebar-link'>
                        <i class="fas fa-book"></i>
                        <span> Data Transaksi</span>
                    </a>
                </li>
            </ul>

        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
