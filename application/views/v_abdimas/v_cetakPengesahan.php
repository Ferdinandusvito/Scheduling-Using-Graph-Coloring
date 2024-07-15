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
    <p class="judul-cetak">LEMBAR PENGESAHAN PROPOSAL PENGABDIAN MASYARAKAT </p><br><br>
    <table class="table-custom" border>
        <tr>
            <td class="td-width2">1.</td>
            <td class="td-width3">Judul</td>
            <td class="td-width4"><?= $list_abdimas['judul_abdimas'] ?></td>
        </tr>
        <tr>
            <td class="td-width2">2.</td>
            <td class="td-width3">Skema</td>
            <td class="td-width4"><?= $list_abdimas['skema'] ?></td>
        </tr>
        <tr>
            <td class="td-width2">3.</td>
            <td class="td-width3">Kelompok Keahlian</td>
            <td class="td-width4">Rekayasa Komputer</td>
        </tr>
        <tr>
            <td class="td-width2">4.</td>
            <td>Ketua/Koordinator Kelompok</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>- Nama</td>
            <td><?= $list_abdimas['nama_awal'] ?> <?= $list_abdimas['nama_akhir'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td>- NIP/NIDN</td>
            <td><?= $list_abdimas['nip'] ?> / <?= $list_abdimas['nidn'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td>- Jabatan Fungsional</td>
            <td><?= $list_abdimas['jab_fungsional'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td>- Fakultas & Prodi</td>
            <td>Fakultas Teknik Elektro / Teknik Komputer</td>
        </tr>
        <tr>
            <td></td>
            <td>- Bidang Keahlian</td>
            <td><?= $list_abdimas['bidang'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td>- Telepon</td>
            <td><?= $list_abdimas['telp'] ?></td>
        </tr>
        <tr>
            <td></td>
            <td>- Email</td>
            <td><?= $list_abdimas['email'] ?></td>
        </tr>
        <tr>
            <td class="td-width2">5.</td>
            <td>Periode/Waktu Kegiatan</td>
            <td><?= tgl_indo($list_abdimas['tgl_mulai']) ?> - <?= tgl_indo($list_abdimas['tgl_selesai']) ?></td>
        </tr>
        <tr>
            <td class="td-width2">6.</td>
            <td>Usulan/Realisasi Anggaran</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>a. Dana Internal</td>
            <td>Rp. <?= number_format($list_abdimas['dana_internal']) ?>,-</td>
        </tr>
        <tr>
            <td></td>
            <td>b. Sumber Dana Lain Institusi</td>
            <td>Rp. <?= number_format($list_abdimas['dana_luar']) ?>,-</td>
        </tr>
        <tr>
            <td class="td-width2">7.</td>
            <td>Ketua Tim & Fakultas</td>
            <td>1. <?= $list_abdimas['nama_awal'] ?> <?= $list_abdimas['nama_akhir'] ?> / Fakultas Teknik Elektro</td>
        </tr>
    </table>
    <table class="table-ttd">
        <tr>
            <td class="td-ttd-width"></td>
            <td class="td-ttd-width"></td>
            <td class="td-ttd-width">
                <center>
                    Bandung, <?= tgl_indo(date('Y-m-d')) ?><br><br>
                    Mengetahui,
                </center>
            </td>
        </tr>
        <tr>
            <td>
                <center>
                    Ketua/Koordinator Kelompok,
                    <br><br><br><br><br><br>
                    <b><u><?= $list_abdimas['nama_awal'] ?> <?= $list_abdimas['nama_akhir'] ?></u></b>  <br>
                    NIP. <?= $list_abdimas['nip'] ?>
                </center>
            </td>
            <td></td>
            <td>
                <center>
                    Direktur Penelitian dan Pengabdian Masyarakat
                    <br><br><br><br><br><br>
                    <b><u><?= $dataPPM['nama_awal'] ?></u></b>  <br>
                    NIP. <?= $dataPPM['nip'] ?>
                </center>
            </td>
        </tr>
    </table>
</body>
</html>