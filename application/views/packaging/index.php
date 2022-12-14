<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Packaging</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Packaging</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Daftar seluruh kemasan.</p>

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
                                            <th>Bulan</th>
                                            <th>Jenis</th>
                                            <th>Nama</th>
                                            <th>Qty</th>
                                            <th>Harga</th>
                                            <th>Total</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Packaging</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('packaging/save') ?>" style="margin:20px;">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="bulan">Bulan Stok</label>
                            <input type="date" class="form-control" value="<?php echo isset($data->bulan) ? '01/'.$data->bulan.'/'.$data->tahun : '' ?>" name="bulan" id="bulan" placeholder="Masukan Tanggal">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" value="<?php echo isset($data->nama) ? $data->nama : '' ?>" name="nama" id="nama" placeholder="Masukan Nama Packaging">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control">
                                <option value="box" <?php echo @$data->type=='box'?'selected':'' ?>><?= strtoupper('box') ?></option>
                                <option value="plastik" <?php echo @$data->type=='plastik'?'selected':'' ?>><?= strtoupper('plastik') ?></option>
                                <option value="lainnya" <?php echo @$data->type=='lainnya'?'selected':'' ?>><?= strtoupper('lainnya') ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="qty">QTY</label>
                            <input type="text" class="form-control" value="<?php echo isset($data->qty) ? $data->qty : '' ?>" name="qty" id="qty" placeholder="Masukan Quantity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control" value="<?php echo isset($data->harga) ? $data->harga : '' ?>" name="harga" id="harga" placeholder="Masukan Harga">
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