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
            <h1>Edit Kuota Dosen</h1><hr><br>
            <form action="" method="post">
                <input type="hidden" name="nip" value="<?= $dataDosen['nip'] ?>">
                <div class="form-group">
                    <label for="nama">Nama Dosen</label>
                    <input type="text" id="nama" class="form-control col-md-4" value="<?= $dataDosen['nama_awal'].' '.$dataDosen['nama_akhir'] ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="kuota">Kuota Dosen</label>
                    <input type="text" id="kuota" name="kuota" class="form-control col-md-4" value="<?= $dataDosen['kuota'] ?>">
                </div>
                <button type="submit" name="updateKuotaDosen" class="btn btn-primary">Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>
