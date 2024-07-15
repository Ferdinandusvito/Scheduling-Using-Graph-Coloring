<div class="modal fade" id="modalDataMitra" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Data Mitra</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="" class="form-hosrizontal" method="post">
                <div class="form-group">
                    <label>
                        Mitra (Instansi/Badan/Komunitas)
                    </label>
                    <div>
                        <input type="text" name="mitra_instansi" class="form-control" value="<?= $detail_abdimas['mitra_instansi'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        Masyarakat Sasar
                    </label>
                    <div>
                        <input type="text" name="mitra_sasar" class="form-control" value="<?= $detail_abdimas['mitra_sasar'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        Nama
                    </label>
                    <div>
                        <input type="text" name="mitra_nama" class="form-control" value="<?= $detail_abdimas['mitra_nama'] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label>
                        Jabatan
                    </label>
                    <div>
                        <input type="text" name="mitra_jabatan" class="form-control" value="<?= $detail_abdimas['mitra_jabatan'] ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="simpanDataMitra" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>