<ul class="sidebar navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('home') ?>">
        <i class="fas fa-fw fa-home"></i>
        <span>Beranda</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Penelitian</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('/Penelitian_kk') ?>">Pengajuan Penelitian</a>
            <a class="dropdown-item" href="<?= base_url('/Penelitian_kk/Progress') ?>">Progress Penelitian</a>
            <a class="dropdown-item" href="<?= base_url('/Penelitian_kk/Riwayat') ?>">Riwayat Penelitian</a>
            <a class="dropdown-item" href="<?= base_url('/Penelitian_kk/monitoring') ?>">Monitoring Penelitian</a>
            <a class="dropdown-item" href="<?= base_url('/Publikasi/flt') ?>">Publikasi</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Abdimas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('Abdimas_kk/pengajuanAbdimas') ?>">Pengajuan Abdimas</a>
            <a class="dropdown-item" href="<?= base_url('Abdimas_kk') ?>">Progres Abdimas</a>
            <a class="dropdown-item" href="<?= base_url('Abdimas_kk/riwayatAbdimas') ?>">Riwayat Abdimas</a>
            <a class="dropdown-item" href="<?= base_url('Abdimas_kk/monitoringAbdimas') ?>">Monitoring Abdimas</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>PAK</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('pak') ?>">Kredit PAK</a>
            <a class="dropdown-item" href="<?= base_url('pak/tambahKredit') ?>">Input Kegiatan</a>
        </div>
    </li>
        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Seminar</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url();?>pkip/daftarprosesjudul">Daftar Judul</a>
            <a class="dropdown-item" href="<?php echo base_url();?>pkip/daftarjudul">Judul Siap Seminar</a>
            <a class="dropdown-item" href="<?php echo base_url();?>pkip/daftardosbing">Daftar Pembimbing</a>
            <a class="dropdown-item" href="<?php echo base_url();?>pkip/jadwalseminar">Jadwal Seminar</a>
            <a class="dropdown-item" href="<?php echo base_url();?>pkip/monitoringtugasakhir">Monitoring</a>
        </div>
    </li>
     </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Laboratorium</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url();?>pengajuankk">Data Barang Inventaris</a>
            <a class="dropdown-item" href="<?php echo base_url();?>pengajuankk/pengajuan">Data Pengajuan Barang</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>Pengumuman</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('/Pengumuman/inputPengumuman') ?>">Input Pengumuman</a>
            <a class="dropdown-item" href="<?php echo site_url('pengumuman') ?>">List Pengumuman</a>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('Pengaturan/penggunaDosen') ?>">
        <i class="fas fa-fw fa-users"></i>
        <span>Pengguna</span></a>
    </li>
</ul>