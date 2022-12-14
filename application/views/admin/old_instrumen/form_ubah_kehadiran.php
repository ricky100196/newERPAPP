<form method="POST" autocomplete="off" action="<?= base_url('instrumen/ubah_wawancara_kehadiran') ?>">
    <div class="modal-header bg-success">
        <h5 class="modal-title mt-0 text-white" id="myModalLabel">Daftar Hadir</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-12 mb-12 selectku mb-2">
                <label>Nama Peserta</label>
                <input name="id" type="hidden" id="id" value="<?= @$data_row->id ?>">
                <input name="id_wawancara" type="hidden" id="id_wawancara" value="<?= @$data_row->id_wawancara ?>">
                <input class="form-control" required="" name="nama_peserta" id="nama_peserta"
                    value="<?= @$data_row->nama_peserta ?>" />
            </div>
            <!-- <div class="col-12 mb-12 selectku mb-2">
                <label>Jabatan</label>
                <input class="form-control" required="" name="jabatan" id="jabatan"
                    value="<?= @$data_row->jabatan ?>" />
            </div> -->

            <div class="col-12 mb-12 selectku mb-2">
                <label>Nama Sekolah</label>
                <input class="form-control" required="" name="nama_sekolah" id="nama_sekolah"
                    value="<?= @$data_row->nama_sekolah ?>" />
            </div>
            <div class="col-12 mb-12 selectku mb-2">
                <label>Status</label>
                <select class="form-control js-select2" required="" id="status" name="status">
                    <option selected="" disabled="" hidden="">Pilih Status</option>
                    <option value="ps" <?php echo @$data_row->status == 'ps' ? ' selected' : '' ?>>Pengawas Sekolah
                    </option>
                    <option value="ks" <?php echo @$data_row->status == 'ks' ? ' selected' : '' ?>>Kepala Sekolah
                    </option>
                    <option value="guru" <?php echo @$data_row->status == 'guru' ? ' selected' : '' ?>>Guru</option>
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