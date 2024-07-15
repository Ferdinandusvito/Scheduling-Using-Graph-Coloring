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
            <h1>Pengajuan Pengabdian Masyarakat</h1><hr><br>
            <?php if ($this->session->flashdata('alert_setuju')) {?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('alert_setuju'); ?>
                </div>
            <?php } ?>
            <div class="btn-group" role="group" aria-label="Basic example">
                <a href="<?= base_url('/Abdimas_kk/pengajuanAbdimas') ?>" class="btn btn-secondary">Pengajuan belum disetujui</a>
                <a href="" class="btn btn-secondary active">Pengajuan sudah disetujui</a>
                <a href="<?= base_url('/Abdimas_kk/pengajuanRejected') ?>" class="btn btn-secondary">Pengajuan ditolak</a>
            </div><br><br>
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Mitra</th>
                    <th>Dosen Pemohon</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach($list_abdimasAccepted as $row){ ?>
                      <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['judul_abdimas'] ?></td>
                        <td><?= $row['mitra_instansi'] ?></td>
                        <td><?= $row['kode_dosen']; ?></td>
                        <td>
                          <center>
                            <a href='<?= base_url('/Abdimas_kk/detailAbdimas/'.$row['id_abdimas']) ?>' class='btn btn-sm btn-primary'>Detail</i></a>
                            <?php 
                              if (!empty($row['proposal'])) { ?>
                                <button data-link="<?= base_url('/Abdimas_kk/berjalan/'.$row['id_abdimas']) ?>" type="button" id="do-progress" class="btn btn-sm btn-success">Nyatakan Berjalan</button>
                                <?php
                              }else { ?>
                                <button type="button" class="btn btn-sm btn-success disabled" data-toggle="tooltip" data-placement="top" title="Belum upload proposal pengajuan">Nyatakan Berjalan</button>
                                <?php
                              }
                            ?>
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
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-progress', function () {
          var href = $(this).attr('data-link');
          $.confirm({
            title: 'Perbarui Status?',
            content: 'Yakin akan menyatakan penelitian berjalan?',
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
