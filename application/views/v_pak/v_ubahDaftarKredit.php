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
            <h1>Ubah Kegiatan</h1><hr>
            <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-sm-2">
                        Kategori
                    </label>
                    <div class="col-md-4">
                        <select name="id_kategori" id="id_kategori" class="form-control">
                            <option value="">- Pilih Kategori - </option>
                            <?php
                                foreach($list_kategori as $row){
                                    $selected_cat = ($row['id_kategori'] == $data_kegiatan['id_kategori']) ? 'selected="selected"' : '';
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
                        <select name="id_pedoman_pak" id="id_kegiatan" class="form-control" required>
                            <option value="">- Pilih Kegiatan - </option>
                           
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" col-sm-2">
                        Nama Kegiatan
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="nama_kegiatan" class="form-control" value="<?= $data_kegiatan['nama_kegiatan'] ?>">
                    </div>
                </div>
                <div class="col-md-9">
                    <button name="btn_ubahDaftarKredit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
        $(document).ready(function () {
            $(document).on('change','#id_kategori',function (e) {
            var id_kategori = $(this).val()
            console.log(id_kategori)
                $.ajax({
                    url : '<?= base_url('Pak/getKreditbyKategori/') ?>'+id_kategori,
                    type: 'get',
                    success : function (response) {
                        $('#id_kegiatan').empty();
                        if(response){
                            $.each(response, function(key, value){
                                $('#id_kegiatan').append('<option value="'+value.id_pedoman_pak+'">' + value.kegiatan + '</option>');

                            });
                        }else {
                            $('#id_kegiatan').empty();
                        }
                    console.log(response)
                    }
                })
            })
        })
    </script>
  </body>
</html>
