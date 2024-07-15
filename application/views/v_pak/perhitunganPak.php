<?php 
    if ($this->session->userdata("jab_fungsional") == 1) {
        $kredit_pendidikan = $sumPakPendidikan['angka_kredit_total'] * 0.55;
        $kredit_penelitian = $sumPakPenelitian['angka_kredit_total'] * 0.25;
    }elseif ($this->session->userdata("jab_fungsional") == 2) {
        $kredit_pendidikan = $sumPakPendidikan['angka_kredit_total'] * 0.45;
        $kredit_penelitian = $sumPakPenelitian['angka_kredit_total'] * 0.35;
    }elseif ($this->session->userdata("jab_fungsional") == 3) {
        $kredit_pendidikan = $sumPakPendidikan['angka_kredit_total'] * 0.40;
        $kredit_penelitian = $sumPakPenelitian['angka_kredit_total'] * 0.40;
    }elseif ($this->session->userdata("jab_fungsional") == 4) {
        $kredit_pendidikan = $sumPakPendidikan['angka_kredit_total'] * 0.35;
        $kredit_penelitian = $sumPakPenelitian['angka_kredit_total'] * 0.45;
    }
    $kredit_abdimas    = $sumPakAbdimas['angka_kredit_total'] * 0.10 ;
    $kredit_penunjang  = $sumPakPenunjang['angka_kredit_total'] * 0.10;

    $total          = $kredit_pendidikan + $kredit_penelitian + $kredit_abdimas + $kredit_penunjang;
    
    if ($total >= 100 && $total <= 199) {
        $jabatan = "Asisten Ahli";
    }elseif ($total >= 200 && $total <= 399) {
        $jabatan = "Lektor";
    }elseif ($total >= 400 && $total <= 849) {
        $jabatan = "Lektor Kepala";
    }elseif ($total >= 850) {
        $jabatan = "Guru Besar";
    }else {
        $jabatan = "";
    }
?>
<div class="alert alert-info" role="alert">
    Total Angka Kredit : <span class="badge badge-secondary"><?= $total ?></span><br>
</div>
<div class="alert alert-info" role="alert">
    Anda bisa mengajukan kenaikan pangkat menjadi <b><?= $jabatan ?></b>
</div>
