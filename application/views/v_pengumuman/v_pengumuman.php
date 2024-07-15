<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Tel - U CUSS | Pengumuman</title>
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
            <h2>Pengumuman</h2><hr>
            <?php if ($this->session->flashdata('alert_hapus')) {?>
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert_hapus'); ?>
                </div>
            <?php } ?>
            <a href="<?= base_url('/Pengumuman/inputPengumuman') ?>" class="btn btn-sm btn-primary"><i class='far fa-fw fa-plus-square'></i> Input Pengumuman</a>
            <br><br>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Tanggal dibuat</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($list_pengumuman as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['judul'] ?></td>
                        <td><?= $row['tgl_dibuat'] ?></td>
                        <td>
                          <a href='pengumuman/detail/<?= $row['id_pengumuman'] ?>' class='btn btn-sm btn-info'>Detail</a>
                          <a href='pengumuman/edit/<?= $row['id_pengumuman'] ?>' class='btn btn-sm btn-success'><i class='far fa-edit'></i></a>
                          <button data-link="<?= base_url('/pengumuman/delete/'.$row['id_pengumuman']) ?>" type="button" id="do-delete"class="btn btn-sm btn-danger"><i class='far fa-trash-alt'></i></button>
                        </td>
                      </tr>
                    <?php $no++; } ?>
                </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-delete', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus Pengumuman?',
            content: 'Yakin akan menghapus pengumuman?',
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
