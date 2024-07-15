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
            <?php echo form_open_multipart('Abdimas/simpanPengajuan/') ?>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Tahun Anggaran					
                    </label>
                    <div class="col-sm-2">
                        <select name="thn_anggaran" id="thn_anggaran" class="form-control" reqiured>
                            <option value="">Tahun Anggaran </option>
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
                        <select name="semester" id="" class="form-control" reqiured>
                            <option value="">- Pilih -</option>
                            <option value="1">Ganjil</option>
                            <option value="2">Genap</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Ketua Peneliti
                    </label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" value="<?= $this->session->userdata('nama_awal').' '. $this->session->userdata('nama_akhir')?>" disabled="disabled">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Skema Pengabdian Masyarakat
                    </label>
                    <div class="col-sm-5">
                        <select name="id_skema" id="id_skema" class="form-control" required>
                            <option value="">- Pilih Skema Pengabdian Masyarakat - </option>
                            <?php
                                foreach($list_skema as $row){
                                    echo "
                                    <option value='$row[id_skema]'>$row[skema]</option>
                                    ";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Judul
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="judul_abdimas" value="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Mitra (Instansi/Badan/Komunitas/..(nama pihak mitra))
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mitra_instansi" value="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Masyarakat sasar (termasuk jumlahnya)
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="mitra_sasar" value="" required>
                    </div>
                </div>
                <div class="form-group"  id="anggota_peneliti">
                    <label class="control-label col-sm-10">
                        Anggota Peneliti (Bd.Keahlian)
                    </label>
                    <div class="col-sm-12" id="penelitian">
                        <div class="row">
                            <div class="col-md-5">
                                <select name="anggota_abdimas[]" class="form-control btn-skema" id="form-abdimas">
                                    <option value="">- Pilih Anggota Peneliti -</option>
                                    <?php  
                                        foreach ($list_dosen as $row) { ?>
                                            <option value="<?= $row['nip'] ?>"><?= $row['nama_awal'] ?> <?= $row['nama_akhir'] ?></option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-1">
                                <button type="button" class="btn btn-primary" id="add_abdimas">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Kelompok Keahlian
                    </label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Rekayasa Komputer" disabled="disable">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">
                        Usulan / Realisasi Anggaran (Dana Internal)
                    </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="dana_internal" value="" placeholder="contoh : 12000000">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-5">
                        Usulan / Realisasi Anggaran (Sumber dana lain institusi)
                    </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="dana_luar" value="" placeholder="contoh : 12000000">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-5">
                        Proposal Pengajuan
                    </label>
                    <div class="col-sm-5">
                        <input type="file" name="proposalAwal">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-10">
                        <button name="tombol_submit" class="btn btn-primary">
                            Simpan
                        </button>
                    </div>
                </div>
            <!-- </form> -->
        </div>
      </div>
    </div>
    <?php $this->load->view("_partials/footer.php") ?>
    <script>
        $(document).on('click', '#add_abdimas', function() {
            var form_penelitian = $('#form-abdimas').html()
            var html_form = `
            <div class="row">
                <div class="col-md-5">
                    <select name="anggota_abdimas[]" class="form-control btn-skema">
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

        $(document).on('change', '#id_skema', function () {
            var id_skema      = $(this).val()
            var thn_anggaran  = $('#thn_anggaran').val()
            if (id_skema) {
                $.ajax({
                    url : '<?= base_url('Abdimas/cekValidasi/') ?>'+id_skema +'/'+thn_anggaran,
                    type : 'get',
                    success:function (rest) {
                        console.log(rest)
                        if (rest) { 
                            alert('Anda sudah menjadi ketua pada abdimas tersebut pada tahun anggaran')
                            $('#id_skema').val('').trigger('change')
                        }
                    }
                })
            }
        })
    </script>
  </body>
</html>
