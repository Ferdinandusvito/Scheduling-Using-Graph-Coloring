<!DOCTYPE html>
<html lang="en">

  <head>
    <title>TA Mahasiswa - Dashboard</title>
    <?php $this->load->view("_partials/header.php") ?>
  </head>

  <body id="page-top">
    <?php $this->load->view("_partials/navbar.php", $this->data) ?>

    <div id="wrapper">

      <!-- Sidebar -->
      <?php $this->load->view("_partials/sidebar.php") ?>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Daftar Judul Siap Sidang
            </div>
            <div class="card card-default">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th class="text-center align-middle" rowspan="2">NO</th>
                    <th class="text-center align-middle" rowspan="2">TOPIK</th>
                    <th class="text-center" colspan="2">PEMBIMBING</th>
                    <th class="text-center align-middle" rowspan="2">NAMA</th>
                    <th class="text-center align-middle" rowspan="2">JUDUL</th>
                    <th class="text-center align-middle" width="125" rowspan="2">TANGGAL</th>
                    <th class="text-center align-middle" rowspan="2">ACTION</th>
                                  </tr>
                                  <tr>
                    <td class="text-center">1</td>
                    <td class="text-center">2</td>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    // var_dump($data_real);exit;
                    // $count = array_count_values($data_real);
                    
                    foreach($data_list_group as $row){ 
                        $count_rows = count($data_list[$row['idta']]);
                      // var_dump($count_rows);exit;
                      ?>
                    <tr>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $no ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['topik'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['pbb1'] ?></td>
                    <td class="text-center align-middle" rowspan="<?= $count_rows ?>"><?= $row['pbb2'] ?></td>

                  <?php
                    foreach ($data_list[$row['idta']] as $key => $value) {
                      ?>
                      <td class="align-middle"><?= $value['nama_awal']  ?></td>
                      <td class="align-middle"><?= $value['judul'] ?></td>
                      <td class="align-middle text-center"><?= $value['tanggal_sidang'] ?></td> 
                      <?php if ($key == 0): ?>
                        <td class="text-center align-middle" rowspan="<?= $count_rows ?>">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" value="<?= $row['idta']?>"id="<?= $row['idta']?>" name="idta"></input>
                            <label class="custom-control-label " for="<?= $row['idta']?>"></label>
                          </div>

                        </td>
                      <?php endif ?>
                      </tr>                      
                  <?php
                    }

                  ?>
                  <?php $no++; } ?>
                </tbody>
              </table>
              <div class="col-md-12">
                  <button type="button" class="btn btn-info" onclick="generate()">Generate</button>
                </div>
              </div>
            </div>
            <!--div class="card-footer small text-muted">Updated yesterday at 11:59 PM </div-->
        </div>

<br><br>

        <div class="card card-default">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-poll"></i>
              Evolution Algorithm
            </div>
            <div class="card-body">
              
              <div class="row">
                
                <div class="col-md-4">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="resultEvo" width="100%" cellspacing="0">
                    </table>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="resultDos" width="100%" cellspacing="0">
                    </table>
                  </div>
                </div>
              </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          </div>
          <div class="float-md-right">
           
          </div>
        </div>
      </div>
      <br><br>
      <div class="card card-default">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-poll"></i>
              Schedule Results
            </div>
            <div class="card-body">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="jadwalRes" width="100%" cellspacing="0">
                    </table>
                    <form id="form-data" name="form-data" action="<?php echo base_url('Penjadwalan/insertDataScheduled')?>" method="POST" hidden="true">
                      <input type="" name="ss[]">

                    </form>
                  </div>
                </div>
                <div class="col-md-12">
                  <button type="button" class="btn btn-info" id="setButton" onclick="setScheduledClick()"> Set Schedule </button disabled="true">
                </div>
              </div>
            <div class="card-footer small text-muted" id="printStatus">Updated yesterday at 11:59:59 PM</div>
          </div>
          <div class="float-md-right">
           
          </div>
        </div>
      </div>
        <!-- /.container-fluid -->
</div>
        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>
      <!-- /.content-wrapper -->
    
  </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="<?php echo base_url() ?>index.php/mahasiswa/logout"   >Logout</a>
          </div>
        </div>
      </div>
    </div>
  <?php $this->load->view("_partials/js.php") ?>
  <script src="<?= base_url()?>assets/js/evolution/evolutionarry-algoritm.js">  </script>

  <script type="text/javascript">
    let mod = [];
    let selecteds= [];
    let dates = [];
    let dosen = [];
    let initInd = [];

    let problem = [];
    let probLess = [];

    let listPenguji = [];

    let calonPenguji;
    let dataListGroup = <?= json_encode($data_list_group) ?>;
    let dataList = <?= json_encode($data_list) ?>;
    let listRuangTA = <?= json_encode($listRuangTA) ?>;

    //console.log(allDataDosen);

    function generate(){
      dates = [];
      dosen = [];
      initInd = [];

      selecteds= [];
      calonPenguji = <?= json_encode($calon_penguji) ?>;
      $.each($("input[name='idta']:checked"), function(){
        selecteds.push($(this).val());
      });

      console.log("selecteds: ",selecteds);

      for (var i = 0; i < calonPenguji.length; i++) {
          var penguji = calonPenguji[i];

        if (!dates.includes(penguji.tanggal)) {
          dates.push(penguji.tanggal);
        }

        var detailDos = [];
          detailDos.push(penguji.nip);
          detailDos.push(penguji.kode_dosen);
          detailDos.push(penguji.id_bidang);
          detailDos.push(penguji.id_bidang2);
          detailDos.push(penguji.id_jabatan);

        if (!dosen.includes(detailDos)) {
          dosen.concat(detailDos);
        }

        initInd.push(parseInt(penguji.shift1));
        initInd.push(parseInt(penguji.shift2));
        initInd.push(parseInt(penguji.shift3));
        initInd.push(parseInt(penguji.shift4));

        
      }

      mod = initInd;

      //console.log(calonPenguji);
      /*if (selecteds.length != 0)
        mod = selecteds;*/

      //mod = <?= json_encode(array(1,0,1,1,1,1,0,0,0,0,1,1,1)) ?>;
      generateInit();
    }

    


    


  </script>
  <script src="<?= base_url()?>assets/js/evolution/simple-example.js"></script>
  </body>

</html>