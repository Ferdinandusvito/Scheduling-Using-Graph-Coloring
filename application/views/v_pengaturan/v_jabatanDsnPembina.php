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
            <h1>Pengaturan User Roles</h1><hr><br>
            <?php if ($this->session->flashdata('alert')) {?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert'); ?>
                </div>
            <?php } ?>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="<?= base_url('Pengaturan/settingKK') ?>" class="btn btn-secondary ">Ketua KK</a>
                <a href="<?= base_url('Pengaturan/pDekan') ?>" class="btn btn-secondary">Dekan FTE</a>
                <a href="<?= base_url('Pengaturan/pPpm') ?>" class="btn btn-secondary">Direktur PPM</a>
                <a href="<?= base_url('Pengaturan/pLaboran') ?>" class="btn btn-secondary">Laboran</a>
                <a href="" class="btn btn-secondary active">Dosen Pembina</a>
                <a href="<?= base_url('Pengaturan/pDsnPkip') ?>" class="btn btn-secondary">Dosen PKIP</a>
            </div><br><br>
          </div>
          <table class="table table-hover">
            <tr>
              <th>NIP</th>
              <th>NIDN</th>
              <th>Nama</th>
              <th>Kode Dosen</th>
              <th>Email</th>
              <th>No Telp</th>
              <th>Aksi</th>
            </tr>
                <?php 
                    foreach ($dataDsnPembina as $dataDsnPembina) { ?>
                        <tr>
                            <td><?= $dataDsnPembina['nip'] ?></td>
                            <td><?= $dataDsnPembina['nidn'] ?></td>
                            <td><?= $dataDsnPembina['nama_awal'].' '.$dataDsnPembina['nama_akhir'] ?></td>
                            <td><?= $dataDsnPembina['kode_dosen'] ?></td>
                            <td><?= $dataDsnPembina['email'] ?></td>
                            <td><?= $dataDsnPembina['telp'] ?></td>
                            <td>
                                <a href="<?= base_url('Pengaturan/hapusPembina/'.$dataDsnPembina['nip']) ?>" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
          </table><br><br>
          <h5>Ubah Ketua KK</h5><hr>
          <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>NIP</th>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Kode Dosen</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach($dataDosen as $row){ ?>
                  <tr>
                    <td><?= $row['nip'] ?></td>
                    <td><?= $row['nidn'] ?></td>
                    <td><?= $row['nama_awal']; ?> <?= $row['nama_akhir']; ?></td>
                    <td><?= $row['kode_dosen'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['telp'] ?></td>
                    <td>
                      <center>
                        <?php 
                          if ($dataDsnPembina['nip'] == $row['nip']) { ?>
                            <a href='' class='btn btn-sm btn-primary disabled'>Pilih</i></a> 
                            <?php
                          }else { ?>
                            <a href='<?= base_url('Pengaturan/setDsnPembina/'.$row['nip']) ?>' class='btn btn-sm btn-primary'>Pilih</i></a> 
                            <?php
                          }
                        ?>
                      </center>
                    </td>
                  </tr>
                <?php $no++; } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>
