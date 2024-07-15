<?php
include '../config.php';

include'includes/ez_sql_core.php';
include'includes/ez_sql_mysqli.php';
$db = new ezSQL_mysqli($config[username], $config[password], $config[database_name], $config[server]);
include'includes/general.php';
include'includes/paging.php';

$mod = $_GET[m];
$act = $_GET[act];
function AG_get_hari_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_hari, nama_hari FROM tb_hari ORDER BY kode_hari");
    foreach($rows as $row){
        if($row->kode_hari==$selected)
            $a.="<option value='$row->kode_hari' selected>[$row->kode_hari] $row->nama_hari</option>";
        else
            $a.="<option value='$row->kode_hari'>[$row->kode_hari] $row->nama_hari</option>";
    }
    return $a;
}

function AG_get_jam_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_jam, nama_jam FROM tb_jam ORDER BY kode_jam");
    foreach($rows as $row){
        if($row->kode_jam==$selected)
            $a.="<option value='$row->kode_jam' selected>[$row->kode_jam] $row->nama_jam</option>";
        else
            $a.="<option value='$row->kode_jam'>[$row->kode_jam] $row->nama_jam</option>";
    }
    return $a;
}

function AG_get_matkul_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_matkul, nama_matkul FROM tb_matkul ORDER BY kode_matkul");
    foreach($rows as $row){
        if($row->kode_matkul==$selected)
            $a.="<option value='$row->kode_matkul' selected>[$row->kode_matkul] $row->nama_matkul</option>";
        else
            $a.="<option value='$row->kode_matkul'>[$row->kode_matkul] $row->nama_matkul</option>";
    }
    return $a;
}

function AG_get_kelas_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_kelas, nama_kelas FROM tb_kelas ORDER BY kode_kelas");
    foreach($rows as $row){
        if($row->kode_kelas==$selected)
            $a.="<option value='$row->kode_kelas' selected>[$row->kode_kelas] $row->nama_kelas</option>";
        else
            $a.="<option value='$row->kode_kelas'>[$row->kode_kelas] $row->nama_kelas</option>";
    }
    return $a;
}

function AG_get_dosen_option($selected = ''){
    global $db;
    $rows = $db->get_results("SELECT kode_dosen, nama_depan FROM tb_dosen ORDER BY kode_dosen");
    foreach($rows as $row){
        if($row->kode_dosen==$selected)
            $a.="<option value='$row->kode_dosen' selected>[$row->kode_dosen] $row->nama_depan</option>";
        else
            $a.="<option value='$row->kode_dosen'>[$row->kode_dosen] $row->nama_depan</option>";
    }
    return $a;
}