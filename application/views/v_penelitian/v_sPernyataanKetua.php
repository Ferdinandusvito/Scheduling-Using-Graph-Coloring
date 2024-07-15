<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $detailPenelitian['nip'] ?> | Surat Pernyataan Ketua</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <script src="main.js"></script>
</head>
<body onload="window.print()" id="lembar-pengesahan">
    <p class="judul-cetak">
        SURAT PERNYATAAN KETUA PENELITI
    </p>
    <br><br><br>
    Yang bertanda tangan di bawah ini: <br>
    <table>
        <tr>
            <td class="td-width6"></td>
            <td class="td-width5">Nama</td>
            <td class="">:</td>
            <td class="td-width4"><?= $detailPenelitian['nama_awal'] ?> <?= $detailPenelitian['nama_akhir'] ?></td>
        </tr>
        <tr>
            <td class="td-width6"></td>
            <td class="td-width5">NIP/NIDN</td>
            <td class="">:</td>
            <td class="td-width4"><?= $detailPenelitian['nip'] ?> / <?= $detailPenelitian['nidn'] ?></td>
        </tr>
        <tr>
            <td class="td-width6"></td>
            <td class="td-width5">Pangkat/Golongan</td>
            <td class="">:</td>
            <td class="td-width4"><?= $detailPenelitian['jab_pangkat'] ?> / <?= $detailPenelitian['jab_golongan'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="td-width5">Jabatan Fungsional</td>
            <td class="">:</td>
            <td class="td-width4"><?= $detailPenelitian['jab_fungsional'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td class="td-width5">Alamat</td>
            <td class="">:</td>
            <td class="td-width4"><?= $detailPenelitian['alamat'] ?></td>
        </tr>
    </table><br>
    Dengan ini menyatakan bahwa proposal <?= $detailPenelitian['skema'] ?> saya dengan judul <br>
    <?= $detailPenelitian['judul_penelitian'] ?><br>
    yang diusulkan dalam skema <?= $detailPenelitian['skema'] ?> untuk tahun anggaran <?= $detailPenelitian['thn_anggaran'] ?> bersifat original dan belum
    pernah dibiayai oleh lembaga/sumber dana lain. Apabila terbukti tidak original atau dibiayai oleh lembaga/sumber dana lain, 
    maka saya siap diproses sesuai dengan ketentuan yang berlaku dan mengembalikan seluruh biaya yang sudah diterima ke
    institusi terkait.<br><br>
    Demikian pernyataan ini dibuat dengan sesungguhnya dan dengan sebenar-benarnya.



    <br><br>
    <table class="table-ttd">
        <tr>
            <td class="td-ttd-width"></td>
            <td class="td-ttd-width"></td>
            <td class="td-ttd-width">
                <center>
                    Bandung, <?= tgl_indo(date('Y-m-d')) ?><br><br>
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    Direktur PPM,
                    <br><br><br><br><br><br>
                    <b><u><?= $dataPPM['nama_awal'] ?></u></b>  <br>
                    NIP. <?= $dataPPM['nip'] ?>
                </center>
            </td>
            <td></td>
            <td>
                <center>
                    Ketua Peneliti
                    <br><br><br><br><br><br>
                    <b><u><?= $detailPenelitian['nama_awal'] ?> <?= $detailPenelitian['nama_akhir'] ?></u></b>  <br>
                    NIP. <?= $detailPenelitian['nip'] ?>
                </center>
            </td>
        </tr>
    </table>


</body>
</html>