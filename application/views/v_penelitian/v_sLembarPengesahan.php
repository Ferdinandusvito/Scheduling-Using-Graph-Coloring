<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $detailPenelitian['nip'] ?> | Lembar Pengesahan Proposal</title>
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/img/logo_sk.png') ?>"/>
    <script src="main.js"></script>
</head>

<?php 
    if ($detailPenelitian['id_skema'] == 7) { ?>
        <!-- <body id="lembar-pengesahan"> -->
        <body onload="window.print()" id="lembar-pengesahan">
            <p class="judul-cetak">LEMBAR PENGESAHAN PROPOSAL PENELITIAN </p><br><br>
            <table class="">
                <tr>
                    <td class="td-width3"><b>Judul Penelitian</b></td>
                    <td class="td-width4">: <?= $detailPenelitian['judul_penelitian'] ?></td>
                </tr>
                <tr>
                    <td><b>Kode/Nama Rumpun Ilmu</b></td>
                    <td>: Rekayasa Komputer</td>
                </tr>
                <tr>
                    <td><b>Bidang Unggulan</b></td>
                    <td>: <?= $detailPenelitian['bidang_unggulan'] ?></td>
                </tr>
                <tr>
                    <td><b>Topik Unggulan</b></td>
                    <td>: <?= $detailPenelitian['topik_unggulan'] ?></td>
                </tr>
                <tr>
                    <td><b>Ketua Peneliti</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td>a. Nama Lengkap</td>
                    <td>: <?= $detailPenelitian['nama_awal'] ?> <?= $detailPenelitian['nama_akhir'] ?></td>
                </tr>
                <tr>
                    <td>b. NIP/NIDN </td>
                    <td>: <?= $detailPenelitian['nip'] ?> / <?= $detailPenelitian['nidn'] ?></td>
                </tr>
                <tr>
                    <td>c. Jabatan Fungsional </td>
                    <td>: <?= $detailPenelitian['jab_fungsional'] ?></td>
                </tr>
                <tr>
                    <td>d. Program Studi </td>
                    <td>: Sistem Komputer</td>
                </tr>
                <tr>
                    <td>e. Nomor HP </td>
                    <td>: <?= $detailPenelitian['telp'] ?></td>
                </tr>
                <tr>
                    <td>f.  Alamat surel (e-mail)  </td>
                    <td>: <?= $detailPenelitian['email'] ?></td>
                </tr>
                <?php 
                    $no = 1 ;
                    foreach ($dataAnggotaDsn as $dataAnggotaDsn) { ?>
                        <tr>
                            <td><b>Anggota Peneliti (<?= $no ?>)</b></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>a.  Nama Lengkap </td>
                            <td>: <?= $dataAnggotaDsn['nama_awal'] ?> <?= $dataAnggotaDsn['nama_akhir'] ?></td>
                        </tr>
                        <tr>
                            <td>b.  NIP / NIDN </td>
                            <td>: <?= $dataAnggotaDsn['nip'] ?> / <?= $dataAnggotaDsn['nidn'] ?></td>
                        </tr>
                        <tr>
                            <td>c.  Program Studi </td>
                            <td>: Teknik Komputer</td>
                        </tr>
                        <?php
                        $no++;
                    }
                ?>
                <tr>
                    <td><b>Durasi Penelitian</b></td>
                    <td>: <?= tgl_indo($detailPenelitian['jadwal_awal']) ?> - <?= tgl_indo($detailPenelitian['jadwal_akhir']) ?></td>
                </tr>
                <tr>
                    <td><b>Biaya Keseluruhan</b></td>
                    <td>: </td>
                </tr>
                <tr>
                    <td>Universitas Telkom</td>
                    <td>: Rp. <?= number_format($detailPenelitian['dana_internal']) ?>,-</td>
                </tr>
                <tr>
                    <td>Dana Institusi Lain</td>
                    <td>: Rp. <?= number_format($detailPenelitian['dana_luar']) ?>,-</td>
                </tr>
            </table>
            <table class="table-ttd">
                <tr>
                    <td class="td-ttd-width"></td>
                    <td class="td-ttd-width">
                        <center>
                            Bandung, <?= tgl_indo(date('Y-m-d')) ?><br><br>
                        </center>
                    </td>
                    <td class="td-ttd-width"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <center>
                            Ketua Peneliti,
                            <br><br><br><br><br><br>
                            <b><u><?= $detailPenelitian['nama_awal'] ?> <?= $detailPenelitian['nama_akhir'] ?></u></b>  <br>
                            NIP. <?= $detailPenelitian['nip'] ?>
                        </center><br><br><br><br>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <center>
                            Ketua Kelompok Keilmuan,
                            <br><br><br><br><br><br>
                            <b><u><?php echo $dataKetuakk['nama_awal'].' '.$dataKetuakk['nama_akhir'] ?></u></b>  <br>
                            NIP. <?= $dataKetuakk['nip'] ?>
                        </center>
                    </td>
                    <td></td>
                    <td>
                        <center>
                            Dekan Fakultas Teknik Elektro,
                            <br><br><br><br><br><br>
                            <b><u><?= $dataDekan['nama_awal'] ?></u></b>  <br>
                            NIP. <?= $dataDekan['nip'] ?>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br><br><br><br>
                        <center>
                            Direktur Penelitian dan Pengabdian Masyarakat
                            <br><br><br><br><br><br>
                            <b><u><?= $dataPPM['nama_awal'] ?></u></b>  <br>
                            NIP. <?= $dataPPM['nip'] ?>
                        </center>
                    </td>
                    <td></td>
                </tr>
                
                        
            </table>
        </body>
        <?php
    }else { ?>
        <!-- <body id="lembar-pengesahan"> -->
        <body onload="window.print()" id="lembar-pengesahan">
            <p class="judul-cetak">LEMBAR PENGESAHAN PROPOSAL PENELITIAN </p><br><br>
            <table class="table-custom" border>
                <tr>
                    <td class="td-width2">1.</td>
                    <td class="td-width3">Judul Penelitian</td>
                    <td class="td-width4"><?= $detailPenelitian['judul_penelitian'] ?></td>
                </tr>
                <tr>
                    <td class="td-width2">2.</td>
                    <td>Ketua Peneliti / Pengusul</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td>- Nama</td>
                    <td><?= $detailPenelitian['nama_awal'] ?> <?= $detailPenelitian['nama_akhir'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>- Telp / Email</td>
                    <td><?= $detailPenelitian['nip'] ?> / <?= $detailPenelitian['nidn'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>- Jabatan Fungsional / Struktural</td>
                    <td><?= $detailPenelitian['jab_fungsional'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>- Bidang Keahlian</td>
                    <td><?= $detailPenelitian['bidang'] ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>- Jurusan / Fakultas</td>
                    <td>Teknik Komputer / Fakultas Teknik Elektro</td>
                </tr>
                <?php 
                    if ($detailPenelitian['id_skema'] == 1 || $detailPenelitian['id_skema'] == 2 || $detailPenelitian['id_skema'] == 3) { ?>
                        <tr>
                            <td class="td-width2">3.</td>
                            <td>Ketua Tim Mitra</td>
                            <td><?= $detailPenelitian['mitra_ketua'] ?></td>
                        </tr>
                        <tr>
                            <td class="td-width2">4.</td>
                            <td>Institusi Mitra</td>
                            <td><?= $detailPenelitian['mitra_institusi'] ?></td>
                        </tr>
                        <?php
                    }
                ?>
                <tr>
                    <td class="td-width2">5.</td>
                    <td>Anggota Peneliti</td>
                    <td>
                        <?php 
                            $no = 1;
                            foreach ($dataAnggotaDsn as $row) {
                                echo $no.'. '.$row['nama_awal'].' '.$row['nama_akhir'].'<br>';
                                $no++;
                            }
                        ?>
                    </td>
                </tr>
                <?php 
                    if ($detailPenelitian['id_skema'] == 6) { ?>
                        <tr>
                            <td class="td-width2">5.</td>
                            <td>Anggota Peneliti</td>
                            <td>
                                <?php 
                                    $no = 1;
                                    foreach ($dataAnggotaMhs as $row1) {
                                        echo $no.'. '.$row1['nama_awal'].' '.$row1['nama_akhir'].'<br>';
                                        $no++;
                                    }
                                ?>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
                <tr>
                    <td class="td-width2">6.</td>
                    <td>Jadwal</td>
                    <td><?= tgl_indo($detailPenelitian['jadwal_awal']) ?> - <?= tgl_indo($detailPenelitian['jadwal_akhir']) ?></td>
                </tr>
                <tr>
                    <td class="td-width2">7.</td>
                    <td>Rencana Luaran</td>
                    <td>
                        <?php 
                            if ($detailPenelitian['id_skema'] == 1) {
                                $this->load->view('v_penelitian/v_luaran/v_luaranInternasional');
                            }elseif ($detailPenelitian['id_skema'] == 2) {
                                $this->load->view('v_penelitian/v_luaran/v_luaranInstitusi');
                            }elseif ($detailPenelitian['id_skema'] == 3) {
                                $this->load->view('v_penelitian/v_luaran/v_luaranPekertiYPT');
                            }elseif ($detailPenelitian['id_skema'] == 4) {
                                $this->load->view('v_penelitian/v_luaran/v_luaranDasarTerapan');
                            }elseif ($detailPenelitian['id_skema'] == 5) {
                                $this->load->view('v_penelitian/v_luaran/v_luaranDanaMandiri');
                            }elseif ($detailPenelitian['id_skema'] == 6) {
                                $this->load->view('v_penelitian/v_luaran/v_luaranHilirisasi');
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td class="td-width2">8. </td>
                    <td>Sumber Pebiayaan</td>
                    <td>
                        <?php 
                            if ($detailPenelitian['id_skema'] == 1 || $detailPenelitian['id_skema'] == 2 || $detailPenelitian['id_skema'] == 3) { ?>
                                1. Universitas Telkom : Rp. <?= number_format($detailPenelitian['dana_internal']) ?>,- <br>
                                2. Mitra : Rp. <?= number_format($detailPenelitian['dana_luar']) ?>,-
                                <?php
                            }elseif ($detailPenelitian['id_skema'] == 4 || $detailPenelitian['id_skema'] == 5 || $detailPenelitian['id_skema'] == 6) { ?>
                                Rp. <?= number_format($detailPenelitian['dana_luar']) ?>,-
                                <?php
                            }elseif ($detailPenelitian['id_skema'] == 7) {
                                # code...
                            }
                        ?>
                    </td>
                </tr>
            </table>
            <table class="table-ttd">
                <tr>
                    <td class="td-ttd-width"></td>
                    <td class="td-ttd-width">
                        <center>
                            Bandung, <?= tgl_indo(date('Y-m-d')) ?><br><br>
                        </center>
                    </td>
                    <td class="td-ttd-width"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <center>
                            Ketua Peneliti,
                            <br><br><br><br><br><br>
                            <b><u><?= $detailPenelitian['nama_awal'] ?> <?= $detailPenelitian['nama_akhir'] ?></u></b>  <br>
                            NIP. <?= $detailPenelitian['nip'] ?>
                        </center><br><br><br><br>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <center>
                            Ketua Kelompok Keilmuan,
                            <br><br><br><br><br><br>
                            <b><u><?php echo $dataKetuakk['nama_awal'].' '.$dataKetuakk['nama_akhir'] ?></u></b>  <br>
                            NIP. <?= $dataKetuakk['nip'] ?>
                        </center>
                    </td>
                    <td></td>
                    <td>
                        <center>
                            Dekan Fakultas Teknik Elektro,
                            <br><br><br><br><br><br>
                            <b><u><?= $dataDekan['nama_awal'] ?></u></b>  <br>
                            NIP. <?= $dataDekan['nip'] ?>
                        </center>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br><br><br><br>
                        <center>
                            Direktur Penelitian dan Pengabdian Masyarakat
                            <br><br><br><br><br><br>
                            <b><u><?= $dataPPM['nama_awal'] ?></u></b>  <br>
                            NIP. <?= $dataPPM['nip'] ?>
                        </center>
                    </td>
                    <td></td>
                </tr>
                
                        
            </table>
        </body>
        <?php
    }
?>


</html>