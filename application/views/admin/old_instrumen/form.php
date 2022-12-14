<form method="POST" autocomplete="off" action="<?= base_url('instrumen/simpan_instrumen') ?>">
    <div class="modal-header bg-success">
        <h5 class="modal-title mt-0 text-white" id="myModalLabel">Data Monev</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <input type="hidden" name="id" value="<?= @$data_row->id ?>">

            <?php if ($this->session->userdata('type') == 'admin') { ?>
            <div class="col-12 mb-12 mb-2">
                <label>Pilih Kabupaten/Kota</label>
                <select class="form-control js-select2" required=""
                    name="<?= @$data_row->id ? 'kode_kab' : 'kode_kab[]' ?>" <?= @$data_row->id ? '' : 'multiple' ?>>
                    <!-- <option selected="" disabled="" hidden="">Pilih Wilayah</option> -->
                    <?php foreach ($data_kab as $ref) { ?>
                    <option value="<?= $ref->kode_kab ?>"
                        <?= $ref->kode_kab == @$data_row->kode_kab ? 'selected' : '' ?>>
                        <?= $ref->nama_kab . ' (' . $ref->nama_prov . ')' ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 mb-12 selectku mb-2">
                <label>Pilih Petugas Monev</label>
                <select class="form-control js-select2" required="" name="id_asesor">
                    <option selected="" disabled="" hidden="">Pilih Petugas Monev</option>
                    <?php foreach ($data_asesor as $ref) { ?>
                    <option value="<?= $ref->id ?>" <?= $ref->id == @$data_row->id_asesor ? 'selected' : '' ?>>
                        <?= $ref->nama . ' (' . $ref->instansi . ')' ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 mb-12 selectku mb-2">
                <label>Petugas Administrasi </label>
                <input type="text" class="form-control" name="petugas_administrasi" placeholder="Masukkan Nama Petugas Administrasi"
                    value="<?= @$data_row->petugas_administrasi ?>">
            </div>
            <?php } ?>
            <?php if ($this->session->userdata('type') == 'petugas') { ?>
            <div class="col-12 mb-12 selectku mb-2">
                <label>Tanggal Monev </label>
                <div class="row">
                    <div class="col-5">
                        <input type="date" class="form-control" name="tanggal_mulai"
                            placeholder="Masukkan Tanggal Mulai" value="<?= @$data_row->tanggal_mulai ?>">
                    </div>
                    <div class="col-2">
                        hingga
                    </div>
                    <div class="col-5">
                        <input type="date" class="form-control" name="tanggal_selesai"
                            placeholder="Masukkan Tanggal Selesai" value="<?= @$data_row->tanggal_selesai ?>">
                    </div>
                </div>
            </div>
            <div class="col-12 mb-12 selectku mb-2">
                <label>Lokasi </label>
                <input type="text" class="form-control" name="lokasi" placeholder="Masukkan Nama Lokasi"
                    value="<?= @$data_row->lokasi ?>">
            </div>
            <div class="col-12 mb-12 selectku mb-2">
                <label>Wilayah Koordinasi </label>
                <input type="text" class="form-control" name="wilayah_upt" placeholder="Masukkan UPT (PPPPTK/LPPKSPS)"
                    value="<?= @$data_row->wilayah_upt ?>">
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>
<script type="text/javascript">
$('.js-select2').select2({
    width: '100%',
    placeholder: 'Pilih'
});
</script>