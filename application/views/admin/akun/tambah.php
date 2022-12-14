<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <div class="text-sm-right">
                            <a href="<?= base_url('admin/akun/index') ?>" class="btn btn-danger">Kembali</a>
                        </div>
                    </div>
                </div>

                <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= base_url('admin/akun/do_tambah') ?>" style="margin:20px;">
                    <div class="container">
                        <div class="row">
                            <div class="form-group col-md-6 col-md-6">
                                <label for="provinsi">Provinsi</label>
                                <select onchange="select_kab(this);" data-placeholder="pilih provinsi" name="kode_prov" id="provinsi" class="form-control js_select2" required>
                                    <option></option>
                                    <?php foreach ($provinsi as $row) : ?>
                                        <option value="<?= $row->kode_wilayah ?>"><?= $row->nama; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-md-6">
                                <label for="kota">Kota/Kabupaten</label>
                                <select data-placeholder="pilih kabupaten" name="kode_kab" id="kota" class="js_select2 form-control" required>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-md-6">
                                <label for="instansi">Instansi</label>
                                <input type="text" class="form-control" name="instansi" placeholder="Masukan instansi" value="">
                            </div>
                            <div class="form-group col-md-6 col-md-6">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" value="" name="nama" required placeholder="Masukan Nama Lengkap">
                            </div>
                            <div class="form-group col-md-6 col-md-6">
                                <label for="no_hp">No Hp</label>
                                <input type="text" class="form-control" value="" name="no_hp" required placeholder="Masukan No Handphone">
                            </div>
                            <div class="form-group col-md-6 col-md-6">
                                <label for="email">Type Akun</label>
                                <select data-placeholder="pilih type akun" name="type_akun" class="js_select2 form-control" required>
                                    <option></option>
                                    <option value="admin">Admin</option>
                                    <option value="operator">Operator</option>
                                    <option value="dinas">Dinas</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" value="" name="email" required placeholder="Masukan Email">
                            </div>
                            <div class="form-group col-md-6 col-md-6">
                                <label for="password">Password</label>
                                <input type="text" value="" class="form-control" name="password" required placeholder="sama seperti nomer hp" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top:10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="button"><i class="fa fa-check mr-1"></i> Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>