<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Surat Jalan</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Surat Jalan</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title"><?= $_title ?></h2>
            <p class="section-lead">Daftar Surat Jalan.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="form-simpan" method="POST" action="<?= site_url('admin/surat_jalan/save') ?>">
                                <div class="form-group col-md-12" hidden> 
                                    <label for="id">ID</label> 
                                    <input type="text" name="id" class="form-control" value="<?= set_value('id', encode_id($surat_jalan->id)); ?>" required>
                                </div>
                            
                                <div class="form-group col-md-12"> 
                                    <label for="data_frp_id">Data Frp</label> 
                                    <select name="data_frp_id" id="data_frp_id" class="form-control" required> 
                                        <option value="">-PILIH-</option>
                                        <?php
                                        foreach($data_frp as $item):
                                        ?>
                                        <option value="<?= $item->id ?>" <?= set_value('no_pol', $surat_jalan->data_frp_id) == $item->id ? 'selected' : '' ?>><?= $item->po_no ?></option> 
                                        <?php
                                        endforeach;
                                        ?>
                                    </select> 
                                </div>

                                <div class="form-group col-md-12"> 
                                    <label for="data_frp_id">No Pol</label> 
                                    <input type="text" name="no_pol" class="form-control" value="<?= set_value('no_pol', $surat_jalan->no_pol); ?>" required>
                                </div>

                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"> 
                                                <label for="data_frp_id">Tanggal</label> 
                                                <input type="date" name="exit_date" class="form-control" value="<?= set_value('exit_date', $surat_jalan->exit_date); ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> 
                                                <label for="data_frp_id">QTY</label> 
                                                <input type="number" name="qty" class="form-control" value="<?= set_value('qty', $surat_jalan->qty); ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-12"> 
                                    <label for="data_frp_id">Informasi</label>
                                    <textarea name="information" class="form-control" rows="4" required><?= set_value('information', $surat_jalan->information); ?></textarea>
                                </div>

                                <div class="col-md-12"> 
                                    <hr> 
                                    <button type="submit" class="btn btn-primary pull-right" id="simpan">Simpan</button> 
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>