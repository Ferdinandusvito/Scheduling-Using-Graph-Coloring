<div class="modal fade" id="modalTambahBidang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Ruangan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form action="<?= base_url('Pengaturan/simpanRuangan') ?>" class="form-horizontal" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>
                            Ruangan
                        </label>
                        <div>
                            <input type="text" name="ruangan" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Jam Mulai
                        </label>
                        <div>
                            <input type="time" name="jam_mulai" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>
                            Jam Selesai
                        </label>
                        <div>
                            <input type="time" name="jam_selesai" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>