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
        <h1>Pengajuan Penelitian</h1><hr><br>
            <?php echo form_open_multipart('Penelitian/simpanPengajuan/') ?>
              <div class="form-group">
                <label class="control-label col-sm-4">
                    Tahun Anggaran					
                </label>
                <div class="col-sm-2">
                  <select name="thn_anggaran" id="thn_anggaran" class="form-control" reqiured>
                    <option value="">Pilih Tahun</option>
                    <?php
                      $thn_skr = date('Y');
                      for ($x = $thn_skr + 1; $x >= $thn_skr; $x--) {
                      ?>
                          <option value="<?php echo $x ?>"><?php echo $x ?></option>
                      <?php
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">
                  Semester
                </label>
                <div class="col-sm-2">
                  <select name="semester" id="semester" class="form-control">
                    <option value="">Pilih Semester</option>
                    <option value="1">Ganjil</option>
                    <option value="2">Genap</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-4">
                    Skema Penelitian
                </label>
                <div class="col-sm-4">
                    <select name="id_skema" id="id_skema" class="form-control">
                      <option value="">- Pilih Skema Penelitian -</option>
                      <?php 
                        foreach ($list_skemaPenelitian as $row) { ?>
                          <option value="<?= $row['id_skema'] ?>"><?= $row['skema'] ?></option>
                      <?php  }
                      ?>
                    </select>
                </div>
              </div>
              <div id="input-penelitian">
                <div class="form-group" id="judul_penelitian">
                  <label class="control-label col-sm-4">
                      Judul
                  </label>
                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="judul_penelitian" required>
                  </div>
                </div>
                <div class="form-group" id="bidang_unggulan">
                  <label class="control-label col-sm-4">
                      Bidang Unggulan
                  </label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="bidang_unggulan">
                  </div>
                </div>
                <div class="form-group" id="topik_unggulan">
                  <label class="control-label col-sm-4">
                      Topik Unggulan
                  </label>
                  <div class="col-sm-8">
                      <input type="text" class="form-control" name="topik_unggulan">
                  </div>
                </div>
                <div class="form-group" id="mitra_ketua">
                  <label class="control-label col-sm-4">
                      Ketua Tim Mitra
                  </label>
                  <div class="col-sm-3" id="mitra_ketua">
                      <input type="text" class="form-control" name="mitra_ketua">
                  </div>
                </div>
                <div class="form-group" id="mitra_institusi">
                  <label class="control-label col-sm-4">
                      Institusi Mitra
                  </label>
                  <div class="col-sm-3">
                      <input type="text" class="form-control" name="mitra_institusi">
                  </div>
                </div>
                <div class="form-group"  id="anggota_peneliti">
                    <label class="control-label col-sm-10">
                        Anggota Peneliti (Bd.Keahlian)
                    </label>
                    <div class="col-sm-12" id="penelitian">
                        <div class="row">
                            <div class="col-md-5">
                                <select name="anggota_peneliti[]" class="form-control btn-skema" id="form-penelitian">
                                    <option value="">- Pilih Anggota Peneliti -</option>
                                    <?php  
                                        foreach ($list_dosen as $row) { ?>
                                            <option value="<?= $row['nip'] ?>"><?= $row['nama_awal'].' '. $row['nama_akhir'].' ('.$row['bidang'].')' ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-primary" id="add_penelitian">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group"  id="anggota_peneliti_mhs">
                    <label class="control-label col-sm-10">
                        Anggota Peneliti Mahasiswa
                    </label>
                    <div class="col-sm-12" id="penelitian_mhs">
                        <div class="row">
                            <div class="col-md-5">
                                <select name="anggota_peneliti_mhs[]" class="form-control btn-skema" id="form-penelitian_mhs">
                                    <option value="">- Pilih Anggota Peneliti -</option>
                                    <?php  
                                        foreach ($list_mahasiswa as $row) { ?>
                                            <option value="<?= $row['nim'] ?>"><?= $row['nama_awal'].' '. $row['nama_akhir'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-primary" id="add_penelitian_mhs">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group" id="dana_internal">
                  <label class="control-label col-sm-4">
                      Sumber Pembiayaan (Universitas Telkom)
                  </label>
                  <div class="col-sm-3">
                      <input type="number" class="form-control" name="dana_internal" placeholder="ex : 1200000">
                  </div>
                </div>
                <div class="form-group"  id="dana_luar">
                  <label class="control-label col-sm-4">
                      Sumber Pembiayaan <font id="mitra">(Mitra)</font>
                  </label>
                  <div class="col-sm-3">
                      <input type="number" class="form-control" name="dana_luar" placeholder="ex : 1200000">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">
                      Tanggal Pengajuan					
                  </label>
                  <div class="col-sm-3">
                      <?php $date = date('Y-m-d') ?>
                      <input type="text" class="form-control" name="tgl_mengajukan" value="<?= $date ?>" placeholder="<?= $date ?>" disabled="disabled">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-4">
                      Proposal Pengajuan			
                  </label>
                  <div class="col-sm-3">
                      <?php $date = date('Y-m-d') ?>
                      <input type="file" name="proposalAwal">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-10">
                      <button type="submit" name="btnSimpanPengajuan" class="btn btn-primary">
                          Simpan
                      </button>
                  </div>
                </div>
              </div>  
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
      $(document).ready(function () {
        var id_skema      = $('#id_skema').val()
        
        $('#input-penelitian').hide()
        function show_form() {
          $('#mitra_ketua').show()
          $('#mitra_institusi').show()
          $('#anggota_peneliti').show()
          $('#anggota_peneliti_mhs').show()
          $('#dana_internal').show()
          $('#mitra').show()
          $('#bidang_unggulan').show()
          $('#topik_unggulan').show()
        }
        $(document).on('change','#id_skema',function (e) {
          $('#input-penelitian').show()
          var id_skema = $(this).val()
          console.log(id_skema)
          if (id_skema == 5 || id_skema == 4) {
            show_form()
            $('#mitra_ketua').hide()
            $('#mitra_institusi').hide()
            $('#anggota_peneliti_mhs').hide()
            $('#dana_internal').hide()
            $('#mitra').hide()
            $('#bidang_unggulan').hide()
            $('#topik_unggulan').hide()
          }else if (id_skema == 6) {
            show_form()
            $('#mitra_ketua').hide()
            $('#mitra_institusi').hide()
            $('#dana_internal').hide()
            $('#bidang_unggulan').hide()
            $('#topik_unggulan').hide()
          }else if (id_skema == 7) {
            show_form()
            $('#mitra_ketua').hide()
            $('#mitra_institusi').hide()
            $('#anggota_peneliti_mhs').hide()
          }else if (id_skema == 1 || id_skema == 2 || id_skema == 3){
            show_form()
            $('#bidang_unggulan').hide()
            $('#topik_unggulan').hide()
            $('#anggota_peneliti_mhs').hide()
          }
          
          else {
            show_form()
            $('#input-penelitian').hide()
          }

          var thn_anggaran  = $('#thn_anggaran').val()
          if (id_skema) {
            $.ajax({
              url : '<?= base_url('Penelitian/cekValidasi/') ?>'+id_skema +'/'+thn_anggaran,
              type : 'get',
              success:function (rest) {
                console.log(rest)
                if (rest) {
                  alert('Penelitian Sudah Pernah')
                  $('#id_skema').val('').trigger('change')
                }
              }
            })
          }
        })
      })

      $(document).on('click', '#add_penelitian', function() {
        var form_penelitian = $('#form-penelitian').html()
        var html_form = `
          <div class="row">
            <div class="col-md-5">
              <select name="anggota_peneliti[]" class="form-control btn-skema">
                ${form_penelitian}
              </select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger" id="delete-form">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
          </div>
        `
        $('#penelitian').append(html_form)
      })

      $(document).on('click', '#delete-form', function() {
        $(this).parent().parent().remove()
      })

      $(document).on('click', '#add_penelitian_mhs', function() {
        var form_penelitian_mhs = $('#form-penelitian_mhs').html()
        var html_form = `
          <div class="row">
            <div class="col-md-5">
              <select name="anggota_peneliti_mhs[]" class="form-control btn-skema">
                ${form_penelitian_mhs}
              </select>
            </div>
            <div class="col-md-1">
                <button type="button" class="btn btn-danger" id="delete-form-mhs">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
          </div>
        `
        $('#penelitian_mhs').append(html_form)
      })

      $(document).on('click', '#delete-form-mhs', function() {
        $(this).parent().parent().remove()
      })

    </script>
  </body>
</html>
