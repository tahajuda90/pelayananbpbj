<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <a class="nav-link" href="<?= base_url('Auth/logout')?>"></a> 
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
                    <a href="<?= base_url('C_Visitor')?>" class="nav-link">
                        <p>Kunjungan</p>
                    </a>
                </li>
                <?php
                if ($this->ion_auth->is_admin()) {
                    ?>
                <li class="nav-header">Administrator</li>
                <li class="nav-item">
                    <a href="<?= base_url('User_manajemen')?>" class="nav-link">
                        <p>User Manajemen</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('C_Department')?>" class="nav-link">
                        <p>Department</p>
                    </a>
                </li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </div>
</aside>
