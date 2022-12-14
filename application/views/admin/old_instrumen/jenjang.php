
<div class="modal-header bg-success">
    <h5 class="modal-title mt-0 text-white" id="myModalLabel">Form Wawancara <?= $sasaran ?></h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" class="text-white">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row mb-2">
        <div class="col-6 mb-6">
            <select class="form-control" id="get_jenjang">
                <option value="">Pilih Jenjang</option>
                <?php for ($i = 0; $i < count($jenjang_belum); $i++) : ?>
                <option value="<?= $jenjang_belum[$i] ?>"><?= $jenjang_belum[$i] ?></option>
                <?php endfor ?>
            </select>
        </div>
        <div class="col-4 mb-4">
            <a href="javascript:;" class="btn btn-success"
                onclick="save_jenjang('<?= $jenis ?>','<?= encode_id($wawancara['id']) ?>')">Tambah Jenjang</a>
        </div>
    </div>
    <div class="row">
        <?php foreach ($jenjang as $jenjangs) { ?>

        <div class="col-12 mb-12 mb-2">
            <a type="button" href="<?= base_url('form_wawancara?id=' . encode_id($jenjangs['id'])) ?>" class="btn btn-outline-primary">Isi Instrumen Hasil Wawancara Jenjang <?= strtoupper($jenjangs['jenjang']) ?></a>
        </div>
        <?php } ?>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
</div>
<!-- </form> -->

<script>
function save_jenjang(jenis, id) {

    var jenjang = $("#get_jenjang option:selected").val();
    $("#content_modal").html(
        `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    message = confirm('are sure want to save this data ?')

    if (message) {
        window.location.href = ("<?= base_url('instrumen/simpan_jenjang'); ?>") + "/" + id + "/" + jenis + "/" + jenjang
    } else return false

}
</script>