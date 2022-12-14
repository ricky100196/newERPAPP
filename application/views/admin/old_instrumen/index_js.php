<script type="text/javascript">
function tambah() {
    $("#content_modal").html(
        `<div class="text-center p-3"><img src="<?= base_url('uploads/loading.gif') ?>" style="width:auto;"></div>`);
    $.ajax({
        type: 'POST',
        url: "<?= base_url('instrumen/tambah_instrumen'); ?>",
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
        url: "<?= base_url('instrumen/tambah_kehadiran'); ?>",
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
        url: "<?= base_url('instrumen/ubah_kehadiran'); ?>",
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
        url: "<?= base_url('instrumen/ubah_kehadiran'); ?>",
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
        url: "<?= base_url('instrumen/get_jenjang'); ?>/" + id + "/" + jenis,
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
        url: "<?= base_url('instrumen/ubah_instrumen'); ?>",
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
        title: "Apakah Anda Yakin Menghapus Data Monev Ini ?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ea1c18",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.value) {
            window.location.href = '<?= base_url('instrumen/hapus_instrumen/') ?>' + id;
        }
    });
}

function kunci(id, kunci) {
    if (kunci=="0") {
        tanya = "Apakah Anda Yakin Ingin Membuka Instrumen dan Melakukan Perubahan ?";
    } else if (kunci=="1") {
        tanya = "Apakah Anda Yakin Telah Selesai Mengisi Instrumen ?";
    }
    
    if ($kunci=="0" || $kunci=="1") {
        Swal.fire({
            title: tanya,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#ea1c18",
            confirmButtonText: "Ya",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.value) {
                window.location.href = '<?= base_url('instrumen/kunci_instrumen/') ?>' + id + '/' + kunci;
            }
        });
    }
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
            window.location.href = '<?= base_url('instrumen/hapus_kehadiran/') ?>' + id;
        }
    });
}
</script>