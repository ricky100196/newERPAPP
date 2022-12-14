<form onsubmit="event.preventDefault();do_submit(this);">
    <div class="form-group">
        <label>Nama Modul</label>
        <input type="text" required name="nama_modul" autocomplete="off" placeholder="Tulis nama modul" class="form-control" value="<?= @$data->nama_modul ?>">
    </div>

    <div class="form-group">
        <label class="d-block">Kategori Program</label>
        <select required data-placeholder="Pilih kategori program" name="id_program" class="form-control js_select2">
            <option></option>
            <?php foreach ($ref_program as $dt) : ?>
                <option value="<?= $dt->id ?>" <?= $dt->id == @$data->id_program ? 'selected' : '' ?>><?= $dt->program ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="hidden" name="id" value="<?= encode_id(@$data->id) ?>">
    <button type="submit" class="btn btn-block btn-rounded btn-primary"><i class="fas fa-check"></i> KLIK DISINI UNTUK SIMPAN</button>
</form>

<script>
    $(document).ready(function() {
        $('.js_select2').select2({
            width: '100%'
        });
    });

    function do_submit(dt) {

        Swal.fire({
            title: 'Simpan Data Modul ?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('admin/ref_modul/do_submit') ?>",
                    data: new FormData(dt),
                    dataType: "JSON",
                    contentType: false,
                    processData: false,
                    beforeSend: function(res) {
                        Swal.fire({
                            title: 'Loading ...',
                            html: '<i style="font-size:25px;" class="fa fa-sync fa-spin"></i>',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                        });
                    },
                    complete: function(res) {
                        Swal.close();
                    },
                    success: function(res) {
                        if (res.status == 'success') {
                            $('#modal_custom').modal('hide');
                            $('#table_data').DataTable().ajax.reload();
                            toastr.success('data berhasil disimpan');
                        }
                    }
                });
            } else {
                return false;
            }
        })
    }
</script>