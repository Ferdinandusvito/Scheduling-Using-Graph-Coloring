<ul class="sidebar navbar-nav">

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() ?>mahasiswa/profilMahasiswa">
      <i class="fa fa-user"></i>
      <span>Profil</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('home') ?>">
      <i class="fas fa-fw fa-home"></i>
      <span>Beranda</span>
    </a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
      <span>Tugas Akhir</span>
    </a>
    <div class="dropdown-menu" aria-labelledby="pagesDropdown">
      <a class="dropdown-item" href="<?php echo base_url(); ?>mahasiswa">Daftar Topik</a>
      <a class="dropdown-item" href="<?php echo base_url(); ?>mahasiswa/daftardosbing">Daftar Pembimbing</a>
      <a class="dropdown-item" href="<?php echo base_url(); ?>mahasiswa/jadwalseminar">Jadwal Seminar</a>
      <a class="dropdown-item" href="<?php echo base_url(); ?>mahasiswa/statusta">Status TA</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>mahasiswa/indexpinjam">
      <i class="fas fa-fw fa-table"></i>
      <span>Data Peminjaman Barang Lab</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>mahasiswa/tambahpinjam">
      <i class="fas fa-fw fa-table"></i>
      <span>Input Peminjaman Barang Lab</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url(); ?>mahasiswa/daftarsidang">
      <i class="fas fa-fw fa-table"></i>
      <span>Daftar Sidang</span>
    </a>
  </li>

</ul>