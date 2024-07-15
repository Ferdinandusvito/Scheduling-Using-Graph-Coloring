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
            <h1>Kategori Kegiatan</h1><hr>
            <?php if ($this->session->flashdata('alert_hapus')) {?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo $this->session->flashdata('alert_hapus'); ?>
              </div>
            <?php } elseif ($this->session->flashdata('alert_ubah')) { ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert_ubah'); ?>
                </div>
            <?php } ?>
            <a href="<?= base_url('pak/tambahKategori') ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus"></i> Tambah Kategori</a><br><br>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($list_kategori as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td>
                            <center>
                                <a href='<?= base_url('/pak/ubahKategori/'.$row['id_kategori']) ?>' class='btn btn-sm btn-success'><i class='far fa-edit'></i></a>
                                <button data-link="<?php echo base_url('/pak/hapusKategori/'.$row['id_kategori']) ?>" type="button" id="do-confirm"class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                            </center>
                        </td>
                      </tr>
                  <?php $no++; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-confirm', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Hapus kategori?',
            content: 'Yakin akan menghapus?',
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
