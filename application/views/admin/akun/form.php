<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <a href="<?= site_url('admin/akun/index') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>
                <?php if (!@$id) { ?>
                    <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('admin/akun/simpan') ?>" style="margin:20px;">
                    <?php } else { ?>
                        <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?php echo base_url('admin/akun/update') ?>" style="margin:20px;">
                        <?php } ?>
                        <div class="container">
                            <div class="row">
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="provinsi">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control" required>
                                        <option value="0">-PILIH-</option>
                                        <?php
                                        if (isset($data->prov)) {
                                        ?>
                                            <option value="<?= $data->kode_prov ?>" selected><?= $data->prov ?></option>
                                        <?php
                                        }
                                        ?>
                                        <?php foreach ($provinsi as $row) : ?>
                                            <option value="<?php echo $row->kode_wilayah; ?>"><?php echo $row->nama; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="kota">Kota/Kabupaten</label>
                                    <select name="kota" id="kota" class="kota form-control" required>
                                        <option value="0">-PILIH-</option>
                                        <?php
                                        if (isset($data->kab)) {
                                        ?>
                                            <option value="<?= $data->kode_kab ?>" selected><?= $data->kab ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="jabatan">NIP</label>
                                    <input onchange="validasi_identitas()" type="text" class="form-control" name="nip" id="nip" placeholder="Masukan NIP"  value="<?php echo isset($data->nip) ? $data->nip : '' ?>">
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="jabatan">NIK</label>
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukan NIK" value="<?php echo isset($data->nik) ? $data->nik : '' ?>">
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="jabatan">Jabatan</label>
                                    <input type="text" name="id" value="<?php echo isset($id) ? $id : ''  ?>" hidden>
                                    <input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Masukan jabatan" value="<?php echo isset($data->jabatan) ? $data->jabatan : '' ?>">
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" class="form-control" name="instansi" id="instansi" placeholder="Masukan instansi" value="<?php echo isset($data->instansi) ? $data->instansi : '' ?>">
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="<?php echo isset($data->tgl_lahir) ? $data->tgl_lahir : '' ?>" name="tgl_lahir" required id="tgl_lahir" placeholder="Masukan tanggal Lahir">
                                </div>

                                <div class="form-group col-md-6 col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control" value="<?php echo isset($data->alamat) ? $data->alamat : '' ?>" name="alamat" id="alamat" placeholder="Masukan alamat">
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="jk">Jenis Kelamin</label>
                                    <div id="group1">
                                        <input type="radio" name="jk" <?php if (isset($data->jk)) {
                                                                            echo $data->jk == 'wanita' ? 'selected' : '';
                                                                        } ?> value="wanita">Wanita<br>
                                        <input type="radio" name="jk" <?php if (isset($data->jk)) {
                                                                            echo $data->jk == 'laki' ? 'selected' : '';
                                                                        } ?> value="laki">Laki<br>
                                    </div>

                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" value="<?php echo isset($data->nama) ? $data->nama : '' ?>" name="nama" required id="nama" placeholder="Masukan Nama Lengkap">
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="no_hp">No Handphone</label>
                                    <input type="text" class="form-control" value="<?php echo isset($data->no_hp) ? $data->no_hp : '' ?>" name="no_hp" required id="no_hp" placeholder="Masukan No Handphone">
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" value="<?php echo isset($data->email) ? $data->email : '' ?>" name="email" required id="email" placeholder="Masukan Email">
                                </div>
                                <div class="form-group col-md-6 col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" id="myInput" value="<?php echo isset($data->pass_asli) ? $data->pass_asli : '' ?>" class="form-control" name="password" required id="password" placeholder="Masukan password">
                                    <input type="checkbox" onclick="myFunction()"> Show Password

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="margin-top:10px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>

                                    <?php if (!@$id) { ?>
                                        <button type="submit" class="btn btn-primary" name="button" id="simpan">Simpan</button>
                                    <?php  } else { ?>
                                        <button type="submit" class="btn btn-primary" name="button" id="update">Simpan</button>

                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        </form>
            </div>
        </div>
    </div>
</div>