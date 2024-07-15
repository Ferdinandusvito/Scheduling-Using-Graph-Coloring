<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Dosen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" id="nip" name="nip" class="form-control col-md-4" required>
                    </div>
                    <div class="form-group">
                        <label for="nidn">NIDN</label>
                        <input type="text" id="nidn" name="nidn" class="form-control col-md-4">
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
                        <label for="kode_dosen">Kode Dosen</label>
                        <input type="text" id="kode_dosen" name="kode_dosen" class="form-control col-md-2" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="form-group">
                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Laki-laki"> Laki-Laki
                            <input type="radio" id="jenis_kelamin" name="jenis_kelamin" value="Perempuan"> Prempuan
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="text" id="telp" name="telp" class="form-control col-md-3" required>
                    </div>
                    <div class="form-group">
                        <label for="blog">Blog</label>
                        <input type="text" id="blog" name="blog" class="form-control col-md-5">
                    </div>
                    <div class="form-group">
                        <label for="id_bidang">Bidang</label>
                        <select name="id_bidang" id="bidang" class="form-control" required>
                            <option value="">- Pilih Bidang -</option>
                            <?php 
                                foreach ($dataBidang as $row) { ?>
                                    <option value="<?= $row['id_bidang'] ?>"><?= $row['nama_bidang'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jab_fungsional">Jabatan Fungsional</label>
                        <select name="jab_fungsional" id="" class="form-control">
                            <option value="">- Pilih Jabatan Fungsional -</option>
                            <?php 
                                foreach ($dataJabatan as $dataJabatan) { ?>
                                    <option value="<?= $dataJabatan['id_jabatan'] ?>"><?= $dataJabatan['jabatan'] ?></option>
                                    <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jab_struktural">Jabatan Struktural</label>
                        <input type="text" id="jab_struktural" name="jab_struktural" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jab_pangkat">Pangkat</label>
                        <input type="text" id="jab_pangkat" name="jab_pangkat" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jab_golongan">Golongan</label>
                        <input type="text" id="jab_golongan" name="jab_golongan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="simpanDosen">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>