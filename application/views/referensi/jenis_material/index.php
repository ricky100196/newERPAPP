<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Jenis Material</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Jenis Material</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Daftar seluruh jenis material.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <!-- <div class="col-md-6">
                                    <h4 class="h3 font-weight-bold"><?= $_title ?></h4>
                                </div> -->
                                <div class="pull-right col-md-12">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#formModal"><i class="fa fa-plus mr-1"></i> Tambah Data</button>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="table-responsive">
                                <table id="table-data" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="vertical-align: middle !important;width: 5%">No</th>
                                            <th>Jenis</th>
                                            <th>Ukuran</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Jenis Material</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('referensi/jenis_material/save/') ?>" style="margin:20px;">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <!-- <option value="">-PILIH-</option> -->
                                <option value="pet" <?php echo @$data->jenis=='pet'?'selected':'' ?>><?= strtoupper('pet') ?></option>
                                <option value="pvc" <?php echo @$data->jenis=='pvc'?'selected':'' ?>><?= strtoupper('pvc') ?></option>
                                <option value="ppn" <?php echo @$data->jenis=='ppn'?'selected':'' ?>><?= strtoupper('ppn') ?></option>
                                <option value="pp" <?php echo @$data->jenis=='pp'?'selected':'' ?>><?= strtoupper('pp') ?></option>
                                <option value="hps" <?php echo @$data->jenis=='hps'?'selected':'' ?>><?= strtoupper('hps') ?></option>
                                <option value="lainnya" <?php echo @$data->jenis=='lainnya'?'selected':'' ?>><?= strtoupper('lainnya') ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="tebal">Tebal</label>
                            <input type="text" class="form-control" value="<?php echo isset($data->tebal) ? $data->tebal : '' ?>" name="tebal" id="tebal" placeholder="Masukan Tebal" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="panjang">Panjang</label>
                            <input type="text" class="form-control" value="<?php echo isset($data->panjang) ? $data->panjang : '' ?>" name="panjang" id="panjang" placeholder="Masukan Panjang" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            <button type="submit" class="btn btn-primary pull-right" id="simpan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>