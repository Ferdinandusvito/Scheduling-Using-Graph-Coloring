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
    <p class="judul-cetak">
        SURAT KESEDIAAN MENJADI MASYARAKAT SASAR <BR>
        PENGABDIAN MASYARAKAT<BR>
        UNIVERSITAS TELKOM
    </p>
    <br><br><br><br>
    Saya yang bertanda tangan di bawah ini: <br>
    <table>
        <tr>
            <td class="td-width6"></td>
            <td class="td-width5">Nama</td>
            <td class="">:</td>
            <td class="td-width4"><?= $list_abdimas['mitra_nama'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="td-width5">Jabatan</td>
            <td class="">:</td>
            <td class="td-width4"><?= $list_abdimas['mitra_jabatan'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="td-width5">Instansi/badan/komunitas</td>
            <td class="">:</td>
            <td class="td-width4"><?= $list_abdimas['mitra_instansi'] ?></td>
        </tr>
    </table><br>
    Menyatakan konfirmasi kami sebagai mitra kegiatan Pengabdian Masyarakat :
    <table>
        <tr>
            <td class="td-width6"></td>
            <td class="td-width5">Judul</td>
            <td class="">:</td>
            <td class="td-width4"><?= $list_abdimas['judul_abdimas'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="td-width5">Masyarakat sasar</td>
            <td class="">:</td>
            <td class="td-width4"><?= $list_abdimas['mitra_sasar'] ?></td>
        </tr>
    </table><br>
    Demikian surat ini kami buat untuk dipergunakan sebagaimana mestinya. 



    <br><br><br><br>
    Bandung, <?= tgl_indo(date('Y-m-d')) ?>
    <br>
    <?= $list_abdimas['mitra_jabatan'] ?>
    <br><br><br><br><br><br>
    <?= $list_abdimas['mitra_nama'] ?>


</body>
</html>