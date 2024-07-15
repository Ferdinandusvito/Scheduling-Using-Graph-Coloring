<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Peminjaman</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('lab/exportExcel') ?>" method="post">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for=""><b>Lab</b></label>
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
                                        <option value="<?= $load_status['id_pinjam'] ?>"><?= $load_status['nama_pinjam'] ?></option>
                                        <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            
                            <
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