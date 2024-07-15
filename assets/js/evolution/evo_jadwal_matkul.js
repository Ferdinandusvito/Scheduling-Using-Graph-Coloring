//Fungsi untuk Persiapan Individu
function generateIndividual() {
    let model = mod;
    return model;
};

function getSumDayPerPref(idx){
    let sum = 0;
    for (let shift_idx = 1; shift_idx <= 13; shift_idx++) {
        var shift = "shift" + shift_idx;
        sum += parseInt(data_preferensi_dosen[idx][shift]);
    }
    return sum;
}

function getCountSamePref(indv, idx){
    let count = 0;
    for (let indv_idx = 0; indv_idx < indv.length; indv_idx++) {
        if(indv[indv_idx] == idx){
            count++;
        }
    }
    return count;
}

//Fungsi untuk Mencari Nilai Fitness 
function getFitness(indv) {
    // console.log("indv : ",indv);
    let unique = indv.filter((item, i, ar) => ar.indexOf(item) === i);
    // console.log("unique : ",unique);
    let err = 0;
    for (let index = 0; index < unique.length; index++) {
        let sum_pref = getSumDayPerPref(unique[index]);
        let count_pref = getCountSamePref(indv,unique[index]);
        if(sum_pref < count_pref){
            err++;
            addProb(unique[index]);
        }
    }

    // console.log("error : ",err);
    // console.log("fit_point", calculateErrorFitness(err));
    return calculateErrorFitness(err);
}

function calculateErrorFitness(score){
    return 1.0/(1.0+(score));
}

function sumArr(arr){
    var res = 0;
    for(var i = 0; i < arr.length; i++){
        res += arr[i];
    }
    return res;
}

function parseShiftData(schedule) {
    var shift = [];
    var data_shift = [];
    for (var x = 0; x < 13; x++) {
        shift.push("shift" + (x + 1));
    }

    for (var x = 0; x < shift.length; x++) {
        data_shift.push(schedule[shift[x]]);
    }
    return data_shift;
}

//Fungsi untuk Menambah suatu index ke array problem
function addProb(index) {
    if (!problem.includes(index)) {
        problem.push(index);
    }
}

//Fungsi untuk Menambah suatu index ke array dosen yg tidak ada jadwal dalam suatu shift
function addProbLess(index) {
    if (!probLess.includes(index)) {
        probLess.push(index);
    }
}

//Fungsi untuk Melakukan Proses Mutasi
function mutate(indv) {

    for (let idx = 0; idx < problem.length; idx++) {
        // let selectProblem = Math.floor(Math.random() * problem.length);
        let matkul = parseInt(data_preferensi_dosen[problem[idx]]['id_matkul']);
        let selectPref = Math.floor(Math.random() * group_pref_per_matkul[matkul].length);
        
        indv[problem[idx]] = parseInt(group_pref_per_matkul[matkul][selectPref]['no']);
    }
    


    // let shiftSelection = Math.floor(Math.random() * 4);

    // let selectProbLess = Math.floor(Math.random() * probLess.length);
    // let shiftSelectLess = Math.floor(Math.random() * 4);

    // let mutatedIndex = problem[selectProblem] + shiftSelection;
    // let mutatedIndexLess = probLess[selectProbLess] + shiftSelectLess;

    // indv[mutatedIndex] = 0;
    // indv[mutatedIndexLess] = 1;

    return indv;
}

//Pemanggilan Fungsi Utama
function generateInit() {
    // Create a toolbox
    var toolbox = new Toolbox();
    toolbox.genIndv = generateIndividual;
    toolbox.getFitness = getFitness;
    toolbox.goalFitness = Toolbox.fitnessMin;
    toolbox.mutate = mutate;

    // Create parameters
    var popSize = num_kromosom;
    var mutProb = mutation_rate;
    var generations = max_generation;

    // Create evolution algorithm and evolve individuals
    var gen = new EvolutionarryAlgorithm(toolbox, popSize, mutProb, Algorithms.crossBreed, true);

    var results = gen.evolve(generations);
    console.log("Result Evolution:", results);
    console.log("Problem:", problem);
    console.log("ProbLess:", probLess);
    console.log("result", results);
    generateResult(results);

}

