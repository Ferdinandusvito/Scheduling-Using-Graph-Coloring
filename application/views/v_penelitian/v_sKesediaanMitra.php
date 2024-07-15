<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $detailPenelitian['nip'] ?> | Surat Kesediaan Mitra</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body onload="window.print()">
    <p class="judul-cetak">
        SURAT KESEDIAAN MITRA
    </p>
    <br><br>
    Dengan ini, kami menyatakan bersedia sebagai mitra untuk pelaksanaan <?= $detailPenelitian['skema'] ?>
    dengan judul: 
    <br>
    <?= $detailPenelitian['judul_penelitian'] ?><br>
    Yang dilaksanakan oleh Universitas Telkom, Kontribusi pendanaan (di luar <i>in kind</i>) yang 
    akan kami berikan dalam <?= $detailPenelitian['skema'] ?> ini sebesar Rp. <?= number_format($detailPenelitian['dana_luar']) ?>,-
    <br><br>
    Kesediaan ini kami buat dengan sebenarna untuk dapat digunakan seperlunya.


    <br><br>
    <table class="table-ttd">
        <tr>
            <td class="td-ttd-width"></td>
            <td class="td-ttd-width"></td>
            <td class="td-ttd-width">
                <br><br>
                <center>
                    Bandung, <?= tgl_indo(date('Y-m-d')) ?><br><br>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                
            </td>
            <td></td>
            <td>
                <center>
                    Ketua Peneliti
                    <br><br><br><br><br><br>
                    <b><u><?= $detailPenelitian['mitra_ketua'] ?></u></b>  <br>
                    NIP. <?= $detailPenelitian['nip'] ?>
                </center>
            </td>
        </tr>
    </table>


</body>
</html>