<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("_partials/header.php") ?>
  </head>
  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php", $this->data) ?>

    <div id="wrapper">
      <?php $this->load->view("_partials/sidebar.php") ?>
      <div id="content-wrapper">
       <div class="container-fluid">
          <div class="mb-3">
            <h1>Daftar Angka Kredit</h1><hr>
            <?php if ($this->session->flashdata('alert_hapus')) {?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('alert_hapus'); ?>
              </div>
            <?php } elseif ($this->session->flashdata('alert_ubah')) { ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('alert_ubah'); ?>
              </div>
            <?php } ?>
            <div class="alert alert-danger" role="alert">
              <?php $this->load->view('v_pak/notes.php') ?>
            </div>
            
            <!-- ---------------------------------------------------------------------- -->
            <?php $this->load->view('v_pak/perhitunganPak.php'); ?>
            <!-- ---------------------------------------------------------------------- -->
            <hr>
            <h2>Pelaksanaan Pendidikan dan Pengajaran</h2><br>
            <div class="alert alert-secondary" role="alert">
              Total Angka Kredit Pelaksanaan Pendidikan dan Pengajaran :
              <span class="badge badge-secondary">
                <?= $sumPakPendidikan['angka_kredit_total'] ?>
              </span>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Komponen Kegiatan</th>
                    <th>Nama Kegiatan</th>
                    <th>Angka Kredit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($pakPendidikan as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['kegiatan'] ?></td>
                        <td>
                          <?php 
                            if (!empty($row['id_abdimas'])) {
                              echo $row['judul_abdimas'];
                            }elseif (!empty($row['id_penelitian'])) {
                              echo $row['judul_penelitian'];
                            }elseif (!empty($row['nama_kegiatan'])) {
                              echo $row['nama_kegiatan'];
                            }
                          ?>
                        </td>
                        <td><?= $row['angka_kredit'] ?></td>
                        <td>
                          <button data-link="<?php echo base_url('/pak/hapusDaftarKredit/'.$row['id_pak']) ?>" type="button" id="do-delete"class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                          <?php 
                            if (!empty($row['nama_kegiatan'])) { ?>
                              <a href='<?= base_url('/pak/ubahDaftarKredit/'.$row['id_pak']) ?>' class='btn btn-sm btn-success'><i class='far fa-edit'></i></a>
                              <?php
                            }
                          ?>
                        </td>
                      </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>

            <!-- ---------------------------------------------------------------------- -->
            <hr>
            <h2>Pelaksanaan Penelitian</h2><br>
            <div class="alert alert-secondary" role="alert">
              Total Angka Kredit Pelaksanaan Penelitian :
              <span class="badge badge-secondary">
                <?= $sumPakPenelitian['angka_kredit_total'] ?>
              </span>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Komponen Kegiatan</th>
                    <th>Judul Penelitian</th>
                    <th>Angka Kredit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($pakPenelitian as $pakPenelitian){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $pakPenelitian['kegiatan'] ?></td>
                        <td>
                          <?php 
                            if (!empty($pakPenelitian['id_abdimas'])) {
                              echo $pakPenelitian['judul_abdimas'];
                            }elseif (!empty($pakPenelitian['id_penelitian'])) {
                              echo $pakPenelitian['judul_penelitian'];
                            }elseif (!empty($pakPenelitian['nama_kegiatan'])) {
                              echo $pakPenelitian['nama_kegiatan'];
                            }
                          ?>
                        </td>
                        <td><?= $pakPenelitian['angka_kredit'] ?></td>
                        <td>
                          <?php 
                            if (!empty($pakPenelitian['id_penelitian'])) { ?>
                              <a href='<?= base_url('/Penelitian/penelitianDetail/'.$pakPenelitian['id_penelitian']) ?>' class='btn btn-sm btn-primary btn-skema'>Detail</i></a>
                              <?php
                            }
                          ?>
                          <button data-link="<?php echo base_url('/pak/hapusDaftarKredit/'.$pakPenelitian['id_pak']) ?>" type="button" id="do-delete"class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                          <?php 
                            if (!empty($pakPenelitian['nama_kegiatan'])) { ?>
                              <a href='<?= base_url('/pak/ubahDaftarKredit/'.$pakPenelitian['id_pak']) ?>' class='btn btn-sm btn-success'><i class='far fa-edit'></i></a>
                              <?php
                            }
                          ?>
                        </td>
                      </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>

            <!-- ---------------------------------------------------------------------- -->
            <hr>
            <h2>Pelaksanaan Pengabdian Masyarakat</h2><br>
            <div class="alert alert-secondary" role="alert">
              Total Angka Kredit Pelaksanaan Pengabdian Masyarakat :
              <span class="badge badge-secondary">
                <?= $sumPakAbdimas['angka_kredit_total'] ?>
              </span>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Komponen Kegiatan</th>
                    <th>Judul Abdimas</th>
                    <th>Angka Kredit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($pakAbdimas as $pakAbdimas){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $pakAbdimas['kegiatan'] ?></td>
                        <td>
                          <?php 
                            if (!empty($pakAbdimas['id_abdimas'])) {
                              echo $pakAbdimas['judul_abdimas'];
                            }elseif (!empty($pakAbdimas['id_penelitian'])) {
                              echo $pakAbdimas['judul_penelitian'];
                            }elseif (!empty($pakAbdimas['nama_kegiatan'])) {
                              echo $pakAbdimas['nama_kegiatan'];
                            }
                          ?>
                        </td>
                        <td><?= $pakAbdimas['angka_kredit'] ?></td>
                        <td>
                          <?php 
                            if (!empty($pakAbdimas['id_abdimas'])) { ?>
                              <a href='<?= base_url('/Abdimas/progressDetail/'.$pakAbdimas['id_abdimas']) ?>' class='btn btn-sm btn-primary btn-skema'>Detail</i></a>
                              <?php
                            }
                          ?>
                          <button data-link="<?php echo base_url('/pak/hapusDaftarKredit/'.$pakAbdimas['id_pak']) ?>" type="button" id="do-delete"class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                          <?php 
                            if (!empty($pakAbdimas['nama_kegiatan'])) { ?>
                              <a href='<?= base_url('/pak/ubahDaftarKredit/'.$pakAbdimas['id_pak']) ?>' class='btn btn-sm btn-success'><i class='far fa-edit'></i></a>
                              <?php
                            }
                          ?>
                        </td>
                      </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>

            <!-- ---------------------------------------------------------------------- -->
            <hr>
            <h2>Penunjang</h2><br>
            <div class="alert alert-secondary" role="alert">
              Total Angka Kredit Kegiatan Penunjang :
              <span class="badge badge-secondary">
                <?= $sumPakPenunjang['angka_kredit_total'] ?>
              </span>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Komponen Kegiatan</th>
                    <th>Nama Kegiatan</th>
                    <th>Angka Kredit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($pakPenunjang as $pakPenunjang){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $pakPenunjang['kegiatan'] ?></td>
                        <td>
                          <?php 
                            if (!empty($pakPenunjang['id_abdimas'])) {
                              echo $pakPenunjang['judul_abdimas'];
                            }elseif (!empty($pakPenunjang['id_penelitian'])) {
                              echo $pakPenunjang['judul_penelitian'];
                            }elseif (!empty($pakPenunjang['nama_kegiatan'])) {
                              echo $pakPenunjang['nama_kegiatan'];
                            }
                          ?>
                        </td>
                        <td><?= $pakPenunjang['angka_kredit'] ?></td>
                        <td>
                          <button data-link="<?php echo base_url('/pak/hapusDaftarKredit/'.$pakPenunjang['id_pak']) ?>" type="button" id="do-delete"class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                          <?php 
                            if (!empty($pakPenunjang['nama_kegiatan'])) { ?>
                              <a href='<?= base_url('/pak/ubahDaftarKredit/'.$pakPenunjang['id_pak']) ?>' class='btn btn-sm btn-success'><i class='far fa-edit'></i></a>
                              <?php
                            }
                          ?>
                        </td>
                      </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-delete', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus aturan angka kredit?',
            content: 'Yakin akan menghapus?',
            type: 'red',
            buttons: {   
                ok: {
                  text: "Ya",
                  btnClass: 'btn-primary',
                  keys: ['enter'],
                  action: function(){
                      window.location.href = href; 
                  }
                },
                Tidak: function(){
                  console.log('the user clicked cancel');
                }
            }
          });
        })
      });
      
    </script>
  </body>
</html>