//Fungsi untuk proses persilangan/perkawinan
function breedFunction(parent0, parent1) {
    let protoParent = Math.round(Math.random());
    let newborn = protoParent == 0 ? parent0.slice() : parent1.slice();

    for (var i = 0; i < 2; i++) {

        let probPoint = Math.floor(Math.random() * problem.length);
        let probLessPoint = Math.floor(Math.random() * probLess.length);

        let breedPoint = problem[probPoint] + Math.floor(Math.random() * 4);
        let breedPoint2 = probLess[probLessPoint] + Math.floor(Math.random() * 4);

        let tmp = newborn[breedPoint];
        newborn[breedPoint] = newborn[breedPoint2];
        newborn[breedPoint2] = tmp;

    }
    return newborn;
};

// function getPrefById(id_preferensi){
//     for (let idx = 0; idx < data_preferensi_dosen.length; idx++) {
//         const element = array[idx];
        
//     }
//     data_preferensi_dosen
// }

function get_shift_pref(idx_pref, last_shift){
    res = null;
    for (var x = last_shift+1 ; x < 13; x++) {
        
        var shift = data_preferensi_dosen[idx_pref]["shift" + (x + 1)]
        if(shift == "1"){
            return x;
        }
    }
    return res;
}


function generateResult(results, selected_pop=0){


    
    for (let idx = 0; idx < data_scheduled_class.length; idx++) {
        data_scheduled_class[idx]["pref"] = data_preferensi_dosen[results.population[selected_pop]["individual"][idx]];
    }
    // results.population.length

    console.log("data_scheduled_class",data_scheduled_class);



    // for (let idx_hari = 0; idx_hari < 6; idx_hari++) {
    //     for (let idx_shift = 0; idx_shift < 13; idx_shift++) {
    //         data_preferensi_dosen[results.population[]]
    //     }
        
    // }
}

function draw_table_result($data_result){
    str = ' <table class="table">';
    str += ' <thead>';
    str += '  <tr>';
    str += '     <th class="text-center" colspan="2">Waktu</th>';
    str += '     <th class="text-center align-middle" rowspan="2">Mata Kuliah</th>';
    str += '     <th class="text-center align-middle" rowspan="2">Dosen</th>';
    str += '     <th class="text-center align-middle" rowspan="2">Jurusan</th>';
    str += '     <th class="text-center align-middle" rowspan="2">Kelas</th>';
    str += '     <th class="text-center align-middle" rowspan="2">Ruangan</th>';
    str += '  </tr>';
    str += '  <tr>';
    str += '     <th class="text-center">Hari</th>';
    str += '     <th class="text-center">Jam</th>';
    str += '  </tr>';
    str += ' </thead>';
    str += ' <tbody>';
    for (let index = 0; index < array.length; index++) {
        const element = array[index];
        
    }
    str += ' </tbody>';
    str += '</table>';
}


