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
            <h1>Ruangan Seminar</h1><hr>
            <form action="<?= base_url('Pengaturan/updateRuangan') ?>" class="form-horizontal" method="post">
                <div class="col-md-12">
                    <input type="hidden" name="id_slot" value="<?= $dataRuangan['id_slot'] ?>">
                    <div class="form-group">
                        <label>
                            Ruangan
                        </label>
                        <div>
                            <input type="text" name="ruangan" class="form-control col-md-1" value="<?= $dataRuangan['ruangan'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Jam Mulai
                        </label>
                        <div>
                            <input type="time" name="jam_mulai" class="form-control col-md-1" value="<?= $dataRuangan['jam_mulai'] ?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Jam Selesai
                        </label>
                        <div>
                            <input type="time" name="jam_selesai" class="form-control col-md-1" value="<?= $dataRuangan['jam_selesai'] ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php 
        $this->load->view("_partials/footer.php");
    ?>
  </body>
</html>
