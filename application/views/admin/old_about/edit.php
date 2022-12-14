<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (!empty($this->session->flashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php $this->session->flashdata('error') ?>
                    </div>
                <?php endif ?>
                <?= validation_errors() ?>
                <form action="<?= site_url('admin/about/do_update') ?>" method="post" id="form-edit" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= encode_id($data->id) ?>">
                    <div class="row">
                        <div class="form-group col-md-12 col-md-12">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi"><?= $data->deskripsi ?></textarea>
                        </div>

                        <div class="form-group col-md-6 col-md-6">
                            <label for="title_tugas_1">Title Tugas 1</label>
                            <input type="text" class="form-control" value="<?= $data->title_tugas_1 ?>" name="title_tugas_1" required id="title_tugas_1" placeholder="Masukan ">
                        </div>
                        <div class="form-group col-md-6 col-md-6">
                            <label for="desc_tugas_1">Desc Tugas 1</label>
                            <textarea class="form-control" name="desc_tugas_1"><?= $data->desc_tugas_1 ?></textarea>
                        </div>

                        <div class="form-group col-md-6 col-md-6">
                            <label for="title_tugas_2">Title Tugas 2</label>
                            <input type="text" class="form-control" value="<?= $data->title_tugas_2 ?>" name="title_tugas_2" required id="title_tugas_1" placeholder="Masukan ">
                        </div>
                        <div class="form-group col-md-6 col-md-6">
                            <label for="desc_tugas_2">Desc Tugas 2</label>
                            <textarea class="form-control" name="desc_tugas_2"><?= $data->desc_tugas_2 ?></textarea>
                        </div>

                        <div class="form-group col-md-6 col-md-6">
                            <label for="title_tugas_3">Title Tugas 3</label>
                            <input type="text" class="form-control" value="<?= $data->title_tugas_3 ?>" name="title_tugas_3" required id="title_tugas_1" placeholder="Masukan ">
                        </div>
                        <div class="form-group col-md-6 col-md-6">
                            <label for="desc_tugas_3">Desc Tugas 3</label>
                            <textarea class="form-control" name="desc_tugas_3"><?= $data->desc_tugas_3 ?></textarea>
                        </div>
                        <div class="form-group col-md-6 col-md-6">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" value="<?= $data->telepon ?>" name="telepon" required id="telepon" placeholder="Masukan">
                        </div>
                        <div class="form-group col-md-6 col-md-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="<?= $data->email ?>" name="email" required id="email" placeholder="Masukan">
                        </div>
                        <div class="form-group col-md-12 col-md-12">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat"><?= $data->alamat ?></textarea>
                        </div>
                    </div>

                    <div class="row mb-1">
                        <div class="col-md-12">
                            <div id="reload_lokasi" style="position: absolute; top: 10px ; right: 25px ;  cursor : pointer;  z-index: 99999999999">
                                <button type="button" class="btn btn-danger glow"> <i class="bx bx-map-pin"></i> Lokasi Anda </button>
                            </div>
                            <div id="map" style="height: 400px; margin-bottom: 10px; background: #ccc; display: block!important; z-index: 999999"></div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-sm-6 mb-1">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="bx bx-globe"></i></span>
                                    <span class="input-group-text">Latitude</span>
                                </div>
                                <input type="text" name="latitude" class="form-control" id="latitude" value="<?= $data->latitude ?>">
                            </div>
                        </div>
                        <div class="col-sm-6 mb-1">
                            <div class="input-group">
                                <input type="text" name="longitude" class="form-control" id="longitude" value="<?= $data->longitude ?>">
                                <div class="input-group-append">
                                    <span class="input-group-text">Longitude</span>
                                    <span class="input-group-text"><i class="bx bx-globe"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>