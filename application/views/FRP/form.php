<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>FRP</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Marketing</a></div>
              <div class="breadcrumb-item">Tambah FRP</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Masukkan data FRP.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('FRP/save/'.@$id) ?>" style="margin:20px;">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="customer_id">Customer</label>
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($perusahaan as $ph) { ?>
                                            <option value="<?= $ph['id'] ?>" <?php echo @$data->id==$ph['id'] ? "selected":"" ?>><?= $ph['customer_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="product_id">Part Name</label>
                                        <select name="product_id" id="product_id" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($product as $pd) { ?>
                                            <option value="<?= $pd['id'] ?>" <?php echo @$data->id==$pd['id'] ? "selected":"" ?>><?= $pd['product_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="no_po">PO no</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->no_po) ? : '' ?>" name="no_po" id="no_po" placeholder="Masukan No PO">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tgl_po">Tanggal PO</label>
                                        <input type="date" class="form-control" value="<?php echo isset($data->tgl_po) ? $data->tgl_po : '' ?>" name="tgl_po" id="tgl_po" placeholder="Masukan Tanggal PO">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="qty_po">QTY PO</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->qty_po) ? $data->qty_po : '' ?>" name="qty_po" id="qty_po" placeholder="Masukan Jumlah PO">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="supplier_id">Supplier</label>
                                        <select name="supplier_id" id="supplier_id" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($supplier as $sp) { ?>
                                            <option value="<?= $sp['id'] ?>" <?php echo @$data->id==$sp['id'] ? "selected":"" ?>><?= $sp['supplier_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="material_id">Material</label>
                                        <select name="material_id" id="material_id" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($material as $mt) { ?>
                                            <option value="<?= $mt['id_material'] ?>" <?php echo @$data->id==$mt['id_material'] ? "selected":"" ?>><?= $mt['jenis_material'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tgl_delivery">Delivery Date</label>
                                        <input type="date" class="form-control" value="<?php echo isset($data->tgl_delivery) ? $data->tgl_delivery : '' ?>" name="tgl_delivery" id="tgl_delivery" placeholder="Masukan Tanggal delivery">
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