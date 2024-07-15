<div class="page-header">
    <h1>Jadwal Kuliah</h1>
</div>
<div class="panel panel-default">
<div class="panel-heading">
    <form class="form-inline">
        <input type="hidden" name="m" value="hasil" />
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Pencarian. . ." name="q" value="<?=$_GET['q']?>" />
        </div>
        <div class="form-group">
            <button class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Refresh</a>
        </div>
    </form>
</div>

<table class="table table-bordered table-hover table-striped">
<thead>
    <tr class="nw">
        <th>No</th>
        <th>Hari</th>
        <th>Jam</th>
        <th>Mata Kuliah</th>
        <th>SKS</th>
        <th>Kelas</th>
        <th>Ruang</th>
        <th>Dosen</th>
    </tr>
</thead>
<?php
$q = esc_field($_GET['q']);
$rows = $db->get_results("SELECT *,h.`nama_hari`, tb_jam.`nama_jam`, m.`nama_matkul`, m.`sks`, k.kode_kelas, d.`nama_depan`, r.`nama_ruang`, tb_jam.`nama_jam` + INTERVAL m.sks * 45 MINUTE AS jam_selesai
FROM tb_kuliah k 
	INNER JOIN tb_dosen d ON d.`kode_dosen`=k.`kode_dosen`
	INNER JOIN tb_matkul m ON m.`kode_matkul`=k.`kode_matkul`
	INNER JOIN `tb_jadwal` j ON j.`kuliah` = k.`kode_kuliah`
	INNER JOIN tb_ruang r ON r.`kode_ruang` = j.`ruang`
	INNER JOIN tb_waktu w ON w.`kode_waktu` = j.`waktu`
	INNER JOIN tb_hari h ON h.`kode_hari` = w.`kode_hari`
	INNER JOIN tb_jam ON tb_jam.`kode_jam` = w.`kode_jam`
    INNER JOIN tb_kelas ks ON ks.`kode_kelas` = k.`kode_kelas`
WHERE 1
ORDER BY ks.`kode_kelas`, w.`kode_jam`");
$no=0;

foreach($rows as $row):?>
<tr>
    <td><?=++$no ?></td>
    <td><?=$row->nama_kelas?></td>
    <td><?=substr($row->nama_jam, 0, 5) . ' - ' . substr($row->jam_selesai, 0, 5)?></td>
    <td><?=$row->nama_matkul?></td>
    <td><?=$row->sks?></td>
    <td><?=$row->nama_hari?></td>
    <td><?=$row->nama_ruang?></td>
    <td><?=$row->nama_depan?></td>
</tr>
<?php endforeach;
?>
</table>
</div>