//Fungsi untuk print Tabel Hasil individu Terbaik
function printResultEvo(individual) {
    resultEvo = document.getElementById('resultEvo');

    var html = "";

    html += '<tr>';
    html += '<th class="text-center" colspan="6"> List Data Jadwal Penguji </th>';
    html += '</tr>';
    html += '<tr>';
    html += '<th class="text-center align-middle" rowspan="2"> Tanggal </th>';
    html += '<th class="text-center align-middle" rowspan="2"> Kode Dosen </th>';
    html += '<th class="text-center" colspan="4"> Shift </th>';
    html += '</tr>';
    html += '<tr>';
    html += '<th class="text-center"> 1 </th>';
    html += '<th class="text-center"> 2 </th>';
    html += '<th class="text-center"> 3 </th>';
    html += '<th class="text-center"> 4 </th>';
    html += '</tr>';

    let countDate = 0;
    let idx = 0;

    for (var i = 0; i < calonPenguji.length; i++) {
        html += '<tr>';
        let size = getCountDate(calonPenguji[i].tanggal);

        if (countDate == 0) {
            html += '<th class="text-center align-middle" rowspan="' + size + '">'
                + calonPenguji[i].tanggal + '</th>';
            countDate = size;
        }

        html += '<td class="text-center">' + calonPenguji[i].kode_dosen + '</td>';

        for (var j = 0; j < 4; j++) {
            html += '<td class="text-center">' + individual[idx++] + ' </td>';
        }

        html += '</tr>';
        countDate--;
    }

    resultEvo.innerHTML = html;
}

//Fungsi untuk Menampilkan Dosen Memungkinkan menjadi Penguji
function printListDosen(individual) {
    resultDos = document.getElementById('resultDos');
    var html = "";
    html += '<tr>';
    html += '<th class="text-center" colspan="3"> Jadwal Penguji Per Shift </th>';
    html += '</tr>';
    html += '<tr>';
    html += '<th class="text-center align-middle"> Tanggal </th>';
    html += '<th class="text-center"> Shift </th>';
    html += '<th class="text-center"> Dosen Pilihan </th>';
    html += '</tr>';

    let countDate = 0;
    let idx = 0;

    for (var i = 0; i < dates.length; i++) {
        html += '<tr>';

        html += '<th class="text-center align-middle" rowspan="4">' + dates[i] + '</th>';

        for (var j = 0; j < 4; j++) {
            html += '<th class="text-center align-middle">' + (j + 1) + '</th>';

            let str = getDosenListText(dates[i], j, individual);

            html += '<td class="text-center align-middle">' + str + '</td>';
            html += "</tr>";
            html += "<tr>";

        }
    }

    resultDos.innerHTML = html;
}


//Fungsi untuk Mempersiapkan tampilan hasil akhir
function generateResult_(results) {

    //pilih individu fitnes terbaik
    var individual = results.population[0].individual;
    var finalFitness = results.population[0].fitness;
    var finalGeneration = results.generations;
    document.getElementById("printStatus").innerHTML = "Status : Fitness = " + finalFitness + "; Generation = " + finalGeneration;

    //ganti jadwal dengan yang baru
    updateJadwal(individual);

    let listJadwalDosen = [];
    for (var i = 0; i < dates.length; i++) {
        for (var j = 0; j < 4; j++) {
            listJadwalDosen.push(getListPerShift(dates[i], j, individual));
        }
    }

    console.log("calonPenguji: ", calonPenguji);
    console.log("listJadwalDosen: ", listJadwalDosen);

    //let listPenguji = [];
    listPenguji = getPenguji(listJadwalDosen);

    console.log("listPenguji: ", listPenguji);
    console.log("dataList: ", dataList);
    console.log("dataListGroup: ", dataListGroup);
    printJadwalResult(listPenguji);

    printResultEvo(individual);
    printListDosen(individual);
}

