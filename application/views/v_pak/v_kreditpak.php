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
            <h1>Perhitungan Angka Kredit</h1><hr>
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
            <?php 
              if ($this->session->userdata("user_role") == 1 || $this->session->userdata("user_role") == 4) { ?>
                <a href="<?= base_url('pak/tambahKredit') ?>" class="btn btn-sm btn-primary">Tambah Kredit</a><br><br>
            <?php }
            ?>
            <div class="table-responsive">
              <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kategori</th>
                    <th>Kegiatan</th>
                    <th>Kode PAK</th>
                    <th>Angka Kredit</th>
                    <?php 
                      if ($this->session->userdata("user_role") == 1 || $this->session->userdata("user_role") == 4) { ?>
                        <th>Action</th>
                      <?php }
                    ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    foreach($list_kreditpak as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['kategori'] ?></td>
                        <td><?= $row['kegiatan'] ?></td>
                        <td><?= $row['kode_pak'] ?></td>
                        <td><?= $row['angka_kredit'] ?></td>
                        <?php 
                          if ($this->session->userdata("user_role") == 1 || $this->session->userdata("user_role") == 4) { ?>
                            <td>
                              <a href='<?= base_url('/pak/ubahKredit/'.$row['id_pedoman_pak']) ?>' class='btn btn-sm btn-success'><i class='far fa-edit'></i></a>
                              <!-- <a href='<?= base_url('/pak/hapusKredit/'.$row['id_pedoman_pak']) ?>' class='btn btn-sm btn-danger'><i class='far fa-trash-alt'></i></a> -->
                              <button data-link="<?php echo base_url('/pak/hapusKredit/'.$row['id_pedoman_pak']) ?>" type="button" id="do-confirm"class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i></button>
                            </td>
                          <?php }
                        ?>
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
            title: 'Hapus aturan angka kredit?',
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
