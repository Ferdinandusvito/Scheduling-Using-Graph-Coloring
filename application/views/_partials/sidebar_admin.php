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
            <a class="dropdown-item" href="<?= base_url('data_controllers/waktu') ?>">Waktu</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-users"></i>
            <span>Perkuliahan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('/Perkuliahan_controllers/dataKuliah') ?>">Data Kuliah</a>
            <a class="dropdown-item" href="<?= base_url('/Perkuliahan_controllers') ?>">Daftar Mata Kuliah</a>
            <a class="dropdown-item" href="<?= base_url('/Perkuliahan_controllers/dataMKDU_fakultas') ?>">Daftar Mata Kuliah <br>Dasar Umum Jurusan</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Pengumuman</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!-- <a class="dropdown-item" href="<?= base_url('/Pengumuman_controllers/inputPengumuman') ?>">Input Pengumuman</a> -->
            <a class="dropdown-item" href="<?php echo site_url('pengumuman') ?>">Daftar Pengumuman</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="	far fa-calendar-alt"></i>
            <span>Penjadwalan</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            
            <a class="dropdown-item" href="<?php echo base_url('/Penjadwalan_controllers/generate') ?>">Generate Jadwal</a>
            <a class="dropdown-item" href="<?php echo base_url('/Penjadwalan_controllers/hasil_generate') ?>">Hasil Jadwal</a>
        </div>
    </li>
</ul>