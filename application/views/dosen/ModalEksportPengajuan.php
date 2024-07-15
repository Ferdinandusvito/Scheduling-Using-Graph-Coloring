<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Pengajuan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('pengajuan/exportExcels') ?>" method="post">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for=""><b>Laboratorium</b></label>
                                <select id="id_laboratorium" name="id_laboratorium" class="form-control">
                                    <option value="">- Semua -</option>
                                    <?php 
                                        foreach ($load_lab as $load_lab) { ?>
                                        <option value="<?= $load_lab['id_laboratorium'] ?>"><?= $load_lab['nama_laboratorium'] ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for=""><b>Status</b></label>
                                <select id="id_status" name="id_status" class="form-control">
                                    <option value="">- Semua -</option>
                                    <?php 
                                        foreach ($load_status as $load_status) { ?>
                                        <option value="<?= $load_status['id_status'] ?>"><?= $load_status['nama_status'] ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-5">
                                <label for=""><b>Cek</b></label>
                                <select id="id_kondisi" name="id_kondisi" class="form-control">
                                    <option value="">- Semua -</option>
                                    <?php 
                                        foreach ($load_cek as $load_cek) { ?>
                                        <option value="<?= $load_cek['id_cek'] ?>"><?= $load_cek['nama_cek'] ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=""><b>Tanggal Pembelian</b></label>
                                <select id="tanggal_pengajuan" name="tanggal_pengajuan" class="form-control">
                                    <option value="">- Semua -</option>
                                    <?php 
                                        foreach ($load_tanggal as $load_tanggal) { ?>
                                        <option value="<?= $load_tanggal['tanggal_pengajuan'] ?>"><?= $load_tanggal['tanggal_pengajuan'] ?></option>
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