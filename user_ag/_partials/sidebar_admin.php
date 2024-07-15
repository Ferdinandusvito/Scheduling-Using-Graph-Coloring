<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('home') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Beranda</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('data_controllers/dosen') ?>">Dosen</a>
            <a class="dropdown-item" href="<?= base_url('data_controllers/ruangan') ?>">Ruangan</a>
            <a class="dropdown-item" href="<?= base_url('data_controllers/fakultas') ?>">Fakultas</a>
            <a class="dropdown-item" href="<?= base_url('data_controllers/fakultas') ?>">Waktu</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Perkuliahan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('/Perkuliahan_controllers') ?>">Mata Kuliah</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="	far fa-calendar-alt"></i>
            <span>Penjadwalan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('user_ag/?m=penjadwalan') ?>">Generate Jadwal</a>
            <a class="dropdown-item" href="<?= base_url('data_controllers/...') ?>">Hasil Jadwal</a>
        </div>
    </li>
    
</ul>