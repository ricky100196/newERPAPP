<form method="POST" autocomplete="off" action="<?= base_url('admin/simpan_responden') ?>">
    <div class="modal-header bg-primary">
        <h5 class="modal-title mt-0 text-white" id="myModalLabel">Data Responden</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="text-white">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-6 mb-3">
                <label>Nomor Induk Berusaha (NIB)</label>
                <input type="hidden" name="id" value="<?= @$data_row->id ?>">
                <input type="text" required="" class="form-control" placeholder="Nomor Induk Berusaha (NIB)" name="nib"
                    value="<?= @$data_row->nib ?>">
            </div>
            <div class="col-6 mb-3 selectku">
                <label>Jenis Usaha</label>
                <select class="form-control select2" required="" name="jenis_usaha">
                    <option selected="" disabled="" hidden="">Pilih Jenis Usaha</option>
                    <?php foreach ($ref_usaha as $ref) { ?>
                    <option value="<?= $ref->id_usaha ?>"
                        <?= $ref->id_usaha == @$data_row->jenis_usaha ? 'selected' : '' ?>><?= $ref->usaha ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-6 mb-3">
                <label>Nama Usaha</label>
                <input type="text" required="" class="form-control" placeholder="Nama Usaha" name="nama_usaha"
                    value="<?= @$data_row->nama_usaha ?>">
            </div>
            <div class="col-6 mb-3">
                <label>No. Telpon</label>
                <input type="text" required="" maxlength="13" class="form-control" placeholder="No. Telpon" name="no_hp"
                    value="<?= @$data_row->no_hp ?>">
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
    </div>
</form>
<script type="text/javascript">
$('.js-select2').select2({
    width: '100%'
});
</script>