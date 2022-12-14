<!-- <form method="POST" autocomplete="off" action="<?= base_url('wawancara/simpan_wawancara_kehadiran') ?>"> -->
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
            <input class="form-control" required="" name="nama_peserta" id="nama_peserta"
                value="<?= @$data_row->nama_peserta ?>" />
        </div>
        <!-- <div class="col-12 mb-12 selectku mb-2">
            <label>Jabatan</label>
            <input class="form-control" required="" name="jabatan" id="jabatan" value="<?= @$data_row->jabatan ?>" />
        </div> -->

        <div class="col-12 mb-12 selectku mb-2">
            <label>Nama Sekolah</label>
            <input class="form-control" required="" name="nama_sekolah" id="nama_sekolah"
                value="<?= @$data_row->nama_sekolah ?>" />
        </div>
        <div class="col-12 mb-12 selectku mb-2">
            <label>Jabatan</label>
            <select class="form-control js-select2" required="" name="status" id="status">
                <option selected="" disabled="" hidden="">Pilih Jabatan</option>
                <option value="ps">Pengawas Sekolah</option>
                <option value="ks">Kepala Sekolah</option>
                <option value="guru">Guru</option>
            </select>
        </div>
    </div>
</div>

<div class="modal-footer">
    <!-- <div class="col-4 mb-4">
        <a href="javascript:;" class="btn btn-success"
            onclick="save_kehadiran('<?= @$kehadiran['id'] ? encode_id($kehadiran['id']) : null ?>')">Simpan</a>
    </div> -->
    <a href="javascript:;" class="btn btn-success"
        onclick="save_kehadiran('<?= @$kehadiran['id'] ? encode_id($kehadiran['id']) : null ?>')">Simpan</a>
    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
    <!-- <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button> -->
</div>
<!-- </form> -->

<script>
function save_kehadiran(id) {
    var nama_peserta = $("#nama_peserta").val();
    var nama_sekolah = $("#nama_sekolah").val();
    var status = $("#status option:selected").val();
    $("#content_modal").html(
        `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);

    $.ajax({
        type: 'POST',
        url: "<?= base_url('instrumen/simpan_wawancara_kehadiran'); ?>",
        data: {
            id: id,
            nama_peserta: nama_peserta,
            nama_sekolah: nama_sekolah,
            status: status,

        },

        cache: false,
        success: function(data) {
            window.location.href = "<?= base_url('instrumen') ?>";
        }

    });

}
</script>

<script type="text/javascript">
$('.js-select2').select2({
    width: '100%',
    placeholder: 'Pilih'
});
</script>