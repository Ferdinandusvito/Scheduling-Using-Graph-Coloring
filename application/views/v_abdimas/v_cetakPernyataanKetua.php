<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $list_abdimas['nip'] ?> | Lembar Pengesahan Proposal</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body onload="window.print()" id="lembar-pengesahan">
    <p class="judul-cetak">SURAT PERNYATAAN KETUA/KOORDINATOR TIM<BR>PENGABDIAN MASYARAKAT </p>
    <br><br>
    Yang bertanda tangan di bawah ini: <br><br>
    <table>
        <tr>
            <td class="td-width3">Nama</td>
            <td class="">:</td>
            <td class="td-width4"><?= $list_abdimas['judul_abdimas'] ?></td>
        </tr>
        <tr>
            <td class="td-width3">NIP/NIDN</td>
            <td class="">:</td>
            <td class="td-width4"><?= $list_abdimas['skema'] ?></td>
        </tr>
        <tr>
            <td class="td-width3">Prodi</td>
            <td class="">:</td>
            <td class="td-width4">Rekayasa Komputer</td>
        </tr>
    </table><br>
    Dengan ini menyatakan bahwa proposal pengabdian saya dengan judul : <?= $list_abdimas['judul_abdimas'] ?>
    <br><br>
    Yang saya usulkan dalam Pengabdian Masyarakat dana internal Universitas Telkom tahun anggaran tahun <?= $list_abdimas['thn_anggaran'] ?> belum pernah dibiayai oleh lembaga/sumber dana lain. 
    <br><br>
    Bilamana diketahui dikemudian hari bahwa adanya indikasi ketidak jujuran/itikad kurang baik sebagaimana dimaksud di atas, maka kegiatan ini batal dan saya bersedia mengembalikan dana yang telah diterima kepada pihak Universitas melalui PPM. 
    <br><br>
    Demikian pernyataan ini dibuat dengan sesungguhnya dan dengan sebenar-benarnya. 
    <br><br><br>
    Bandung, <?= tgl_indo(date('Y-m-d')) ?>
    <br><br>
    Yang menyatakan,
    <br><br><br><br><br><br><br><br>
    <?= $list_abdimas['nama_awal'] ?> <?= $list_abdimas['nama_akhir'] ?>
    <br>
    NIP. <?= $list_abdimas['nip'] ?>


</body>
</html>