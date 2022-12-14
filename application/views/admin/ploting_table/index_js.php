<!-- Dropzone -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {

        $("#waktu2_box2").hide();
        $("#transportasi_box2").hide();
        $("#satpras_box2").hide();
        $("#administrasi_box2").hide();
        $("#lainnya_box2").hide();

        load_table();

    });
    bsCustomFileInput.init()
</script>


<script>
    function load_table() {
        $('#table_data').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            ordering: true,
            autoWidth: false,
            lengthMenu: [
                [10, 25, 50, 100, -1],
                [10, 25, 50, 100, "All"]
            ],
            ajax: {
                url: '<?= base_url('admin/ploting_table/table') ?>',
                type: 'GET',
                dataType: 'JSON',
                complete: function() {
                    $(".select_spv").select2();
                },
            },
            order: [],
            columnDefs: [{
                targets: [0, -1],
                className: 'text-center',
                orderable: false,
            }],
        })
    }

    function deleted_chat(id, id_ins) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('coaching/delete_chat'); ?>",
            data: {
                id: id
            },
            cache: false,
            success: function(data) {
                let get = JSON.parse(data);
                if (get.status == '1') {
                    Swal.fire({
                        title: "Komentar berhasil dihapus",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#b50002",
                        confirmButtonText: "Oke",
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = '<?= base_url('coaching/guru/') ?>' + id_ins;
                        }
                    });
                } else {
                    Swal.fire({
                        title: "Gagal menghapus komentar, periksa koneksi anda.",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#b50002",
                        confirmButtonText: "Oke",
                    });
                }
            }
        });
    }

    function daftar_guru(id) {
        $("#content_modal").html(
            `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
        $.ajax({
            type: 'POST',
            datatype: 'HTML',
            url: "<?= base_url('admin/ploting_table/view_guru'); ?>",
            data: {
                id: id
            },
            cache: false,
            success: function(data) {
                $("#content_modal").html(data);
            }
        });
    }

    function ubah_supervisor(id_coach) {
        var val = $("#pilih_spv_" + id_coach).val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url('admin/ploting_table/save_supervisor'); ?>",
            data: {
                id: id_coach,
                val: val
            },
            cache: false,
            success: function(data) {
                get_data = JSON.parse(data);
                if (get_data.status) {
                    Swal.fire({
                        title: "Berhasil mengubah supervisor.",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#25D366",
                        confirmButtonText: "Oke",
                    });
                } else {
                    Swal.fire({
                        title: "Gagal mengubah supervisor, periksa konseksi anda.",
                        icon: "error",
                        showCancelButton: false,
                        confirmButtonColor: "#b50002",
                        confirmButtonText: "Oke",
                    });
                }
            }
        });
    }
</script>