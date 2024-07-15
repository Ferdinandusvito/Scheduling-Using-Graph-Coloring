<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Detail Pengumuman</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
  </head>

  <body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>

    <div id="wrapper">
      <?php $this->load->view("_partials/sidebar_admin.php") ?>
      <div id="content-wrapper">
       <div class="container-fluid">
          <div class="mb-3">
            <h1>Detail Pengumuman</h1><hr><br>
            <table class="table-detail">
                <tr>
                    <td class="td-width">Judul</td>
                    <td class="td-padding1"><?= $list_pengumuman['judul'] ?></td>
                </tr>
                <tr>
                    <td class="td-width">Isi Pengumuman</td>
                    <td class="td-padding1"><?= $list_pengumuman['pengumuman'] ?></td>
                </tr>
                <tr>
                    <td class="td-width">Tanggal terbit / diperbarui</td>
                    <td class="td-padding1"><?= $list_pengumuman['tgl_dibuat'] ?></td>
                </tr>
                <tr>
                    <td class="td-width">File</td>
                    <td class="td-padding1">
                      <a href="<?php print site_url('/assets/documents/pengumuman/'.$list_pengumuman['file']) ?>" target="blank  ">
                        <?= $list_pengumuman['file'] ?>
                      </a>
                    </td>
                </tr>
                <tr>
                    <td class="td-width"></td>
                    <td class="td-padding1">
                        <a href="<?= base_url('/pengumuman/edit/'.$list_pengumuman['id_pengumuman']) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i> Ubah Pengumuman</a>
                        <button data-link="<?= base_url('/pengumuman/delete/'.$list_pengumuman['id_pengumuman']) ?>" type="button" id="do-hapus"class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Hapus Pengumuman</button>
                    </td>
                </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-hapus', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus Pengumuman?',
            content: 'Yakin akan menghapus pengumuman',
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
