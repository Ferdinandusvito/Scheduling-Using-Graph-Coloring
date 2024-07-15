<!DOCTYPE html>
<html lang="en">

  <head>
    <title>TA Mahasiswa - Dashboard</title>
    <?php $this->load->view("_partials/header.php") ?>
  </head>

  <body id="page-top">
    <?php $this->load->view("_partials/navbar.php", $this->data) ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("_partials/sidebar.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar Judul Tugas Akhir</div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      
                 <thead>
      <tr>
        <th>No</th>
        <th>Topik</th>
        <th>Bidang</th>
        <th>Requirement</th>
        <th>Penerbit</th>
        <th>Keterangan</th>
        <th>Kuota</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- ISI DATA AKAN MUNCUL DISINI -->
      <?php
      $no = 1; //untuk menampilkan no
      foreach($list_topik as $row){ ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row['topik']; ?></td>
          <td><?= $row['bidang']; ?></td>
          <td><?= $row['requirement']; ?></td>
          <td><?= $row['nama_awal']; ?> <?= $row['nama_akhir']; ?></td>
          <td><?= $row['keterangan']; ?></td>
          <td><?= $row['kuotatopik']; ?></td>
          <td>
            
<!--  <?php
                        if($list_mahasiswa['id_status'] == '60' ) {?>
                          <a href="<?php echo base_url('/mahasiswa/bookingtopikta/'.$row['idta']) ?>" class='btn btn-sm btn-info'>Booking</a>
                        <?php } elseif ($list_mahasiswa['id_status'] == '6' ) { ?>
                          <i class=''>Mulai</i>  
                        <?php } elseif ($list_mahasiswa['id_status'] == '7' ) { ?>
                          <i class=''>Pengajuan topik anda telah disetujui</i>  
                        <?php } elseif ($list_mahasiswa['id_status'] == '8' ) { ?>
                          <i class=''>Proses pengajuan pembimbing</i>  
                        <?php } elseif ($list_mahasiswa['id_status'] == '52' ) { ?>
                          <a href="" class='btn btn-sm btn-info'>Pengerjaan judul</a>
                        <?php } elseif ($list_mahasiswa['id_status'] == '50' ) { ?>
                          <a href="" class='btn btn-sm btn-info'>Proposal</a>
                        <?php } elseif ($list_mahasiswa['id_status'] == '53' ) { ?>
                          <a href="" class='btn btn-sm btn-info'>Menunggu Persetujuan</a>
                        <?php } elseif ($list_mahasiswa['id_status'] == '9' ) { ?>
                          <a href="" class='btn btn-sm btn-info'>Seminar</a> 
                        <?php } elseif ($list_mahasiswa['id_status'] == '54' ) { ?>
                          <a href="" class='btn btn-sm btn-info'>Diseminarkan</a> 
                        <?php } elseif ($list_mahasiswa['id_status'] == '51' ) { ?>
                          <i class=''>Lulus seminar</i>                            
                        <?php } else {
                          echo "Pengerjaan";
                        }
?> --> 

<?php
                        if ($this->session->userdata('id_status') == 60 ) {?>
                          <a href="<?php echo base_url('/mahasiswa/bookingtopikta/'.$row['idta']) ?>" class='btn btn-sm btn-info'>Booking</a>
                        <?php } elseif ($this->session->userdata('id_status') == 6 ) { ?>
                          <i>Anda Telah Mengambil Topik</i>
                        <?php } elseif ($this->session->userdata('id_status') == 7 ) { ?>
                          <i>Topik Anda Telah Disetujui</i>
                        <?php } elseif ($this->session->userdata('id_status') == 8 ) { ?>
                          <i>Menunggu Permohonan Pembimbing</i>
                        <?php } elseif ($this->session->userdata('id_status') == 52 ) { ?>
                          <i>Pengerjaan Judul</i>
                        <?php } elseif ($this->session->userdata('id_status') == 50 ) { ?>
                          <i>Tahap Proposal</i>
                        <?php } elseif ($this->session->userdata('id_status') == 53 ) { ?>
                          <i class=''>Menunggu Persetujuan</i>  
                        <?php } elseif ($this->session->userdata('id_status') == 9 ) { ?>
                          <i class=''>Seminar</i>  
                        <?php } elseif ($this->session->userdata('id_status') == 54 ) { ?>
                          <i class=''>Diseminarkan</i> 
                        <?php } elseif ($this->session->userdata('id_status') == 51 ) { ?>
                          <i class=''>Lulus seminar</i>                            
                        <?php } else {
                          echo "Pengerjaan";
                        }
?>
                        <a href="<?php echo base_url('/mahasiswa/mahasiswabookingtopikta/'.$row['idta']) ?>" class='btn btn-sm btn-info'>Mahasiswa</a>

            
          </td>
        </tr>
        <?php $no++; } ?>
      
    </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/mahasiswa/logout"   >Logout</a>
          </div>
        </div>
      </div>
    </div>

  <?php $this->load->view("_partials/js.php") ?>
  </body>

</html>
