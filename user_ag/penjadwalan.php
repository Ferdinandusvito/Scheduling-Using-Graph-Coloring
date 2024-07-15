
<?php

print_r($_SESSION['']);
$success = true;
$a = 10;
$b = 25;
$c = 75;
$d = 25;

if(isset($_GET['num_kromosom'])) {
    $num_kromosom = $_GET['num_kromosom'];
    if($num_kromosom<$a || $num_kromosom>500) {
        print_msg("Masukkan jumlah kromosom dari $a sampai 500");
        $success = false;
    }   
    
    $max_generation = $_GET['max_generation'];
    if($max_generation<$b || $max_generation>500) {
        print_msg("Masukkan maksimal generasi dari $b sampai 500");
        $success = false;
    } 
    
    $crossover_rate = $_GET['crossover_rate'];
    if($crossover_rate<1 || $crossover_rate>100) {
        print_msg("Masukkan dari 1 sampai 100");
        $success = false;
    } 
    
    $mutation_rate = $_GET['mutation_rate'];
    if($mutation_rate<1 || $mutation_rate>100) {
        print_msg("Masukkan dari 1 sampai 100");
        $success = false;
    } 
} else {
    $num_kromosom = $a;
    $max_generation = $b;
    $crossover_rate = $c;
    $mutation_rate = $d;
}
?>
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Penjadawalan</h3>
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
  </div>
  <div class="box-body no-padding">
    <div class="row">
     <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading"> 
            <form action="?">
                <input type="hidden" name="m" value="penjadwalan" />
                <div class="form-group">
                    <label>Jumlah Kromosom Dibangkitkan</label>
                    <input class="form-control" type="text" name="num_kromosom" value="<?=$num_kromosom?>" />
                    <p class="help-block">Masukkan antara <?=$a?>-500</p>
                </div>
                <div class="form-group">
                    <label>Maksimal Generasi</label>
                    <input class="form-control" type="text" name="max_generation" value="<?=$max_generation?>" />
                    <p class="help-block">Masukkan antara <?=$b?>-500</p>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="debug" <?=(isset($_GET['debug'])) ? 'checked' : ''?> name="debug" /> Tampilkan proses algoritma
                    </label>
                </div>
                <a class="btn btn-info" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  Opsi Lain
              </a>
              <div class="collapse" id="collapseExample">
                <hr />
                <div class="well">
                    Total Kuliah: <?=$db->get_var("SELECT COUNT(*) FROM tb_kuliah")?><br />
                    Total Waktu: <?=$db->get_var("SELECT COUNT(*) FROM tb_waktu")?><br />
                    Total Ruang: <?=$db->get_var("SELECT COUNT(*) FROM tb_ruang")?>
                </div>
                <div class="form-group">
                    <label>Crossover Rate</label>
                    <input class="form-control" type="text" name="crossover_rate" value="<?=$crossover_rate?>" />
                    <p class="help-block">Masukkan antara 1-100</p>
                </div>   
                <div class="form-group">
                    <label>Mutation Rate</label>
                    <input class="form-control" type="text" name="mutation_rate" value="<?=$mutation_rate?>" />
                    <p class="help-block">Masukkan antara 1-100</p>
                </div>
            </div>                                    
            <button class="btn btn-primary">Generate Jadwal</button> 
            <?php if($success && isset($_GET['num_kromosom'])) :?>
                <a class="btn btn-success" href="http://localhost/TELUCUSS/index.php/hitung/jadwal" target="_blank">Lihat Jadwal</a>
            <?php endif ?>           
        </form>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
include 'ag.php';

if($success && isset($_GET['num_kromosom'])) {
    echo '<hr />';
    
    $arrRuang =  $db->get_results("SELECT kode_ruang, nama_ruang FROM tb_ruang ORDER BY kode_ruang ");
    $arrWaktu = $db->get_results("SELECT w.`kode_waktu`, w.`kode_kelas`, w.`kode_jam`, h.`nama_kelas`, j.`nama_jam`
        FROM tb_waktu w INNER JOIN tb_kelas h ON h.`kode_kelas`=w.`kode_kelas` INNER JOIN tb_jam j ON j.`kode_jam`=w.`kode_jam`
        ORDER BY w.`kode_waktu`;");
    $arrKuliah = $db->get_results("SELECT k.`kode_kuliah`, k.`kode_matkul`, k.`kode_hari`, k.`kode_dosen`, m.`nama_matkul`, m.`sks`, d.`nama_depan`	 
        FROM tb_kuliah k 
        LEFT JOIN tb_dosen d ON d.`kode_dosen`=k.`kode_dosen`
        LEFT JOIN tb_matkul m ON m.`kode_matkul`=k.`kode_matkul`
        ORDER BY k.`kode_kuliah` ;");
    
    $ag = new AG($arrWaktu, $arrRuang, $arrKuliah);
    $ag->num_crommosom = $num_kromosom;
    $ag->max_generation = $max_generation;
    $ag->debug = $_GET[debug];

    $ag->crossover_rate = $crossover_rate;
    $ag->generate();
}
?>