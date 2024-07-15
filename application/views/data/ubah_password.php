<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ubah Data Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="<?= base_url('Pengaturan_controllers/ubahPassword') ?>" method="post">
            <div class="modal-body">
                <div class="form-group">
                    <label for="pass_old">Password Lama</label>
                    <!-- <?php 
                        if ($this->session->userdata('user_role') == 1) 
                        { ?>
                            <input type="hidden" name="id" value="<?= $dataDosen['nip'] ?>">
                            <input type="hidden" name="passLama" id="passLama" value="<?= $dataDosen['password'] ?>">
                            <input type="password" class="form-control" id="passLamaInput" name="passLama" >
                            <?php
                        }else 
                        { ?>
                            <input type="hidden" name="id" value="<?= $dataDosen['nip'] ?>">
                            <input type="hidden" name="passLama" id="passLama" value="<?= $dataDosen['password'] ?>">
                            <input type="password" class="form-control" id="passLamaInput" name="passLama">
                            <?php
                        }
                    ?> -->
                </div>
                <div class="form-group">
                    <label for="pass_new">Password Baru</label>
                    <input type="password" class="form-control" id="passBaru" name="passBaru">
                </div>
                <div class="form-group">
                    <label for="pass_new">Ulangi Password Baru</label>
                    <input type="password" class="form-control" id="passBaruConfirm" name="passBaruConfirm">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btn-simpan" class="btn btn-primary">Simpan</button>
            </div>
            </div>
        </form>
    </div>
</div>