<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <div class="sidebar-brand d-flex align-items-center justify-content-center bg-gradient-info">
        <div class="sidebar-brand-text">
          <img src="" width="70">
        </div>
        <div class="sidebar-brand-text">OUTSOURCING</div>
      </div>
      <hr class="sidebar-divider my-0">

      <li class="nav-item {{ Request::is('admin/DashboardAdmin')? "active":""}}">
        <a class="nav-link" href="{{url ('admin/DashboardAdmin')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <hr class="sidebar-divider">

      <li class="nav-item {{ Request::is('admin/MengelolaAdmin')? "active":""}}">
        <a class="nav-link" href="{{url ('admin/MengelolaAdmin')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Admin</span>
        </a>  
      </li>

      <li class="nav-item {{ Request::is('admin/MengelolaCustomer')? "active":""}}">
        <a class="nav-link" href="{{url ('admin/MengelolaCustomer')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Customer</span>
        </a>  
      </li>

      <li class="nav-item {{ Request::is('admin/MengelolaJenisJasa')? "active":""}}">
        <a class="nav-link" href="{{url ('admin/MengelolaJenisJasa')}}">
          <i class="fas fa-fw fa-palette"></i>
          <span>Jenis Jasa</span>
        </a>  
      </li>

      <li class="nav-item">
        <a class="nav-link {{ Request::is('admin/MengelolaArea')? "active":""}} {{ Request::is('admin/MengelolaKotaKabupaten')? "active":""}} {{ Request::is('admin/MengelolaProvinsi')? "active":""}} collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
          aria-expanded="true" aria-controls="collapseBootstrap1">
          <i class="far fa-fw fa-user"></i>
          <span>Area</span>
        </a>
        <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Data Area</h6>
            <a class="collapse-item" href="{{url ('admin/MengelolaArea')}}">Kecamatan</a>
            <a class="collapse-item" href="{{url ('admin/MengelolaKoKab')}}">Kota Kabupaten</a>
            <a class="collapse-item" href="{{url ('admin/MengelolaProvinsi')}}">Provinsi</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
            
    </ul>