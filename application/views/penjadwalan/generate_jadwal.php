<?php
    $success = true;
    $a = 10;
    $b = 25;
    $c = 75;
    $d = 25;
    $num_kromosom = $a;
    $max_generation = $b;
    $crossover_rate = $c;
    $mutation_rate = $d;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tel - U CUSS | Generate Penjadwalan</title>
    <?php $this->load->view("_partials/header.php") ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/data_controllers/css/daleman.css') ?>">
</head>

<body id="page-top">
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/navbar.php") ?>
    <div class="datadata">
        <div id="wrapper">

            <!-- Sidebar -->
            <?php $this->load->view("_partials/sidebar.php") ?>
            <div id="content-wrapper">
                <div class="container-fluid">

                    <!-- DataTables Example -->
                    <div class="col-sm-6">
                        <div class="card-body">
                            <h5 class="card-title"><?= $my_profile['nama_depan'] . " " . $my_profile['nama_belakang'] ?>
                            </h5>
                            <!-- <p class="card-text"></p> -->
                        </div>
                    </div>
                    <br>

                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Generate Penjadwalan
                        </div>

                        <div class="col-sm-12">
                            <div class="card card-default">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <!-- <form action="<?= base_url('hitung/hitung') ?>" method="post"> -->
                                        <div class="form-group">
                                            <label>Jumlah Kromosom Dibangkitkan</label>
                                            <input class="form-control" type="text" id="num_kromosom"
                                                name="num_kromosom" value="<?=$num_kromosom?>" />
                                            <p class="help-block">Masukkan antara <?=$a?>-500</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Maksimal Generasi</label>
                                            <input class="form-control" type="text" id="max_generation"
                                                name="max_generation" value="<?=$max_generation?>" />
                                            <p class="help-block">Masukkan antara <?=$b?>-500</p>
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="debug"> Tampilkan Proses Algoritma
                                            </label>
                                        </div>
                                        <a class="btn btn-info" role="button" data-toggle="collapse"
                                            href="#collapseExample" aria-expanded="false"
                                            aria-controls="collapseExample">
                                            Opsi Lain
                                        </a>
                                        <div class="collapse" id="collapseExample">
                                            <hr />
                                            <div class="well">

                                            </div>
                                            <div class="form-group">
                                                <label>Crossover Rate</label>
                                                <input class="form-control" type="text" id="crossover_rate"
                                                    name="crossover_rate" value="<?=$crossover_rate?>" />
                                                <p class="help-block">Masukkan antara 1-100</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Mutation Rate</label>
                                                <input class="form-control" type="text" id="mutation_rate"
                                                    name="mutation_rate" value="<?=$mutation_rate?>" />
                                                <p class="help-block">Masukkan antara 1-100</p>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary">Generate Jadwal</button>
                                        <!--  </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Generate Result
                        </div>
                        <div class="col-sm-12">
                            <div class="card card-default">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"></h5>
                                        <div class="row">
                                            <div class="col-sm-4 text-center">
                                                <button class="btn btn-success">
                                                    Previous
                                                </button>
                                            </div>
                                            <div class="col-sm-4 text-center" id="label_mid_res">
                                                Result 1
                                            </div>
                                            <div class="col-sm-4 text-center">
                                                <button class="btn btn-success">
                                                    Next
                                                </button>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-md-12" id="table_result">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url()?>assets/js/evolution/evolutionarry-algoritm.js"> </script>
    <script>
    let data_preferensi_dosen;
    let data_class_requirement;
    let data_scheduled_class;
    let num_kromosom = parseInt(document.getElementById("num_kromosom").value);
    let max_generation = parseInt(document.getElementById("max_generation").value);
    let crossover_rate = parseFloat(document.getElementById("crossover_rate").value);
    let mutation_rate = parseFloat(document.getElementById("mutation_rate").value);

    let mod = [];
    let problem = [];
    let group_pref_per_matkul;
    let uncomplete_data_matkul;

    function generate() {
        group_pref_per_matkul = [];
        uncomplete_data_matkul = [];

        let initInd = [];
        data_preferensi_dosen = <?= json_encode($data_preferensi_dosen) ?>;
        data_class_requirement = <?= json_encode($data_class_requirement) ?>;
        data_scheduled_class = [];

        num_kromosom = parseInt(document.getElementById("num_kromosom").value);
        max_generation = parseInt(document.getElementById("max_generation").value);
        crossover_rate = parseFloat(document.getElementById("crossover_rate").value);
        mutation_rate = parseFloat(document.getElementById("mutation_rate").value);


        for (let idx = 0; idx < data_preferensi_dosen.length; idx++) {
            if (group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']] == undefined) {
                group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']] = [];
            }
            group_pref_per_matkul[data_preferensi_dosen[idx]['id_matkul']].push(data_preferensi_dosen[idx]);
        }

        console.log("group_pref_per_matkul", group_pref_per_matkul);
        console.log("data_preferensi_dosen", data_preferensi_dosen);
        console.log("data_class_requirement", data_class_requirement);

        for (let idx = 0; idx < data_class_requirement.length; idx++) {
            let cari_matkul = data_class_requirement[idx]["id_matkul"];

            // console.log("group_pref_per_matkul[cari_matkul]",group_pref_per_matkul[cari_matkul]);
            if (group_pref_per_matkul[cari_matkul] == undefined) {
                uncomplete_data_matkul.push(cari_matkul);
                // initInd.push(0);
            } else {
                initInd.push(parseInt(group_pref_per_matkul[cari_matkul][Math.floor(Math.random() *
                    group_pref_per_matkul[cari_matkul].length)]['no']));
                data_scheduled_class.push(data_class_requirement[idx]);
            }
        }
        console.log("data_scheduled_class", data_scheduled_class);
        console.log("initInd", initInd);
        mod = initInd;
        generateInit();
    }
    </script>
    <script src="<?= base_url()?>assets/js/evolution/evo_jadwal_matkul.js"></script>
</body>

</html>