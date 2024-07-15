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
            <h1>Ubah Publikasi</h1><hr><br>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="title">Document Title</label>
                        <input type="text" id="title" name="document_title" class="form-control" value="<?= $dataPublikasi['document_title'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="authors">Authors</label>
                        <input type="text" id="authors" name="authors" class="form-control" value="<?= $dataPublikasi['authors'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="year">Year</label>
                        <input type="text" id="year" name="year" class="form-control col-md-2" value="<?= $dataPublikasi['year'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="source">Source</label>
                        <input type="text" id="source" name="source" class="form-control" value="<?= $dataPublikasi['source'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="affiliation">Affiliation</label>
                        <input type="text" id="affiliation" name="affiliation" class="form-control col-md-4" value="<?= $dataPublikasi['affiliation'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="form-control"  value="<?= $dataPublikasi['city'] ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnUpdate">Simpan</button>
                </form>
            </div>
        </div>
      </div>
    </div>
    <?php 
      $this->load->view("v_penelitian/v_modalUpload");
      $this->load->view("v_penelitian/v_modalInputPublikasi");
      $this->load->view("_partials/footer.php");
    ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-delete', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus Publikasi?',
            content: 'Yakin akan menghapus publikasi?',
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
