<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('home') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Akun_dosen_controllers') ?>">
            <i class="fa fa-user"></i>
            <span>Profil</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('Preferensi_controllers') ?>">
            <i class="fa fa-calendar"></i>
            <span>Preferensi</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Perkuliahan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('/Penjadwalan_controllers/hasil_generate') ?>">Jadwal Ajar</a>
            <a class="dropdown-item" href="<?= base_url('/Perkuliahan_controllers/matkulAmpu') ?>">Mata Kuliah Ampu</a>
        </div>
    </li>
    
</ul>