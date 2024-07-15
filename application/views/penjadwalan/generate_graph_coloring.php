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
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-table"></i>
                            Generate Penjadwalan
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url('Penjadwalan_controllers/generate') ?>" method="post">
                                <div class="form-group">
                                    <label>Fakultas</label>
                                    <select class="form-control" name="fakultas" id="fakultas" onchange="update_jurusan()">
                                        <?php foreach ($fakultas_list as $fj) : ?>
                                            <option <?= (isset($id_fakultas) && $id_fakultas == $fj['id_fakultas']) ? 'selected' : '' ?> value="<?= $fj['id_fakultas'] ?>"><?= $fj['nama_fakultas'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label>Jurusan</label>
                                    <select class="form-control" name="jurusan" id="jurusan">

                                    </select>
                                </div>
                                <button type="submit">Generate</button>
                            </form>
                        </div>
                    </div>
                    <?php if ($all_mengajar != null) : ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-table"></i>
                                Hasil Generate Jadwal
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover dataTable no-footer" id="table-data">
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="<?= base_url() ?>assets/js/coloring-graph/coloring-graph.js"></script>
<script>
    update_jurusan();

    let edges = <?= json_encode($edges) ?>;
    let vertex_list = <?= json_encode($vertex_list) ?>;

    let ruangan_fakultas = <?= json_encode($ruangan_fakultas) ?>;
    let all_mengajar = <?= json_encode($all_mengajar) ?>;

    let groups = [];
    let ruangan_list = [];
    let jumlah_ruangan = 0;

    let schedule_data = [];

    if (all_mengajar != null) {
        getScheduleList();
    }

    function update_jurusan() {
        let fakultas_jurusan = <?= json_encode($fakultas_jurusan) ?>;

        let fakultas_id = document.getElementById('fakultas').value;
        let jurusan_el = document.getElementById('jurusan');

        let jurusan_id_prev = <?= json_encode($id_jurusan)  ?>;

        html = '';
        for (let i = 0; i < fakultas_jurusan.length; i++) {
            if (fakultas_jurusan[i]['id_fakultas'] == fakultas_id) {
                selected = ''
                if (jurusan_id_prev != null && fakultas_jurusan[i]['id_jurusan'] == jurusan_id_prev) {
                    selected = 'selected';
                }
                html +=
                    '<option ' + selected + ' value="' + fakultas_jurusan[i]['id_jurusan'] + '">' + fakultas_jurusan[i]['nama_jurusan'] + '</option>'
            }

        }

        jurusan_el.innerHTML = html;
    }

    function coloring_graph() {

        groups = [];
        let g1 = new Graph(vertex_list.length)
        for (let index = 0; index < edges.length; index++) {
            g1.addEdge(edges[index][0], edges[index][1]);
        }
        groups = g1.greedyColoring();
    }

    function getRuanganList() {
        jumlah_ruangan = groups.filter((item, i, ar) => ar.indexOf(item) === i);

        ruangan_list = [];
        for (let i = 0; i < groups.length; i++) {
            ruangan_list.push(ruangan_fakultas[groups[i]]);
        }
    }

    function fit_all_data() {
        // vertex_list, all_mengajar, ruangan_fakultas
        // kelas perlu ditambahkan !
        var days_str = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        var shifts = ['06.30', '07.30', '08.30', '09.30', '10.30', '11.30', '12.30', '13.30', '14.30', '15.30', '16.30', '17.30', '18.30'];

        schedule_data = [];
        for (let i = 0; i < vertex_list.length; i++) {
            var row_data = {
                hari: days_str[parseInt(vertex_list[i].id_hari) - 1],
                shift: shifts[vertex_list[i].shift - 1],
                dosen: all_mengajar[vertex_list[i].id_mengajar].kode_dosen,
                matkul: all_mengajar[vertex_list[i].id_mengajar].nama_matkul,
                ruangan: ruangan_list[i].nama_ruangan
            }

            schedule_data.push(row_data);
        }
    }

    function drawTable() {
        table = document.getElementById('table-data');
        html = '';

        html += '<thead>'
        html += '<th>Hari</th>'
        html += '<th>Jam</th>'
        html += '<th>Kode Dosen</th>'
        html += '<th>Mata Kuliah</th>'
        html += '<th>Ruangan</th>'
        html += '</thead>'
        
        for (let i = 0; i < schedule_data.length; i++) {
            html += '<tr>'
            html += '<td>' + schedule_data[i].hari + '</td>';
            html += '<td>' + schedule_data[i].shift + '</td>';
            html += '<td>' + schedule_data[i].dosen + '</td>';
            html += '<td>' + schedule_data[i].matkul + '</td>';
            html += '<td>' + schedule_data[i].ruangan + '</td>';
            html += '</tr>'
        }
        table.innerHTML = html;
    }

    function getScheduleList() {
        coloring_graph();
        getRuanganList();
        fit_all_data();
        drawTable();
    }
</script>

</html>