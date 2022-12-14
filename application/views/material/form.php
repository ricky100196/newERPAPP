<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Material</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Warehouse</a></div>
              <div class="breadcrumb-item">Tambah Material</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Masukkan data material.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('material/save/'.@$id) ?>" style="margin:20px;">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="bulan">Bulan Stok</label>
                                        <input type="date" class="form-control" value="<?php echo isset($data->bulan) ? $data->tahun.'-'.$data->bulan.'-01' : '' ?>" name="bulan" id="bulan" placeholder="Masukan Tanggal">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="supplier_id">Supplier</label>
                                        <select name="supplier_id" id="supplier_id" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($perusahaan as $ph) { ?>
                                            <option value="<?= $ph['id'] ?>" <?php echo @$data->id_supplier==$ph['id'] ? "selected":"" ?>><?= $ph['supplier_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="jenis">Jenis Material</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->jenis_material) ? : '' ?>" name="jenis" id="jenis" placeholder="Masukan Negara">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="roll">ROLL</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->roll) ? $data->roll : '' ?>" name="roll" id="roll" placeholder="Masukan Alamat Email">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="kg">KG</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->kg) ? $data->kg : '' ?>" name="kg" id="kg" placeholder="Masukan Nomor Telepon">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="harga_material">Harga</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->harga_material) ? $data->harga_material : '' ?>" name="harga_material" id="harga_material" placeholder="Masukan Nama PIC">
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