//Fungsi untuk Menampilkan Hasil Penjadwalan dalam bentuk Tabel
function printJadwalResult(listPenguji) {
    jadwalRes = document.getElementById('jadwalRes');

    var html = "";

    html += '<tr>';
    html += '<th class="text-center" colspan="12"> Hasil Jadwal Sidang </th>';
    html += '</tr>';
    html += '<tr>';
    html += '<th class="text-center align-middle" rowspan="2"> NO </th>';
    html += '<th class="text-center align-middle" rowspan="2"> NAMA </th>';
    html += '<th class="text-center align-middle" rowspan="2"> NIM </th>';
    html += '<th class="text-center align-middle" colspan="2"> PBB </th>';
    html += '<th class="text-center align-middle" colspan="3"> PENGUJI </th>';
    html += '<th class="text-center align-middle" rowspan="2"> TGL </th>';
    html += '<th class="text-center align-middle" width="100" rowspan="2"> WAKTU </th>';
    html += '<th class="text-center align-middle" rowspan="2"> TEMPAT </th>';
    html += '<th class="text-center align-middle" rowspan="2"> JUDUL </th>';
    html += '</tr>';
    html += '<tr>';
    html += '<th class="text-center align-middle"> 1 </th>';
    html += '<th class="text-center align-middle"> 2 </th>';
    html += '<th class="text-center align-middle"> 1 </th>';
    html += '<th class="text-center align-middle"> 2 </th>';
    html += '<th class="text-center align-middle"> 3 </th>';
    html += '</tr>';

    for (var i = 0; i < selecteds.length; i++) {

        var topik = selecteds[i];
        var dataSidang = dataList[topik];
        var size = dataSidang.length;

        var warning = '';

        var tglB = getTanggal(listPenguji[i][0].schedule);
        console.log(dataList[topik][0].tanggal_sidang, tglB);
        if (dataList[topik][0].tanggal_sidang != tglB) {
            warning = 'table-warning';
        }

        html += '<tr>';
        html += '<td class="text-center "' + warning + '" align-middle" rowspan="' + size + '"> ' + (i + 1) + ' </td>';

        var idxRuang = 1;

        for (var j = 0; j < size; j++) {
            var nama = dataSidang[j].nama_awal;
            var nim = dataSidang[j].nim;

            html += '<td class="text-center ' + warning + ' align-middle"> ' + nama + ' </td>';
            html += '<td class="text-center ' + warning + ' align-middle"> ' + nim + ' </td>';
            if (j == 0) {
                var pbb1 = dataListGroup[topik].pbb1;
                var pbb2 = dataListGroup[topik].pbb2;
                var p1 = listPenguji[i][0].p;
                var p2 = listPenguji[i][1].p;
                var p3 = "-";

                if (listPenguji[i].length == 3) {
                    p3 = listPenguji[i][2].p;
                }

                var tgl = getTanggal(listPenguji[i][0].schedule);
                var indexWaktu = getWaktu(listPenguji[i][0].schedule);
                var waktu = getWaktuStr(indexWaktu - 1);

                var indexRuang = getRuangan(listPenguji, i);
                var ruang = listRuangTA[indexRuang - 1].nama_ruangan;

                html += '<td class="text-center ' + warning + ' align-middle" rowspan="' + size + '"> ' + pbb1 + ' </td>';
                html += '<td class="text-center ' + warning + ' align-middle" rowspan="' + size + '"> ' + pbb2 + ' </td>';

                html += '<td class="text-center ' + warning + ' align-middle" rowspan="' + size + '"> ' + p1 + ' </td>';
                html += '<td class="text-center ' + warning + ' align-middle" rowspan="' + size + '"> ' + p2 + ' </td>';
                html += '<td class="text-center ' + warning + ' align-middle" rowspan="' + size + '"> ' + p3 + ' </td>';

                html += '<td class="text-center ' + warning + ' align-middle" rowspan="' + size + '"> ' + tgl + ' </td>';
                html += '<td class="text-center ' + warning + ' align-middle" rowspan="' + size + '"> ' + waktu + ' </td>';
                html += '<td class="text-center ' + warning + ' align-middle" rowspan="' + size + '"> ' + ruang + ' </td>';
            }

            html += '<td class="text-center ' + warning + ' align-middle"> ' + dataSidang[j].judul + ' </td>';
            html += '</tr>';
            html += '<tr>';
        }
        html += '</tr>';
    }
    jadwalRes.innerHTML = html;
}

