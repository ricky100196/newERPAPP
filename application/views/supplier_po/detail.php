<style>
hr {
  border: 0;
  clear:both;
  display:block;
  width: 98%;               
  background-color:#000000;
  height: 1px;
}
</style>

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
            <p class="section-lead">Detail Data Form PO.</p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-20">
                            <div class="row">
                                <div class="pull-right col-md-12">
                                    <a class="btn btn-rounded btn-sm btn-primary float-right text-white" id="add_material" data-toggle="modal" data-target="#modal_add"><i class="fa fa-plus mr-1"></i> Tambah Material / Bahan</a>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="customer_name">Nomor PO</label>
                                    <h4><b><?= strtoupper($data->po_number) ?></b></h4>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pic_name">Tanggal PO</label>
                                    <h4><b><?= tgl_indo($data->po_date) ?></b></h4>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pic_phone">Tanggal Pengiriman</label>
                                    <h4><b><?= tgl_indo($data->delivery_date) ?></b></h4>
                                </div>
                                <hr>
                                <div class="form-group col-md-12">
                                    <label for="customer_name">Nama Supplier</label>
                                    <h5><b><?= ucwords($data->nama_supplier) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="group">Pembayaran</label>
                                    <h5><b><?= strtoupper($data->payment_term.' - '.$data->payment_method) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="country">Pengiriman</label>
                                    <h5><b><?= ucwords($data->delivery_term.' - '.$data->delivery_type) ?></b></h5>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="country">Alamat Pengiriman</label>
                                    <h5><b><?= $data->alamat_supplier ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sales_tax">Jenis Pajak Penjualan</label>
                                    <h5><b><?= strtoupper($data->sales_tax) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="currency">Mata Uang</label>
                                    <h5><b><?= strtoupper($data->currency) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <h5><b><?= strtolower($data->email_supplier) ?></b></h5>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telp">No Telepon</label>
                                    <h5><b><?= strtolower($data->telepon_supplier) ?></b></h5>
                                </div>
                                <hr>
                                <div class="form-group col-md-4">
                                    <label for="npwp">Dibuat Oleh</label>
                                    <h5><b><?= ucwords($created_by) ?></b></h5>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="npwp">Diketahui Oleh</label>
                                    <h5><b><?= ucwords($known_by) ?></b></h5>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="npwp">Diapprove Oleh</label>
                                    <h5><b><?= ucwords($approved_by) ?></b></h5>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table id="table-data" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="vertical-align: middle !important;width: 5%">No</th>
                                                <th>Nama Material</th>
                                                <th>Harga</th>
                                                <th>Qty</th>
                                                <th>Total</th>
                                                <th>DPP</th>
                                                <th>Grand Total</th>
                                                <th>No Surat Jalan</th>
                                                <th>Kedatangan</th>
                                                <th>No Invoice</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; foreach($detail as $dt) { 
                                                $total = $dt['harga']*$dt['qty'];
                                                $dpp = round($total*11/100);
                                                $grand_total = $total+$dpp;
                                            ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $dt['jenis_material'] ?></td>
                                                <td><?= rupiah($dt['harga']) ?></td>
                                                <td><?= $dt['qty'] ?></td>
                                                <td><?= rupiah($total) ?></td>
                                                <td><?= rupiah($dpp) ?></td>
                                                <td><?= rupiah($grand_total) ?></td>
                                                <td><?= implode('<br>', (explode(',', $dt['no_sj']))) ?></td>
                                                <td><?= implode('<br>', (explode(',', $dt['kedatangan']))) ?></td>
                                                <td><?= implode('<br>', (explode(',', $dt['no_invoice']))) ?></td>
                                                <td><a href="<?= site_url('supplier_po/edit/'.encode_id($dt['id'])) ?>" class="btn btn-sm btn-info">Edit</a>&nbsp;<a href="javascript:;" data-nama="<?= $dt['jenis_material'] ?>" data-id="<?= encode_id($dt['id']) ?>" class="btn btn-sm btn-danger mr-1 mb-0" onclick="doHapus(this)">Hapus</a></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal -->
<div class="modal fade" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form-simpan" role="form" method="post" action="<?= site_url('supplier_po/save_material/'.encode_id($data->id)) ?>" style="margin:20px;">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="id_material">Pilih Material</label>
                            <select name="id_material" id="id_material" class="form-control">
                                <option value="">-PILIH-</option>
                                <?php foreach ($material as $mt) { ?>
                                <option value="<?= $mt['id_material'] ?>"><?= $mt['jenis_material'].' ('.rupiah($mt['harga_material'],1).')' ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="qty">Qty/Jumlah</label>
                            <input type="text" class="form-control" value="" name="qty" id="qty" placeholder="Masukan Qty/Jumlah">
                        </div>
                        <div class="form-group col-md-12">
                            <div class="sj_form">
                                <fieldset class="sj_first mb-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control sj_pil1" placeholder="Nomor Surat Jalan" name="sj_list[]">
                                        <div class="input-group-append" id="button-addon2">
                                            <button class="btn btn-primary" type="button" id="add_sj_list">Tambah</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="kedatangan_form">
                                <fieldset class="kedatangan_first mb-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control kedatangan_pil1" placeholder="Kedatangan" name="kedatangan_list[]">
                                        <div class="input-group-append" id="button-addon2">
                                            <button class="btn btn-primary" type="button" id="add_kedatangan_list">Tambah</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <div class="invoice_form">
                                <fieldset class="invoice_first mb-1">
                                    <div class="input-group">
                                        <input type="text" class="form-control invoice_pil1" placeholder="Invoice" name="invoice_list[]">
                                        <div class="input-group-append" id="button-addon2">
                                            <button class="btn btn-primary" type="button" id="add_invoice_list">Tambah</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                            <!-- <button type="submit" class="btn btn-primary pull-right" id="simpan">Simpan</button> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>