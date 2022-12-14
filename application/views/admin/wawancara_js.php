<script type="text/javascript">
function tambah() {
    $("#content_modal").html(
        `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    $.ajax({
        type: 'POST',
        url: "<?= base_url('admin/tambah_wawancara'); ?>",
        data: {
            id: 1
        },
        cache: false,
        success: function(data) {
            $("#content_modal").html(data);
        }
    });
}

function ubah(id) {
    $("#content_modal").html(
        `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    $.ajax({
        type: 'POST',
        url: "<?= base_url('admin/ubah_wawancara'); ?>",
        data: {
            id: id
        },
        cache: false,
        success: function(data) {
            $("#content_modal").html(data);
        }
    });
}

function hapus(id) {
    Swal.fire({
        title: "Hapus data responden?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ea1c18",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.value) {
            window.location.href = '<?= base_url('admin/hapus_wawancara/') ?>' + id;
        }
    });
}
</script>