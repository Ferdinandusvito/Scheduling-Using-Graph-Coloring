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
                <a href="<?= base_url('Pengaturan/settingKK') ?>" class="btn btn-secondary">Ketua KK</a>
                <a href="<?= base_url('Pengaturan/pDekan') ?>" class="btn btn-secondary">Dekan FTE</a>
                <a href="" class="btn btn-secondary active">Direktur PPM</a>
                <a href="<?= base_url('Pengaturan/pLaboran') ?>" class="btn btn-secondary">Laboran</a>
                <a href="<?= base_url('Pengaturan/pDsnPembina') ?>" class="btn btn-secondary">Dosen Pembina</a>
                <a href="<?= base_url('Pengaturan/pDsnPkip') ?>" class="btn btn-secondary">Dosen PKIP</a>
            </div><br><br>
          </div>
          <form action="<?= base_url('Pengaturan/setPpm') ?>" method="post">
            <input type="hidden" name="nip_lama" value="<?= $dataDekan['nip'] ?>">
            <div class="form-group">
                <label for="nama_awal">Nama Lengkap (beserta gelar)</label>
                <input type="text" name="nama_awal" class="form-control col-md-5 " value="<?= $dataDekan['nama_awal'] ?>">
            </div>
            <div class="form-group">
                <label for="nama_awal">NIP</label>
                <input type="text" name="nip" class="form-control col-md-5 " value="<?= $dataDekan['nip'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>
