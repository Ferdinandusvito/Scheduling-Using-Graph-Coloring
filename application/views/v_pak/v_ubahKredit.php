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
            <h1>Ubah Kredit PAK</h1><hr>
            <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">
                        Kategori
                    </label>
                    <div class="col-md-4">
                        <select name="id_kategori" id="" class="form-control">
                            <option value="">- Pilih Kategori - </option>
                            <?php
                                foreach($list_kategori as $row){
                                    $selected_cat = ($row['id_kategori'] == $list_data['id_kategori']) ? 'selected="selected"' : '';
                                    echo "<option value = '".$row['id_kategori']."' ".$selected_cat.">".$row['kategori']."</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-sm-2">
                        Kegiatan
                    </label>
                    <div class="col-md-9">
                        <textarea name="kegiatan" class="form-control"><?= $list_data['kegiatan'] ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">
                        Kode PAK
                    </label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="kode_pak" value="<?= $list_data['kode_pak'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">
                        Angka Kredit
                    </label>
                    <div class="col-md-2">
                        <input type="text" class="form-control" name="angka_kredit" value="<?= $list_data['angka_kredit'] ?>">
                    </div>
                </div>
                <div class="col-md-9">
                    <button name="ubahKredit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
  </body>
</html>
