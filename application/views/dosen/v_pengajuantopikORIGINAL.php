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
            <h1>Pengajuan Topik Mahasiswa</h1><hr><br>
            <?php if ($this->session->flashdata('alert_setuju')) {?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert_setuju'); ?>
                </div>
            <?php } ?>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="" class="btn btn-secondary active">Pengajuan Topik</a>
                <a href="<?= base_url('/Data/topikdisetujui') ?>" class="btn btn-secondary">Pengajuan Judul</a>
                <a href="<?= base_url('/Data/prosespengerjaan') ?>" class="btn btn-secondary">Proses Pengerjaan</a>
                <a href="<?= base_url('/Data/prosesproposal') ?>" class="btn btn-secondary">Proses Proposal</a>
            </div><br><br>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>NAMA</th>
                    <th>PENERBIT</th>
                    <th>TOPIK</th>
                    <th>PBB1</th>
                    <th>PBB2</th>
                    <th>STATUS</th>
                    <th>ACTION</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($list_PembimbingPropose as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['nim'] ?></td>
                        <td><?= $row['nama_awal']; ?> <?= $row['nama_akhir']; ?></td>
                        <td><?= $row['nip'] ?></td>
                        <td><?= $row['topik'] ?></td>
                        <td><?= $row['kode1'] ?></td>
                        <td><?= $row['kode2'] ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                          <center><button data-link="<?php echo base_url('/Data/accept/'.$row['idta']) ?>" type="button" id="do-confirm"class="btn btn-sm btn-success" name="tombol_accept"><i class="fas fa-check"></i> Accept</button></center>
                          <center><button data-link="<?php echo base_url('/Data/Reject/'.$row['idta']) ?>" type="button" id="do-reject"class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Reject</button></center>
                        </td>
                      </tr>
                    <?php $no++; } ?>
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
    <?php 
      $this->load->view("_partials/footer.php")
    ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-reject', function () {
          var href = $(this).attr('data-link');
          var form = `<textarea class="form-control" name="alasan_tolak" placeholder="Berikan Alasan"></textarea>`;
          $.confirm({
            title: 'Tolak Pengajuan?',
            content: form,
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
      
      $(document).ready(function(){
        $(document).on('click', '#do-confirm', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Setujui Pengajuan?',
            content: 'Yakin akan menyetujui pengajuan?',
            type: 'green',
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

      $(document).ready(function(){
        $(document).on('click', '#do-finish', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Nyatakan Selesai?',
            content: 'Yakin akan menyatakan pengabdian masyarakat selesai?',
            type: 'green',
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
