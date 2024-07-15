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
            <a class="dropdown-item" href="<?= base_url('/Penelitian/Penelitian_input') ?>">Ajukan Penelitian</a>
            <a class="dropdown-item" href="<?= base_url('/Penelitian') ?>">Progres Pengajuan</a>
            <a class="dropdown-item" href="<?= base_url('/Penelitian/progressPenelitian') ?>">Progres Penelitian</a>
            <a class="dropdown-item" href="<?= base_url('/Penelitian/riwayatPenelitian') ?>">Riwayat Penelitian</a>
            <a class="dropdown-item" href="<?= base_url('/publikasi') ?>">Publikasi</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Abdimas</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('/Abdimas/inputAbdimas') ?>">Ajukan Abdimas</a>
            <a class="dropdown-item" href="<?= base_url('/Abdimas/pengajuanProgress') ?>">Progres Pengajuan</a>
            <a class="dropdown-item" href="<?= base_url('/Abdimas') ?>">Progres Abdimas</a>
            <a class="dropdown-item" href="<?= base_url('/Abdimas/riwayatAbdimas') ?>">Riwayat Abdimas</a>
        </div>
    <!--</li><li class="nav-item dropdown">-->
    <!--    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
    <!--        <i class="fas fa-fw fa-folder"></i>-->
    <!--        <span>Dosen Pembimbing</span>-->
    <!--    </a>-->
    <!--    <div class="dropdown-menu" aria-labelledby="pagesDropdown">-->
    <!--        <a class="dropdown-item" href="<?php echo base_url();?>data">Daftar Judul TA</a>-->
    <!--        <a class="dropdown-item" href="<?php echo base_url();?>data/daftardosbing">Daftar Pembimbing</a>-->
    <!--        <a class="dropdown-item" href="<?php echo base_url();?>data/jadwalseminar">Jadwal Seminar</a>-->
    <!--        <a class="dropdown-item" href="<?php echo base_url();?>data/pengajuantopik">Pengajuan Topik</a>-->
    <!--    </div>-->
    <!--</li>-->
    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Dosen Pembimbing</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url();?>data">Topik TA Saya</a>
            <a class="dropdown-item" href="<?php echo base_url();?>data/daftarkeseluruhan">Daftar TA Keseluruhan</a>
            <a class="dropdown-item" href="<?php echo base_url();?>data/daftardosbing">Daftar Pembimbing</a>
            <a class="dropdown-item" href="<?php echo base_url();?>data/jadwalseminar">Jadwal Seminar</a>
            <a class="dropdown-item" href="<?php echo base_url();?>data/pengajuantopik">Pengajuan Topik</a>
        </div>
    </li>
    
    </li><li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Dosen PKIP</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <!-- <a class="dropdown-item" href="<?php echo base_url();?>Pkip/daftarjudul">Daftar Judul TA</a>
            <a class="dropdown-item" href="<?php echo base_url();?>Pkip/daftardosbing">Daftar Pembimbing</a>
            <a class="dropdown-item" href="<?php echo base_url();?>Pkip/jadwalseminar">Jadwal Seminar</a> -->
            <a class="dropdown-item" href="<?php echo base_url();?>Pkip/kelulusan">Update Kelulusan Judul</a>
        </div>
    </li>
</ul>