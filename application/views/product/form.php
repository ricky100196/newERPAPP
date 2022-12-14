<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Produk</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Produk</a></div>
              <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Masukkan data produk customer.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('product/save/'.@$id) ?>" style="margin:20px;">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="customer_id">Perusahaan</label>
                                        <select name="customer_id" id="customer_id" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <?php foreach ($perusahaan as $ph) { ?>
                                            <option value="<?= $ph['id'] ?>" <?php echo @$data->customer_id==$ph['id'] ? "selected":"" ?>><?= $ph['customer_name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="product_name">Nama Product</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->product_name) ? $data->product_name : '' ?>" name="product_name" id="product_name" placeholder="Masukan Nama Produk" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dimensi">Dimensi</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->dimensi) ? $data->dimensi : '' ?>" name="dimensi" id="dimensi" placeholder="Masukan Dimensi">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="jenis_bahan">Jenis Bahan</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->jenis_bahan) ? $data->jenis_bahan : '' ?>" name="jenis_bahan" id="jenis_bahan" placeholder="Masukan Jenis Bahan">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tebal">Tebal</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->tebal) ? $data->tebal : '' ?>" name="tebal" id="tebal" placeholder="Masukan Tebal">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="lebar">Lebar</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->lebar) ? $data->lebar : '' ?>" name="lebar" id="lebar" placeholder="Masukan Lebar">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="cavity">Cavity</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->cavity) ? $data->cavity : '' ?>" name="cavity" id="cavity" placeholder="Masukan Cavity">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="panjang_meja">Panjang Meja</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->panjang_meja) ? $data->panjang_meja : '' ?>" name="panjang_meja" id="panjang_meja" placeholder="Masukan Panjang Meja">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="masa_jenis">Masa Jenis</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->masa_jenis) ? $data->masa_jenis : '' ?>" name="masa_jenis" id="masa_jenis" placeholder="Masukan Masa Jenis">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="tarikan_rol">Tarikan Rol</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->tarikan_rol) ? $data->tarikan_rol : '' ?>" name="tarikan_rol" id="tarikan_rol" placeholder="Masukan Tarikan Rol">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="berat">Berat</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->berat) ? $data->berat : '' ?>" name="berat" id="berat" placeholder="Masukan Berat">
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