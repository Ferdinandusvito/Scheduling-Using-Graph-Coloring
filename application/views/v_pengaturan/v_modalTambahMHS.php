<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah MAHASISWA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" id="nim" name="nim" class="form-control col-md-4" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_awal">Nama Awal</label>
                        <input type="text" id="nama_awal" name="nama_awal" class="form-control col-md-5" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_akhir">Nama Akhir</label>
                        <input type="text" id="nama_akhir" name="nama_akhir" class="form-control col-md-5">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-group">
                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki" required> Laki-Laki
                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan" required> Prempuan
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" id="kelas" name="kelas" class="form-control col-md-3">
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="text" id="telp" name="telp" class="form-control col-md-3">
                    </div>
                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <select id="inputState" class="form-control col-md-2" name="angkatan">
                            <option value="">Tahun</option>
                            <?php
                            $thn_skr = date('Y');
                            for ($x = $thn_skr; $x >= 1940; $x--) {
                                $selected_cat = ($x == $dataMahasiswa['angkatan']) ? 'selected="selected"' : '';
                                echo "<option value = '".$x."' ".$selected_cat.">".$x."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="tak">TAK</label>
                        <input type="text" id="tak" name="tak" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpanMhs">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>