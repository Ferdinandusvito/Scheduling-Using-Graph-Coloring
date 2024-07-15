<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Abdimas_kk/exportExcel') ?>" method="post">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for=""><b>Skema Abdimas</b></label>
                                <select id="" name="id_skema" class="form-control">
                                    <option value="">- Semua -</option>
                                    <?php 
                                        foreach ($load_skema as $load_skema) { ?>
                                        <option value="<?= $load_skema['id_skema'] ?>"><?= $load_skema['skema'] ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-2">
                                <label for=""><b>Dosen</b></label>
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
                                <label for=""><b>Status</b></label>
                                <select id="" name="status" class="form-control">
                                    <option value="">- Semua -</option>
                                    <?php 
                                        foreach ($load_status as $load_status) { ?>
                                        <option value="<?= $load_status['id_status'] ?>"><?= $load_status['status'] ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=""><b>Tahun Anggaran</b></label>
                                <select name="thn_anggaran" id="thn_anggaran" class="form-control" reqiured>
                                    <option value="">- Semua -</option>
                                    <?php
                                    $thn_skr = date('Y');
                                    for ($x = $thn_skr + 2; $x >= 1980; $x--) {
                                    ?>
                                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                                    <?php
                                    }
                                    ?>
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