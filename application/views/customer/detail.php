<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Customer</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Customer</a></div>
              <div class="breadcrumb-item">Detail</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Detail data customer.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-20">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="customer_name">Nama Customer</label>
                                    <h5><b><?= ucwords($data->customer_name) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="group">Vendor Grup</label>
                                    <h5><b><?= strtoupper($data->group) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Negara</label>
                                    <h5><b><?= ucwords($data->country) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <h5><b><?= strtolower($data->email) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telp">No Telepon</label>
                                    <h5><b><?= strtolower($data->telp) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pic_name">Nama PIC</label>
                                    <h5><b><?= ucwords($data->pic_name) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pic_phone">No Handphone PIC</label>
                                    <h5><b><?= strtolower($data->pic_phone) ?></b></h5>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="npwp">NPWP</label>
                                    <h5><b><?= strtolower($data->npwp) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sales_tax">Pajak Penjualan</label>
                                    <h5><b><?= strtoupper($data->sales_tax) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="currency">Mata Uang</label>
                                    <h5><b><?= strtoupper($data->currency) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="delivery_term">Jalur Pengiriman</label>
                                    <h5><b><?= strtoupper($data->delivery_term) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="payment_method">Jenis Pembayaran</label>
                                    <h5><b><?= strtoupper($data->payment_method) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="payment_term">Jangka Waktu Pembayaran</label>
                                    <h5><b><?= strtoupper($data->payment_term) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="delivery_type">Jenis Pengiriman</label>
                                    <h5><b><?= strtoupper($data->delivery_type) ?></b></h5>
                                </div>
                                <div class="form-group col-md-12 col-md-12">
                                    <label for="delivery_address">Alamat Pengiriman</label>
                                    <h6><b><?= $data->delivery_address ?></b></h6>
                                </div>
                                <div class="form-group col-md-12 col-md-12">
                                    <label for="invoice_address">Alamat Tagihan</label>
                                    <h6><b><?= $data->invoice_address ?></b></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>