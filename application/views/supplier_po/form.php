<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Form PO</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Form PO</a></div>
              <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Masukkan data Form PO baru.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('supplier_po/save/'.@$id) ?>" style="margin:20px;">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="id_supplier">Pilih Supplier</label>
                                        <select name="id_supplier" id="id_supplier" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($supplier as $sp) { ?>
                                            <option value="<?= $sp['id'] ?>" <?php echo @$data->id_supplier==$sp['id'] ? "selected":"" ?>><?= $sp['supplier_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="po_date">Tanggal PO</label>
                                        <input type="date" class="form-control" value="<?php echo isset($data->po_date) ? $data->po_date : '' ?>" name="po_date" id="po_date" placeholder="Masukan Tanggal PO">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="delivery_date">Tanggal Pengiriman</label>
                                        <input type="date" class="form-control" value="<?php echo isset($data->delivery_date) ? $data->delivery_date : '' ?>" name="delivery_date" id="delivery_date" placeholder="Masukan Tanggal Pengiriman">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Diketahui Oleh</label>
                                        <select name="known_by" id="known_by" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($pegawai as $pg) { ?>
                                            <option value="<?= $pg['id'] ?>" <?php echo @$data->known_by==$pg['id'] ? "selected":"" ?>><?= $pg['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Diapprove Oleh</label>
                                        <select name="approved_by" id="approved_by" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($pegawai as $pg) { ?>
                                            <option value="<?= $pg['id'] ?>" <?php echo @$data->approved_by==$pg['id'] ? "selected":"" ?>><?= $pg['nama'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <hr>
                                        <?php if (!@$id) { ?>
                                        <button type="submit" class="btn btn-primary pull-right" id="simpan">Simpan</button>
                                        <?php  } else { ?>
                                        <button type="submit" class="btn btn-primary pull-right" id="update">Simpan</button>
                                        <?php } ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>