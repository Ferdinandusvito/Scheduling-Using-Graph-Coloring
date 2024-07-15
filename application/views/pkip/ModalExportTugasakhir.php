<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pkip/exportExcel') ?>" method="post">
                <div class="modal-body">
                        <div class="form-row">

                            <div class="form-group col-md-3">
                                <label for=""><b>Kode Dosen</b></label>
                                <select id="" name="nip" class="form-control">
                                    <option value="">- Semua -</option>
                                    <?php 
                                        foreach ($load_dosen as $load_dosen) { ?>
                                        <option value="<?= $load_dosen['nip'] ?>"><?= $load_dosen['kode_dosen'] ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=""><b>Tahun</b></label>
                                <select name="tahun" id="tahun" class="form-control" reqiured>
                                <option value="">- Tahun Ajaran -</option>
                                <?php
                                $thn_skr = date('Y');
                                for ($x = $thn_skr + 2; $x >= 2018; $x--) {
                                ?>
                                <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                <?php
                                }
                                ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=""><b>Semester</b></label>
                                <select name="semester" id="semester" class="form-control" reqiured>
                                <option value="">- Semester -</option>
                                <option value="1">Ganjil</option>
                                <option value="2">Genap</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=""><b>Kelulusan</b></label>
                                <select name="id_status" id="id_status" class="form-control" reqiured>
                                <option value="">- Status -</option>
                                <option value="<?= $load_judulfilter['id_status']='51' ?>">Lulus Seminar</option>
                                <option value="<?= $load_judulfilter['id_status']='9' ?>">Belum Seminar</option>
                                <!-- <option value="<?= $load_topikfilter['idta']?>">Belum Diambil</option> -->
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Export</button>
                </div>
            </form>
        </div>
    </div>
</div>