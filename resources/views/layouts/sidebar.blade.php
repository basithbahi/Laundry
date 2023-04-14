<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard">
        <div class="sidebar-brand-icon">
            <i class="fas fa-fw fa-water"></i>
        </div>
        <div class="sidebar-brand-text mx-3">LAUNDRY</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-1">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Admin</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>User</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('jenis_cucian') }}">
            <i class="fas fa-fw fa-tshirt"></i>
            <span>Jenis Cucian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('jenis_pencuci') }}">
            <i class="fas fa-fw fa-soap"></i>
            <span>Jenis Pencuci</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('tipe_laundry') }}">
            <i class="fas fa-fw fa-shopping-basket"></i>
            <span>Tipe Laundry</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-history"></i>
            <span>Transaksi</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tasks"></i>
            <span>Status Pencucian</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('metode_pembayaran') }}">
            <i class="fas fa-fw fa-wallet"></i>
            <span>Metode Pembayaran</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
