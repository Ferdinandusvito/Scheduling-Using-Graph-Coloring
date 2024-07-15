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
            <h1>Detail Penelitian</h1><hr><br>
            <table class="table-detail">
              <input type="hidden" id="nip" value="<?= $detailPenelitian['nip'] ?>">
              <input type="hidden" id="id_penelitian" value="<?= $detailPenelitian['id_penelitian'] ?>">
              <tr>
                  <td class="td-width">Skema Pengabdian Masyarakat</td>
                  <td class="td-padding1"><?= $detailPenelitian['skema'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Judul Penelitian</td>
                  <td class="td-padding1"><?= $detailPenelitian['judul_penelitian'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Ketua Peneliti</td>
                  <td class="td-padding1"><?= $detailPenelitian['nama_awal'] ?> <?= $detailPenelitian['nama_akhir'] ?></td>
              </tr>
              
              <?php 
                if (!empty($detailPenelitian['mitra_ketua'])) { ?>
                  <tr>
                    <td class="td-width">Ketua Tim Mitra</td>
                    <td class="td-padding1"><?= $detailPenelitian['mitra_ketua'] ?></td>
                  </tr>
                  <tr>
                    <td class="td-width">Institusi Mitra</td>
                    <td class="td-padding1"><?= $detailPenelitian['mitra_institusi'] ?></td>
                  </tr>
              <?php } ?>
              <tr>
                  <td class="td-width">Anggota Peneliti (Bd. Keahalian)</td>
                  <td class="td-padding1">
                    <?php 
                      $no = 1;
                      foreach ($dataAnggotaDsn as $data) {
                        echo $no.'. '.$data['nama_awal'].' '.$data['nama_akhir'].' ('.$data['nama_bidang'].') <br>'; 
                        $no++;
                      }
                    ?>
                  </td>
              </tr>
              <?php 
                if ($detailPenelitian['id_skema'] == 6) {?>
                  <tr>
                      <td class="td-width">Anggota Peneliti Mahasiswa</td>
                      <td class="td-padding1">
                        <?php 
                          $no = 1;
                          foreach ($dataAnggotaMhs as $data_mhs) {
                            echo $no.'. '.$data_mhs['nama_awal'].' '.$data_mhs['nama_akhir'].'<br>'; 
                            $no++;
                          }
                        ?>
                      </td>
                  </tr>
                  <?php
                }
              ?>
              <?php 
                if ($detailPenelitian['id_skema'] == '1' || $detailPenelitian['id_skema'] == '2' || $detailPenelitian['id_skema'] == '3' || $detailPenelitian['id_skema'] == '7') { ?>
                  <tr>
                    <td class="td-width">Sumber Pembiayaan (Universitas Telkom)</td>
                    <td class="td-padding1">Rp. <?= number_format($detailPenelitian['dana_internal']) ?>,-</td>
                  </tr>
                  <tr>
                    <td class="td-width">Sumber Pembiayaan (Mitra)</td>
                    <td class="td-padding1">Rp. <?= number_format($detailPenelitian['dana_luar']) ?>,-</td>
                  </tr>
                <?php }else{ ?>
                  <tr>
                    <td class="td-width">Pembiayaan</td>
                    <td class="td-padding1">Rp. <?= number_format($detailPenelitian['dana_luar']) ?>,-</td>
                  </tr>
                <?php }
              ?>
              <tr>
                  <td class="td-width">Tahun Anggaran</td>
                  <td class="td-padding1"><?= $detailPenelitian['thn_anggaran'] ?></td>
              </tr>
              <tr>
                  <td class="td-width">Semester</td>
                  <td class="td-padding1">
                    <?php 
                      if ($detailPenelitian['semester'] == 1) {
                        echo "Ganjil";
                      }else {
                        echo "Genap";
                      }
                    ?>
                  </td>
              </tr>
              <tr>
                  <td class="td-width">Tanggal Mengajukan</td>
                  <td class="td-padding1"><?= tgl_indo($detailPenelitian['tgl_mengajukan']) ?></td>
              </tr>
              <?php 
                if (!empty($detailPenelitian['tgl_disetujui'])) { ?>
                  <tr>
                    <td class="td-width">Tanggal Disetujui</td>
                    <td class="td-padding1"><?= tgl_indo($detailPenelitian['tgl_disetujui']) ?></td>
                  </tr>
                  <?php
                }
              ?>
              <?php 
                if (!empty($detailPenelitian['tgl_berjalan'])) { ?>
                  <tr>
                    <td class="td-width">Tanggal Berjalan</td>
                    <td class="td-padding1"><?= tgl_indo($detailPenelitian['tgl_berjalan']) ?></td>
                  </tr>
                  <?php
                }
              ?>
              <?php 
                if (!empty($detailPenelitian['tgl_selesai'])) { ?>
                  <tr>
                    <td class="td-width">Tanggal Selesai</td>
                    <td class="td-padding1"><?= tgl_indo($detailPenelitian['tgl_selesai']) ?></td>
                  </tr>
                  <?php
                }
              ?>
              <?php 
                if ((!empty($detailPenelitian['tgl_ditolak'])) && ($detailPenelitian['id_status'] == 5) ) { ?>
                  <tr>
                    <td class="td-width">Tanggal Ditolak</td>
                    <td class="td-padding1"><?= tgl_indo($detailPenelitian['tgl_ditolak']) ?></td>
                  </tr>
                  <?php
                }
              ?>
              <tr>
                  <td class="td-width">Status</td>
                  <td class="td-padding1"><?= $detailPenelitian['status_kk'] ?></td>
              </tr>
              <?php 
                  if (!empty($detailPenelitian['proposalAwal'])) { ?>
                  <tr>
                      <td class="td-width">Proposal Pengajuan</td>
                      <td class="td-padding1">
                        <a href="<?php print base_url('/assets/documents/penelitian/proposalAwal/'.$detailPenelitian['proposalAwal']) ?>" target="blank">
                          <?= $detailPenelitian['proposalAwal'] ?>
                        </a>
                      </td>
                  </tr>
              <?php } ?>
              <?php 
                  if (!empty($detailPenelitian['proposal'])) { ?>
                  <tr>
                      <td class="td-width">Proposal (yang sudah ditanda tangani)</td>
                      <td class="td-padding1">
                        <a href="<?php print base_url('/assets/documents/penelitian/proposal/'.$detailPenelitian['proposal']) ?>" target="blank">
                          <?= $detailPenelitian['proposal'] ?>
                        </a>
                      </td>
                  </tr>
              <?php } ?>
              <?php 
                  if (!empty($detailPenelitian['laporan_antara'])) { ?>
                  <tr>
                      <td class="td-width">Laporan Antara</td>
                      <td class="td-padding1">
                        <a href="<?php print base_url('/assets/documents/penelitian/laporan_antara/'.$detailPenelitian['laporan_antara']) ?>" target="blank">
                          <?= $detailPenelitian['laporan_antara'] ?>
                        </a>
                      </td>
                  </tr>
              <?php } ?>
              <?php 
                if ($detailPenelitian['id_status'] == 2) { ?>
                  <tr>
                      <td class="td-width">Laporan Akhir</td>
                      <td class="td-padding1">
                        <?php 
                          if (!empty($detailPenelitian['laporan_akhir'])) { ?>
                            <a href=""><?= $detailPenelitian['laporan_akhir'] ?></a>
                          <?php }else {
                            echo "Dosen belum unggah laporan akhir";
                          }
                        ?>
                      </td>
                  </tr> <?php
                }
              ?>
              <?php 
                  if (!empty($detailPenelitian['laporan_akhir'])) { ?>
                  <tr>
                      <td class="td-width">Laporan Akhir</td>
                      <td class="td-padding1">
                        <a href="<?php print base_url('/assets/documents/penelitian/laporan_akhir/'.$detailPenelitian['laporan_akhir']) ?>" target="blank">
                          <?= $detailPenelitian['laporan_akhir'] ?>
                        </a>
                      </td>
                  </tr>
              <?php } ?>
              <?php 
                  if (!empty($detailPenelitian['alasan_tolak'])) { ?>
                  <tr>
                      <td class="td-width">Alasan Ditolak</td>
                      <td class="td-padding1"><?= $detailPenelitian['alasan_tolak'] ?></td>
                  </tr>
              <?php } ?>
              <tr>
                <td class="td-width"></td>
                <td class="td-padding1">
                  <?php 
                    if ($detailPenelitian['id_status'] == '1') { ?>
                      <button data-link="<?= base_url('/Penelitian_kk/accept/'.$detailPenelitian['id_penelitian']) ?>" type="button" id="do-accept" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Accept</button>
                      <button data-link="<?= base_url('/Penelitian_kk/reject/'.$detailPenelitian['id_penelitian']) ?>" type="button" id="do-reject" class="btn btn-sm btn-danger"><i class="fas fa-times-circle"></i> Reject</button>
                      <?php
                    } elseif ($detailPenelitian['id_status'] == 2 || $detailPenelitian['id_status'] == 20) { 
                        if (!empty($detailPenelitian['laporan_akhir'])) { ?>
                          <button data-link="<?= base_url('/Penelitian_kk/finish/'.$detailPenelitian['id_penelitian']) ?>" type="button" id="do-finish"class="btn btn-sm btn-success" name="tombol_selesai"><i class="fas fa-check"></i> Nyatakan Selesai</button>
                          <?php
                        }else { ?>
                          <button class="btn btn-sm btn-success" name="tombol_selesai" disabled><i class="fas fa-check"></i> Nyatakan Selesai</button>
                          <?php 
                        }
                    }elseif ($detailPenelitian['id_status'] == 4) {
                      if (!empty($detailPenelitian['proposal'])) { ?>
                        <button data-link="<?= base_url('/Penelitian_kk/berjalan/'.$detailPenelitian['id_penelitian']) ?>" type="button" id="do-progress" class="btn btn-sm btn-success">Nyatakan Berjalan</button>
                        <?php
                      }else { ?>
                        <button data-link="" type="button" class="btn btn-sm btn-success disabled" data-toggle="tooltip" data-placement="top" title="Belum upload proposal">Nyatakan Berjalan</button>
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
          var form = `<textarea class="form-control" placeholder="Berikan Alasan" id="alasan_tolak" name="alasan_tolak"></textarea>`;
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
                    var alasan_tolak  = $('#alasan_tolak').val()
                    var id_penelitian = $('#id_penelitian').val()
                    var nip           = $('#nip').val()
                    $.ajax({
                      url : "<?= base_url('Penelitian_kk/reject') ?>",
                      type: 'post',
                      data : {
                              alasan_tolak  : alasan_tolak,
                              id_penelitian : id_penelitian,
                              nip           : nip
                              },
                      success : function () {
                        window.location = '<?= base_url("/Penelitian_kk/pengajuanDitolak")?>'
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
        $(document).on('click', '#do-accept', function () {
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
                    var id_penelitian = $('#id_penelitian').val()
                    var nip        = $('#nip').val()
                    $.ajax({
                      url  : "<?= base_url('Penelitian_kk/accept') ?>",
                      type : 'post',
                      data : {
                        id_penelitian : id_penelitian,
                        nip           : nip
                      },
                      success: function(){
                        window.location.href = "<?= base_url('/Penelitian_kk/pengajuanSetuju') ?>"; 
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
            content: 'Yakin akan menyatakan selesai penelitian?',
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
            title: 'Nyatakan Berjalan?',
            content: 'Yakin akan menyatakan berjalan?',
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
