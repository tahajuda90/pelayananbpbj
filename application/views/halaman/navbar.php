<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <a class="nav-link" href="#"></a> 
        <i class="fas fa-sign-out-alt"></i>
    </ul>
</nav>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Admin BukuTamu</span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="<?= base_url('C_Department')?>" class="nav-link">
                        <p>Department</p>
                    </a>
                </li>                
                <li class="nav-item">
                    <a href="<?= base_url('C_Guest')?>" class="nav-link">
                        <p>Jenis Tamu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('C_Service')?>" class="nav-link">
                        <p>Layanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <p>Kunjungan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
