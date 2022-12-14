<script type="text/javascript">
function tambah() {
    $("#content_modal").html(
        `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    $.ajax({
        type: 'POST',
        url: "<?= base_url('wawancara/tambah_wawancara'); ?>",
        data: {
            id: 1
        },
        cache: false,
        success: function(data) {
            $("#content_modal").html(data);
        }
    });
}


function tambah_kehadiran(id) {
    // $("#content_modal_kehadiran").html(
    //     `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    $.ajax({
        type: 'POST',
        url: "<?= base_url('wawancara/tambah_kehadiran'); ?>",
        data: {
            id: id
        },
        cache: false,
        success: function(data) {
            $("#content_modal_kehadiran").html(data);
        }
    });
}

function ubah_kehadiran(id) {
    // alert("data");
    // $("#content_modal").html(
    //     `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    $.ajax({
        type: 'POST',
        url: "<?= base_url('wawancara/ubah_kehadiran'); ?>",
        data: {
            id: id
        },
        cache: false,
        success: function(data) {
            $("#content_modal_kehadiran_ubah").html(data);
        }
    });
}



function ubah_kehadiran(id) {
    // $("#content_modal_kehadiran").html(
    //     `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    $.ajax({
        type: 'POST',
        url: "<?= base_url('wawancara/ubah_kehadiran'); ?>",
        data: {
            id: id
        },
        cache: false,
        success: function(data) {
            $("#content_modal_kehadiran_ubah").html(data);
        }
    });
}

function jenjang(id, jenis) {
    $("#content_modal").html(
        `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    $.ajax({
        type: 'GET',
        url: "<?= base_url('wawancara/get_jenjang'); ?>/" + id + "/" + jenis,
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
        url: "<?= base_url('wawancara/ubah_wawancara'); ?>",
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
        title: "Hapus data wawancara?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ea1c18",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.value) {
            window.location.href = '<?= base_url('wawancara/hapus_wawancara/') ?>' + id;
        }
    });
}

function hapus_kehadiran(id) {
    Swal.fire({
        title: "Hapus data kehadiran?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ea1c18",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.value) {
            window.location.href = '<?= base_url('wawancara/hapus_kehadiran/') ?>' + id;
        }
    });
}
</script>