<!DOCTYPE html>
<html lang="en">
  <head>
    <?php $this->load->view("_partials/header.php"); ?>
  </head>
  <body id="page-top">
    <?php $this->load->view("_partials/navbar.php", $this->data); ?>

    <div id="wrapper">
      <?php $this->load->view("_partials/sidebar.php"); ?>
      <div id="content-wrapper">
       <div class="container-fluid">
          <div class="mb-3">
            <h1>Detail Pengabdian Masyarakat</h1><hr><br>
            <table class="table-detail">
                <input type="hidden" id="nip" value="<?= $data_abdimas['nip'] ?>">
                <input type="hidden" id="id_abdimas" value="<?= $data_abdimas['id_abdimas'] ?>">
                <tr>
                    <td class="td-width">Dosen Pengabdi</td>
                    <td class="td-padding1"><?= $data_abdimas['nama_awal'] ?> <?= $data_abdimas['nama_akhir'] ?></td>
                </tr>
                <tr>
                    <td class="td-width">Judul</td>
                    <td class="td-padding1"><?= $data_abdimas['judul_abdimas'] ?></td>
                </tr>
                <tr>
                    <td class="td-width">Mitra (Instansi/Badan/Komunitas/(nama mitra))</td>
                    <td class="td-padding1"><?= $data_abdimas['mitra_instansi'] ?></td>
                </tr>
                <tr>
                    <td class="td-width">Masyarakat Sasar</td>
                    <td class="td-padding1"><?= $data_abdimas['mitra_sasar'] ?></td>
                </tr>
                <tr>
                    <td class="td-width">Skema Pengabdian Masyarakat</td>
                    <td class="td-padding1"><?= $data_abdimas['skema'] ?></td>
                </tr>
                <tr>
                    <td class="td-width">Usulan/Realisasi Anggaran (Dana Internal)</td>
                    <td class="td-padding1">Rp. <?= number_format($data_abdimas['dana_internal']) ?>,-</td>
                </tr>
                <tr>
                    <td class="td-width">Usulan/Realisasi Anggaran (Sumber dana lain institusi)</td>
                    <td class="td-padding1">Rp. <?= number_format($data_abdimas['dana_luar']) ?>,-</td>
                </tr>
                <tr>
                    <td class="td-width">Anggota</td>
                    <td class="td-padding1">
                      <?php 
                        $no = 1 ;
                        foreach ($getAnggotaAbdimas as $getAnggotaAbdimas) {
                          echo $no.'. '.$getAnggotaAbdimas['nama_awal'].' '.$getAnggotaAbdimas['nama_akhir'].'<br>';
                          $no++;
                        }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td class="td-width">Tanggal Mengajukan</td>
                    <td class="td-padding1"><?= tgl_indo($data_abdimas['tgl_mengajukan']) ?></td>
                </tr>
                <?php 
                  if (!empty($data_abdimas['tgl_disetujui'])) { ?>
                    <tr>
                        <td class="td-width">Tanggal Disetujui</td>
                        <td class="td-padding1"><?= tgl_indo($data_abdimas['tgl_disetujui']) ?></td>
                    </tr>
                    <?php
                  }
                ?>
                <?php 
                  if (!empty($data_abdimas['tgl_berjalan'])) { ?>
                    <tr>
                        <td class="td-width">Tanggal Dinyatakan Berjalan</td>
                        <td class="td-padding1"><?= tgl_indo($data_abdimas['tgl_berjalan']) ?></td>
                    </tr>
                    <?php
                  }
                ?>
                <?php 
                  if (!empty($data_abdimas['tgl_selesai'])) { ?>
                    <tr>
                        <td class="td-width">Tanggal Selesai</td>
                        <td class="td-padding1"><?= tgl_indo($data_abdimas['tgl_selesai']) ?></td>
                    </tr>
                    <?php
                  }
                ?>
                <tr>
                    <td class="td-width">Tahun Anggaran</td>
                    <td class="td-padding1"><?= $data_abdimas['thn_anggaran'] ?></td>
                </tr>
                <?php 
                  if (!empty($data_abdimas['proposalAwal'])) { ?>
                    <tr>
                      <td class="td-width">Proposal Pengajuan</td>
                      <td class="td-padding1">
                      <a href="<?php print base_url('/assets/documents/abdimas/proposalAwal/'.$data_abdimas['proposalAwal']) ?>" target="blank">
                        <?= $data_abdimas['proposalAwal'] ?>
                      </a>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                <?php 
                  if (!empty($data_abdimas['proposal'])) { ?>
                    <tr>
                      <td class="td-width">Proposal (yang sudah ditanda tangani)</td>
                      <td class="td-padding1">
                      <a href="<?php print base_url('/assets/documents/abdimas/proposal/'.$data_abdimas['proposal']) ?>" target="blank">
                        <?= $data_abdimas['proposal'] ?>
                      </a>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                <?php 
                  if (!empty($data_abdimas['laporan_antara'])) { ?>
                    <tr>
                      <td class="td-width">Laporan Kemajuan</td>
                      <td class="td-padding1">
                      <a href="<?php print base_url('/assets/documents/abdimas/laporan_antara/'.$data_abdimas['laporan_antara']) ?>" target="blank">
                        <?= $data_abdimas['laporan_antara'] ?>
                      </a>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                <?php 
                  if (!empty($data_abdimas['laporan_akhir'])) { ?>
                    <tr>
                      <td class="td-width">Laporan Akhir</td>
                      <td class="td-padding1">
                      <a href="<?php print base_url('/assets/documents/abdimas/laporan_akhir/'.$data_abdimas['laporan_akhir']) ?>" target="blank">
                        <?= $data_abdimas['laporan_akhir'] ?>
                      </a>
                      </td>
                    </tr>
                    <?php
                  }
                ?>
                <tr>
                    <td class="td-width">Status</td>
                    <td class="td-padding1"><?= $data_abdimas['status_kk'] ?></td>
                </tr>
                <?php 
                  if ($data_abdimas['id_status'] == '5') { ?>
                    <tr>
                      <td class="td-width">Alasan Ditolak</td>
                      <td class="td-padding1"><?= $data_abdimas['alasan_tolak'] ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td class="td-width"></td>
                    <td class="td-padding1">
                      <br>
                      <?php 
                        if ($data_abdimas['id_status'] == 1 ) { ?>
                          <button data-link="<?php echo base_url('/Abdimas_kk/accept/'.$data_abdimas['id_abdimas']) ?>" type="button" id="do-confirm"class="btn btn-sm btn-success" name="tombol_accept"><i class="fas fa-check"></i> Accept</button>
                          <button data-link="<?php echo base_url('/Abdimas_kk/reject/'.$data_abdimas['id_abdimas']) ?>" type="button" id="do-reject"class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Reject</button>
                          <?php
                        }elseif ($data_abdimas['id_status'] == 4) {
                          if (!empty($data_abdimas['proposal'])) { ?>
                            <button data-link="<?= base_url('/Abdimas_kk/berjalan/'.$data_abdimas['id_abdimas']) ?>" type="button" id="do-progress" class="btn btn-sm btn-success">Nyatakan Berjalan</button>
                            <?php
                          }else { ?>
                            <button type="button" class="btn btn-sm btn-success disabled" data-toggle="tooltip" data-placement="top" title="Belum upload proposal pengajuan">Nyatakan Berjalan</button>
                            <?php
                          }
                        }elseif ($data_abdimas['id_status'] == 20) {
                          if (!empty($data_abdimas['laporan_akhir'])) { ?>
                            <button data-link="<?php echo base_url('/Abdimas_kk/finish/'.$data_abdimas['id_abdimas']) ?>" type="button" id="do-finish"class="btn btn-sm btn-success" name="tombol_selesai">
                              <i class="fas fa-check"></i> 
                              Nyatakan Selesai
                            </button>
                            <?php
                          }
                        }
                      ?>
                    </td>
                </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php"); ?>
    <?php $this->load->view("_partials/js.php"); ?>
    <script>
      $(document).ready(function(){
        $(document).on('click', '#do-reject', function () {
          var href = $(this).attr('data-link');
          var form = `<textarea class="form-control" name="alasan_tolak" id="alasan_tolak" placeholder="Berikan Alasan"></textarea>`;
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
                    $.ajax({
                      url : href,
                      type: 'post',
                      data : {alasan_tolak : $('#alasan_tolak').val()},
                      success : function () {
                        window.location = '<?php echo base_url("/Abdimas_kk/pengajuanRejected")?>'
                      }
                    })
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
                    var id_abdimas = $('#id_abdimas').val()
                    var nip        = $('#nip').val()
                    $.ajax({
                      url  : "<?= base_url('Abdimas_kk/accept') ?>",
                      type : 'post',
                      data : {
                        id_abdimas : id_abdimas,
                        nip        : nip
                      },
                      success: function(){
                        window.location.href = href; 
                      }
                    })
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
