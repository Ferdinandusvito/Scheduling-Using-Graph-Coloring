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
            <a class="dropdown-item" href="<?= base_url('/Publikasi') ?>">Publikasi</a>
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
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>PAK</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?= base_url('pak') ?>">Pedoman</a>
            <a class="dropdown-item" href="<?= base_url('/pak/inputKegiatan') ?>">Input Kegiatan</a>
            <a class="dropdown-item" href="<?= base_url('/pak/daftarKredit') ?>">Daftar Angka Kredit</a>
            <a class="dropdown-item" href="<?php print base_url('/assets/documents/PO-PAK-2019_MULAI-BERLAKU-APRIL-2019.pdf') ?>" target="blank">Download Panduan</a>
        </div>
    </li>
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
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Dosen Pembina Lab</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo base_url();?>pengajuan/inventaris">Data Barang Inventaris</a>
            <a class="dropdown-item" href="<?php echo base_url();?>pengajuan">Data Pengajuan Barang</a>
            <a class="dropdown-item" href="<?php echo base_url();?>pengajuan/cek">Data Cek Barang</a>
            <a class="dropdown-item" href="<?php echo base_url();?>/pengajuan/tambahpengajuan">Input Pengajuan Barang</a>
        </div>
    </li>
</ul>