//Fungsi untuk Menyimpan kedalam Database
function setScheduledClick() {
    var form = document.getElementById("form-data");
    var str = '';

    //var dataInsert = [];
    for (var i = 0; i < selecteds.length; i++) {
        //var dataSchedule = [];
        //var topik = selecteds[i];
        var p1 = getNip(listPenguji[i][0].p);
        var p2 = getNip(listPenguji[i][1].p);
        var p3 = 0;

        if (listPenguji[i].length == 3) {
            p3 = getNip(listPenguji[i][2].p);
        }

        var id_pekansidang = getIdPekanSidang(getTanggal(listPenguji[i][0].schedule));
        var indexWaktu = getWaktu(listPenguji[i][0].schedule);

        var indexRuang = getRuangan(listPenguji, i);

        str += '<input name="idta[]" value="' + selecteds[i] + '">';
        str += '<input name="id_pekansidang[]" value="' + id_pekansidang + '">';
        str += '<input name="id_ruangan[]" value="' + indexRuang + '">';
        str += '<input name="penguji1[]" value="' + p1 + '">';
        str += '<input name="penguji2[]" value="' + p2 + '">';
        str += '<input name="penguji3[]" value="' + p3 + '">';
        str += '<input name="shift[]" value="' + indexWaktu + '">';


    }

    form.innerHTML = str;
    var el = document.getElementsByName('form-data');
    el[0].submit();

}

//Fungsi untuk Mendapatkan NIP dari suatu Kode Dosen
function getNip(kode_dosen) {
    for (var i = 0; i < calonPenguji.length; i++) {
        if (calonPenguji[i].kode_dosen == kode_dosen) {
            return calonPenguji[i].nip;
        }
    }
}

//Fungsi untuk Mendapatkan Id Pekan Sidang dari Tanggal
function getIdPekanSidang(tgl) {
    for (var i = 0; i < calonPenguji.length; i++) {
        if (calonPenguji[i].tanggal == tgl) {
            return calonPenguji[i].id_pekansidang;
        }
    }
}

//Fungsi untuk Menentukan string waktu
function getWaktuStr(index) {
    var str = "";
    if (index == 0) {
        return "07.30 - 09.30"
    } else if (index == 1) {
        return "10.00 - 12.00"
    } else if (index == 2) {
        return "13.00 - 15.00"
    } else if (index == 3) {
        return "15.30 - 17.30"
    }
}

//Fungsi untuk menentukan ruangan
function getRuangan(listPenguji, index) {
    var r1 = [];
    var r2 = [];
    var r3 = [];
    var r4 = [];

    //var res = "Ruang-";
    var number = 0;

    for (var i = 0; i < listPenguji.length; i++) {
        var tgl = getTanggal(listPenguji[i][0].schedule);
        var waktu = getWaktu(listPenguji[i][0].schedule);
        var str = tgl + "_" + waktu;

        if (!r1.includes(str)) {
            r1.push(str);
            number = 1;
        } else if (!r2.includes(str)) {
            r2.push(str);
            number = 2;
        } else if (!r3.includes(str)) {
            r3.push(str);
            number = 3;
        } else if (!r4.includes(str)) {
            r4.push(str);
            number = 4;
        }

        if (index == i) {
            return number;
        }
    }
}

//Fungsi untuk menentukan tanggal dari index shift
function getTanggal(schedule) {
    var index = schedule.j;
    var point = Math.floor(index / 4);
    return dates[point];
}

//Fungsi untuk menentukan waktu dari index shift
function getWaktu(schedule) {
    var index = schedule.j;
    var shift = (index % 4) + 1;
    return shift;
}

