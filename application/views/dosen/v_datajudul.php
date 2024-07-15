<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Dosen - Dashboard</title>


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
      <!-- ISI DATA AKAN MUNCUL DISINI --><!-- <td>$row[nip]</td>  <td>$row[kode_dosen]</td> <?= $row[nama_awal]; ?> <?= $row[nama_akhir]; ?> --> 
      <?php
      $no = 1; //untuk menampilkan no
      foreach($list_topik as $row){ ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $row['topik'] ?></td>
          <td><?= $row['bidang'] ?></td>
          <td><?= $row['requirement'] ?></td>
          <td><?= $row['nama_awal'] ?> <?= $row['nama_akhir'] ?></td>
          <td><?= $row['keterangan'] ?></td>
          <td><?= $row['kuotatopik'] ?></td>
          <td>
            <?php
            if ($row['kuotatopik'] ==0) {?>
            <button href="<?php echo base_url('/data/edit/'.$row['idta']) ?>" class='btn btn-sm btn-info' disabled>Update</button>
            <?php } else { ?>                                                 
            <a href="<?php echo base_url('/data/edit/'.$row['idta']) ?>" class='btn btn-sm btn-info'>Update</a>
            <a href='data/delete/$row[idta]' class='btn btn-sm btn-danger'>Hapus</a>
            <?php
                      }
                  
                  ?>   
          </td>
        </tr>
        <?php $no++; } ?>
      
    </tbody>
                </table>
                <a href="data/inputtopik" class="btn btn-success btn-skema btn-sm">Masukan Topik Baru</a>
                <a href="<?php print base_url('/assets/topik/tugasakhir-xls.xls') ?>" class="btn btn-sm btn-success btn-skema">
                    <i class="fas fa-file-excel"></i> 
                    Download Template Excel
                </a>
                <button type="button" class="btn btn-success btn-skema btn-sm" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-file-upload"></i> 
                    Upload Excel
                </button>
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
    <?php 
      $this->load->view("dosen/v_modaluploadtopik");
      $this->load->view("_partials/footer.php");
      $this->load->view("_partials/js.php")
    ?>
  
<div id="line">
<link rel="stylesheet" href="<?php echo base_url().'assets/css/morris.css'?>">
<script src="<?php echo base_url().'assets/js/jquery.min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/raphael-min.js'?>"></script>
    <script src="<?php echo base_url().'assets/js/morris.min.js'?>"></script>
    <script>
        Morris.Bar({
          element: 'line',
          data: <?php echo $data1;?>,
          xkey: 'idta',
          ykeys: ['nip', 'id_bidang', 'id_status'],
          labels: ['nip', 'id_bidang', 'id_status']
        });
    </script>
</div>

  </body>

</html>
