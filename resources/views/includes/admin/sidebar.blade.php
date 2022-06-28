        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
            
                <div class="sidebar-brand-text mx-3">Admin Petshop</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dasboard</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="{{route('groming-package.index')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Boking Groming</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('gallery.index')}}">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Galeri Boking</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('transaction.index')}}">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Transaksi Groming</span></a>
            </li>
            
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="{{route('doctor-package.index')}}">
                    <i class="fas fa-fw fa-hotel"></i>
                    <span>Boking Dokter</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('gallery-doctor.index')}}">
                    <i class="fas fa-fw fa-images"></i>
                    <span>Gallery Dokter</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('transaction-doctor.index')}}">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Transaksi dokter Dokter</span></a>
            </li>

            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="{{route('adobsi.index')}}">
                    <i class="fas fa-fw fa-hotel"></i>
                    <span>Adobsi hewan </span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
