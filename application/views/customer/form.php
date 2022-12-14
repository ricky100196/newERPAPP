<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customer</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Customer</a></div>
              <div class="breadcrumb-item">Tambah</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Masukkan data customer baru.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('customer/save/'.@$id) ?>" style="margin:20px;">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="customer_name">Nama Customer</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->customer_name) ? $data->customer_name : '' ?>" name="customer_name" id="customer_name" placeholder="Masukan Nama Customer" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="group">Vendor Grup</label>
                                        <select name="group" id="group" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="local" <?php echo @$data->group=='local'?'selected':'' ?>>Local</option>
                                            <option value="import" <?php echo @$data->group=='import'?'selected':'' ?>>Import</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="country">Negara</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->country) ? $data->country : 'Indonesia' ?>" name="country" id="country" placeholder="Masukan Negara">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="<?php echo isset($data->email) ? $data->email : '' ?>" name="email" id="email" placeholder="Masukan Alamat Email">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="telp">No Telepon</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->telp) ? $data->telp : '' ?>" name="telp" id="telp" placeholder="Masukan Nomor Telepon">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pic_name">Nama PIC</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->pic_name) ? $data->pic_name : '' ?>" name="pic_name" id="pic_name" placeholder="Masukan Nama PIC">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="pic_phone">No Handphone PIC</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->pic_phone) ? $data->pic_phone : '' ?>" name="pic_phone" id="pic_phone" placeholder="Masukan Handphone PIC">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="npwp">NPWP</label>
                                        <input type="text" class="form-control" value="<?php echo isset($data->npwp) ? $data->npwp : '' ?>" name="npwp" id="npwp" placeholder="Masukan NPWP Perusahaan">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="sales_tax">Pajak Penjualan</label>
                                        <select name="sales_tax" id="sales_tax" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="ppn" <?php echo @$data->sales_tax=='ppn'?'selected':'' ?>>PPN</option>
                                            <option value="non ppn" <?php echo @$data->sales_tax=='non ppn'?'selected':'' ?>>Non PPN</option>
                                            <option value="ppn berikat" <?php echo @$data->sales_tax=='ppn berikat'?'selected':'' ?>>PPN Berikat</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="currency">Mata Uang</label>
                                        <select name="currency" id="currency" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="idr" <?php echo @$data->currency=='idr'?'selected':'' ?>>IDR</option>
                                            <option value="dollar" <?php echo @$data->currency=='dollar'?'selected':'' ?>>Dollar</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="delivery_term">Jalur Pengiriman</label>
                                        <select name="delivery_term" id="delivery_term" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="darat" <?php echo @$data->delivery_term=='darat'?'selected':'' ?>>Darat</option>
                                            <option value="udara" <?php echo @$data->delivery_term=='udara'?'selected':'' ?>>Udara</option>
                                            <option value="laut" <?php echo @$data->delivery_term=='laut'?'selected':'' ?>>Laut</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="delivery_type">Jenis Pengiriman</label>
                                        <select name="delivery_type" id="delivery_type" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="truk" <?php echo @$data->delivery_type=='truk'?'selected':'' ?>>Truk</option>
                                            <option value="pickup" <?php echo @$data->delivery_type=='pickup'?'selected':'' ?>>Pickup</option>
                                            <option value="mobil box" <?php echo @$data->delivery_type=='mobil box'?'selected':'' ?>>Mobil Box</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12 col-md-12">
                                        <label for="delivery_address">Alamat Pengiriman</label>
                                        <textarea class="form-control" placeholder="Alamat Pengiriman" name="delivery_address" rows="5"><?php echo isset($data->delivery_address) ? $data->delivery_address : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12 col-md-12">
                                        <label for="invoice_address">Alamat Tagihan</label>
                                        <textarea class="form-control" placeholder="Alamat Tagihan" name="invoice_address" rows="5"><?php echo isset($data->invoice_address) ? $data->invoice_address : '' ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="payment_method">Jenis Pembayaran</label>
                                        <select name="payment_method" id="payment_method" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="cash" <?php echo @$data->payment_method=='cash'?'selected':'' ?>>Cash</option>
                                            <option value="giro" <?php echo @$data->payment_method=='giro'?'selected':'' ?>>Giro</option>
                                            <option value="transfer" <?php echo @$data->payment_method=='transfer'?'selected':'' ?>>Transfer</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="payment_term">Jangka Waktu Pembayaran</label>
                                        <select name="payment_term" id="payment_term" class="form-control">
                                            <option value="">-PILIH-</option>
                                            <option value="cod" <?php echo @$data->payment_term=='cod'?'selected':'' ?>>COD</option>
                                            <option value="30 hari" <?php echo @$data->payment_term=='14 hari'?'selected':'' ?>>14 Hari</option>
                                            <option value="30 hari" <?php echo @$data->payment_term=='30 hari'?'selected':'' ?>>30 Hari</option>
                                            <option value="45 hari" <?php echo @$data->payment_term=='45 hari'?'selected':'' ?>>45 Hari</option>
                                            <option value="60 hari" <?php echo @$data->payment_term=='60 hari'?'selected':'' ?>>60 Hari</option>
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