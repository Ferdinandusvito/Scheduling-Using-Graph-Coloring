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
            <h1>Penelitian Berjalan</h1><hr><br>
            <?php
              $nip = $this->session->userdata("user_role"); 
              if ($nip == '1') { ?>
                <a href="<?= base_url('Penelitian_kk/verRiwayatPenelitian') ?>" class="btn btn-sm btn-success"><i class="fas fa-check-circle"></i> Verifikasi Laporan Akhir</a><br><br>
                <?php
              }
              ?>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Skema Penelitian</th>
                    <th>Dosen Pemohon</th>
                    <th>Tanggal Mengajukan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($list_penelitian as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['judul_penelitian'] ?></td>
                        <td><?= $row['skema'] ?></td>
                        <td><?= $row['nama_awal']; ?> <?= $row['nama_akhir']; ?></td>
                        <td><?= tgl_indo($row['tgl_mengajukan']) ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                          <center>
                            <a href='<?= base_url('/Penelitian_kk/penelitianDetail/'.$row['id_penelitian']) ?>' class='btn btn-sm btn-primary'>Detail</i></a>
                            <?php ?>
                          </center>
                        </td>
                      </tr>
                    <?php $no++; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $this->load->view("_partials/footer.php")
    ?>
  </body>
</html>