//Fungsi untuk mendapatkan list penguji
function getPenguji(listJadwalDosen) {
    var res = [];
    var pUji = [];
    var scheduled = [];

    var listPenguji = [];

    for (var i = 0; i < selecteds.length; i++) {
        pUji = [];

        var penguji1 = getPenguji1(listJadwalDosen, selecteds[i], scheduled);
        if (!penguji1) {
            penguji1 = getPenguji2(listJadwalDosen, selecteds[i], scheduled, penguji1);
        }
        pUji.push(penguji1);
        console.log("scheduled : ", scheduled);
        //if(dataList[selecteds[i]].length == 1)continue;
        var penguji2 = getPenguji2(listJadwalDosen, selecteds[i], scheduled, penguji1);
        pUji.push(penguji2);

        if (dataList[selecteds[i]].length > 2) {
            pUji.push(getPenguji2(listJadwalDosen, selecteds[i], scheduled, penguji2));
        }

        listPenguji.push(getListPenguji(selecteds[i], scheduled, pUji));

    }

    return listPenguji;
}

//Fungsi untuk mendapatkan jabatan dari kode dosen
function getJabatanDosen(kode_dosen) {
    for (var i = 0; i < calonPenguji.length; i++) {
        if (kode_dosen == calonPenguji[i].kode_dosen) {
            return parseInt(calonPenguji[i].id_jabatan);
        }
    }
    return false;
}

function getListPenguji(idta, scheduled, pUji) {
    var list = [];

    var idxS = scheduled.length - pUji.length;
    for (var i = 0; i < pUji.length; i++) {
        data = {
            idta: idta,
            p: pUji[i],
            jab: getJabatanDosen(pUji[i]),
            schedule: scheduled[idxS + i]
        }
        list.push(data);
    }

    return list;
}

//Fungsi untuk melakukan pencarian Penguji 1
function getPenguji1(listJadwalDosen, idta, scheduled) {
    var res = [];
    var resData = [];
    var max = 0;
    for (var j = 0; j < listJadwalDosen.length; j++) {
        var listDosen = listJadwalDosen[j];
        for (var k = 0; k < listDosen.length; k++) {
            var size = listDosen.length - countScheduled(j, scheduled);
            if (dataList[idta].length > size) {
                break;
            }

            if (notScheduled(j, k, scheduled)) {
                var bidang = getBidangDosen(listDosen[k])[0];
                if (listDosen[k] != dataListGroup[idta].pbb1 &&
                    listDosen[k] != dataListGroup[idta].pbb2) {
                    if (bidang.includes(dataListGroup[idta].id_bidang)) {
                        var jabatan = getJabatanDosen(listDosen[k]);
                        if (jabatan > max) {
                            max = jabatan;
                        }
                        var data = {
                            j: j,
                            k: k
                        };
                        resData.push(data);
                        res.push(listDosen[k]);
                    }
                }
            }
        }
    }




    for (var i = 0; i < res.length; i++) {

        //pilih jabatan tertinggi
        var jabatan = getJabatanDosen(res[i]);
        if (jabatan == max) {
            setPbbScheduled(listJadwalDosen, dataListGroup[idta], resData[i], scheduled);
            scheduled.push(resData[i]);
            return res[i];
        }
    }

    return false;
}

//Fungsi untuk menambahkan pembimbing kedalam schedule
function setPbbScheduled(listJadwalDosen, listData, resData, scheduled) {
    var j = resData.j;
    var listDosen = listJadwalDosen[j];
    for (var k = 0; k < listDosen.length; k++) {
        if (listData.pbb1 == listDosen[k] ||
            listData.pbb2 == listDosen[k]) {
            var data = {
                j: j,
                k: k
            };
            scheduled.push(data);
        }
    }
}

//Fungsi untuk menentukan jika suatu dosen belum ter jadwal pada suatu shift
function notScheduled(j, k, scheduled) {
    for (var i = 0; i < scheduled.length; i++) {
        var schedule = scheduled[i];
        if (schedule.j == j && schedule.k == k) {
            return false;
        }
    }
    return true;
}

