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
            <h1>Masukkan Bidang Keahlian</h1><hr><br>
            <form action="" method="post">
                <div class="form-group">
                    <label class="control-label col-sm-2">
                    Nama        
                    </label>
                    <div class="col-sm-4">
                    <input type="text" class="form-control"  value="<?= $this->session->userdata('nama_awal') ?> <?= $this->session->userdata('nama_akhir') ?>" disabled> 
                    <input type="hidden" name="nip" value="<?= $this->session->userdata('nip') ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">
                    Bidang Keahlian 1     
                    </label>
                    <div class="col-sm-4">
                    <?php foreach($dataDosen as $dataDosen){ ?>
                    <input type="text" class="form-control"  value="<?= $dataDosen['nama_bidang'] ?>" disabled> 
                    </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <div class="col-md-6 mb-3">
                        <label for="value_bidang1">Value Bidang Keahlian 1</label>
                        <?php foreach($dataValue as $dataValue){ ?>
                        <input type="text" id="value_bidang1" name="value_bidang1" class="form-control" value="<?= $dataValue['value_bidang1'] ?>">
                        <?php }?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 mb-3">
                        <label for="id_bidang2">Bidang Keahlian 2</label>
                        <select name="id_bidang2" id="id_bidang2" class="form-control col-md-5" required>
                            <option value="">- Pilih Bidang -</option>
                            <option value="1">Software Engineering</option>
                            <option value="2">Artificial Intelegence</option>
                            <option value="3">Security</option>
                            <option value="4">Robotic</option>
                            <option value="5">Multimedia</option>
                            <option value="6">Komputer Jaringan</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-6 mb-3">
                        <label for="value_bidang2">Value Bidang Keahlian 2</label>
                        <input type="text" id="value_bidang2" name="value_bidang2" class="form-control" value="<?= $dataValue['value_bidang2'] ?>">
                    </div>
                </div>
                <button type="submit" name="updateDosen" class="btn btn-primary">Simpan</button>
            </form>
            
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>
