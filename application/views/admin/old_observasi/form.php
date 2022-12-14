<form method="POST" autocomplete="off" action="<?= base_url('observasi/simpan_observasi') ?>">
    <div class="modal-header bg-success">
        <h5 class="modal-title mt-0 text-white" id="myModalLabel">Data Instrumen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <!-- <div class="col-1 mb-12">
                <label>Nomor Induk Berusaha (NIB)</label>
                <input type="text" required="" class="form-control" placeholder="Nomor Induk Berusaha (NIB)" name="nib"
                    value="<?= @$data_row->nib ?>">
            </div> -->
            <div class="col-12 mb-12 selectku mb-2">
                <label>Pilih Asesor</label>
                <input type="hidden" name="id" value="<?= @$data_row->id ?>">
                <select class="form-control js-select2" required="" name="id_asesor">
                    <option selected="" disabled="" hidden="">Pilih Asesor</option>
                    <?php foreach ($data_asesor as $ref) { ?>
                    <option value="<?= $ref->id ?>" <?= $ref->id == @$data_row->id_asesor ? 'selected' : '' ?>><?= $ref->nama.' ('.$ref->instansi.')' ?></option>
                    <?php } ?>
                </select>
            </div>
            <!-- <div class="col-12 mb-12 selectku mb-2">
                <label>Petugas Administrasi</label>
                <select class="form-control js-select2" required="" name="id_petugas">
                    <option selected="" disabled="" hidden="">Pilih Petugas</option>
                    <?php foreach ($data_asesor as $ref) { ?>
                    <option value="<?= $ref->id ?>" <?= $ref->id == @$data_row->id_petugas ? 'selected' : '' ?>><?= $ref->nama.' ('.$ref->instansi.')' ?></option>
                    <?php } ?>
                </select>
            </div> -->
            <div class="col-12 mb-12 mb-2">
                <label>Nama Lokasi Monev</label>
                <input class="form-control" required="" name="tempat_monev" type="text" placeholder="Masukkan Lokasi Monitoring dan Evaluasi (Dinas/Sekolah/Lainnya)" value="<?= @$data_row->tempat_monev ?>">
            </div>
            <div class="col-12 mb-12 mb-2">
                <label>Pilih Kabupaten/Kota</label>
                <select class="form-control js-select2" required="" name="kode_kab">
                    <option selected="" disabled="" hidden="">Pilih Wilayah</option>
                    <?php foreach ($data_kab as $ref) { ?>
                    <option value="<?= $ref->kode_kab ?>" <?= $ref->kode_kab == @$data_row->kode_kab ? 'selected' : '' ?>><?= $ref->nama_kab.' ('.$ref->nama_prov.')' ?></option>
                    <?php } ?>
                </select>
            </div>
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