//Fungsi untuk menghitung jumlah dosen yang terjadwal pada suatu shift
function countScheduled(j, scheduled) {
    var count = 0;
    for (var i = 0; i < scheduled.length; i++) {
        var schedule = scheduled[i];
        if (schedule.j == j) {
            count++;
        }
    }
    return count;
}

//Fungsi untuk melakukan pencarian Penguji 2
function getPenguji2(listJadwalDosen, idta, scheduled, pengujiSebelum) {
    //if (typeof(scheduled[scheduled.length-1].j) === 'undefined')
    var j;
    if (scheduled == "") {
        var data = {
            j: 0,
            k: 0
        };
        scheduled.push(data);
        j = 0;
    } else {
        j = scheduled[scheduled.length - 1].j;
    }

    var listDosen = listJadwalDosen[j];
    for (var k = 0; k < listDosen.length; k++) {
        if (notScheduled(j, k, scheduled)) {
            var bidang = getBidangDosen(listDosen[k]);
            if (listDosen[k] != dataListGroup[idta].pbb1 &&
                listDosen[k] != dataListGroup[idta].pbb2) {
                var jabatanDosen = getJabatanDosen(listDosen[k]);
                var jabSebelum = getJabatanDosen(pengujiSebelum);

                if (bidang.includes(dataListGroup[idta].id_bidang) &&
                    (jabSebelum >= jabatanDosen)) {
                    var data = {
                        j: j,
                        k: k
                    };
                    scheduled.push(data);
                    return listDosen[k];
                }
            }
        }
    }
    //jika tidak ada yg sebidang
    for (var k = 0; k < listDosen.length; k++) {
        if (notScheduled(j, k, scheduled)) {
            var jabatanDosen = getJabatanDosen(listDosen[k]);
            var jabSebelum = getJabatanDosen(pengujiSebelum);
            if (jabSebelum >= jabatanDosen) {
                var data = {
                    j: j,
                    k: k
                };
                scheduled.push(data);
                return listDosen[k];
            }
        }

    }

}

function getBidangDosen(kode_dosen) {
    var bidang = [];
    for (var i = 0; i < calonPenguji.length; i++) {
        if (kode_dosen == calonPenguji[i].kode_dosen) {
            bidang.push(calonPenguji[i].id_bidang);
            bidang.push(calonPenguji[i].id_bidang2);
            return bidang;
        }
    }
    return bidang;
}

function updateJadwal(individual) {
    var idx = 0;
    for (var i = 0; i < calonPenguji.length; i++) {
        if (calonPenguji[i].shift1 == individual[idx] &&
            calonPenguji[i].shift2 == individual[idx + 1] &&
            calonPenguji[i].shift3 == individual[idx + 2] &&
            calonPenguji[i].shift4 == individual[idx + 3]) {
            //cek jadwal yg tdk berubah
            //console.log(calonPenguji[i]);
        }
        calonPenguji[i].shift1 = individual[idx++];
        calonPenguji[i].shift2 = individual[idx++];
        calonPenguji[i].shift3 = individual[idx++];
        calonPenguji[i].shift4 = individual[idx++];
    }
}

function getCountDate(strDate) {
    //calonPenguji
    let count = 0;
    for (var i = 0; i < calonPenguji.length; i++) {
        if (strDate == calonPenguji[i].tanggal) {
            count++;
        }
    }
    return count;
}

function getDosenListText(strDate, shift, individual) {
    let strRes = getListPerShift(strDate, shift, individual);
    return strRes;
}

function getListPerShift(strDate, shift, individual) {
    let list = [];
    let idx = 0;

    for (var i = 0; i < individual.length; i++) {
        var penguji = calonPenguji[idx];
        var shiftVal = 0;
        if (penguji.tanggal == strDate) {
            if (i % 4 == shift) {
                shiftVal = individual[i];
            }

            if (shiftVal == 1) {
                list.push(penguji.kode_dosen);
            }
        }

        if (i % 4 == 3) {
            idx++;
        }
    }
    return list;
}



