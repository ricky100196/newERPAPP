<!-- Load Leaflet from CDN -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin="" />
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet@3.0.3/dist/esri-leaflet.js"
    integrity="sha512-kuYkbOFCV/SsxrpmaCRMEFmqU08n6vc+TfAVlIKjR1BPVgt75pmtU9nbQll+4M9PN2tmZSAgD1kGUCKL88CscA=="
    crossorigin=""></script>


<!-- Load Esri Leaflet Geocoder from CDN -->
<link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.css"
    integrity="sha512-IM3Hs+feyi40yZhDH6kV8vQMg4Fh20s9OzInIIAc4nx7aMYMfo+IenRUekoYsHZqGkREUgx0VvlEsgm7nCDW9g=="
    crossorigin="">
<script src="https://unpkg.com/esri-leaflet-geocoder@3.1.1/dist/esri-leaflet-geocoder.js"
    integrity="sha512-enHceDibjfw6LYtgWU03hke20nVTm+X5CRi9ity06lGQNtC9GkBNl/6LoER6XzSudGiXy++avi1EbIg9Ip4L1w=="
    crossorigin=""></script>

<!-- Dropzone -->
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

<script type="text/javascript">
$(document).ready(function() {

    $("#waktu2_box2").hide();
    $("#transportasi_box2").hide();
    $("#satpras_box2").hide();
    $("#administrasi_box2").hide();
    $("#lainnya_box2").hide();


});
bsCustomFileInput.init()

<?php if (!empty($this->session->flashdata('message'))) : ?>
Swal.fire({
    title: "<?= $this->session->flashdata('message') ?>",
    icon: "<?= $this->session->flashdata('message_type') ?>",
});
<?php endif ?>


function set_100(dt) {
    if ($(dt).val() > 100) {
        $(dt).val(100);
    }
}

function save_instrumen(dt) {
    var id = $(dt).data('id');
    var field = $(dt).data('field');
    var val = $(dt).val();
    $('.jawaban_' + id).removeClass('active');
    $(dt).addClass('active');
    if (navigator.onLine) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('form/save_instrumen') ?>",
            dataType: 'JSON',
            data: {
                id: id,
                field: field,
                val: val
            },
            success: function(data) {
                toastr.success('Berhasil simpan jawaban.');
            },
        });
    } else {
        Swal.fire({
            icon: "warning",
            title: 'Warning...',
            text: 'Koneksi Internet anda terputus. Silahkan Refresh Halaman.'
        })
    }
}

function save_one(dt, field = null, val = null) {
    if (field == null) {
        var field = $(dt).data('field');
    }
    if (val == null) {
        var val = $(dt).val();
    }
    if (field == 'skala_usaha') {
        $('.' + field).removeClass('active');
        $(dt).addClass('active');
    }
    if (navigator.onLine) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('form/save_one') ?>",
            dataType: 'JSON',
            data: {
                field: field,
                val: val
            },
            success: function(data) {
                toastr.success('Berhasil simpan data.');
            },
        });
    } else {
        Swal.fire({
            icon: "warning",
            title: 'Warning...',
            text: 'Koneksi Internet anda terputus. Silahkan Refresh Halaman.'
        })
    }
}

function save_session(dt, field = null, val = null) {
    if (field == null) {
        var field = $(dt).data('field');
    }
    if (val == null) {
        var val = $(dt).val();
    }
    if (navigator.onLine) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('form/save_session') ?>",
            dataType: 'JSON',
            data: {
                field: field,
                val: val
            },
            success: function(data) {
                toastr.success('Berhasil simpan data.');
                location.reload();
            },
        });
    } else {
        Swal.fire({
            icon: "warning",
            title: 'Warning...',
            text: 'Koneksi Internet anda terputus. Silahkan Refresh Halaman.'
        })
    }
}

$('.select2').select2({
    width: '100%'
});

function get_wilayah(val, target, name) {
    $('#' + target).html('');
    if (target == 'kode_kab') {
        $('#kode_kec').html('');
        $('#kode_kec').select2({
            placeholder: "Pilih Kecamatan",
        });
        $('#kode_kel').html('');
        $('#kode_kel').select2({
            placeholder: "Pilih Kelurahan",
        });
    } else if (target == 'kode_kec') {
        $('#kode_kel').html('');
        $('#kode_kel').select2({
            placeholder: "Pilih Kelurahan",
        });
    }
    $.ajax({
        type: 'GET',
        url: '<?= base_url('form/get_wilayah') ?>',
        dataType: 'JSON',
        data: {
            val: val,
            target: target,
            name: name,
        },
        success: function(res) {
            $('#' + target).html(res);
            $('#' + target).val('all');
        },
    });
    $('#' + target).select2({
        placeholder: "Pilih " + name,
    });
    return false
}
</script>



<script>
$(() => {
    $('.table-dropzone').slideDown(750)
})
</script>

<script>
Dropzone.autoDiscover = false
// Get the template HTML and remove it from the doument.
let previewNode = document.querySelector("#template");
previewNode.id = "";
let previewTemplate = previewNode.parentNode.innerHTML;
previewNode.parentNode.removeChild(previewNode);

let myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "<?= base_url('coach/upload_multi/' . encode_id($instrumen->id).'/'. encode_id('4')) ?>", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    acceptedFiles: ".png,.jpg,.jpeg,.gif,.pdf",
    previewTemplate: previewTemplate,
    autoQueue: true, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
});

myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file);
    };
    file.myCustomName = "file[]";

    var ext = file.name.split('.').pop();

    if (ext == "pdf") {
        $(file.previewElement).find("img[data-dz-thumbnail]").attr('src',
            '<?= base_url('images/custom/pdf.png') ?>').css('width', '90px');
    }
});

// Update the total progress bar
myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
});

myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1";
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
});

// Hide the total progress bar when nothing's uploading anymore
myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0";
    location.reload();
});

myDropzone.on("error", function(file, message, xhr) {
    if (xhr == null) this.removeFile(file); // perhaps not remove on xhr errors
    // alert(message);
});

// Setup the buttons for all transfers
// The "add files" button doesn't need to be setup because the config
// `clickable` has already been specified.
document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
};
</script>

<script>
function jawab(id_soal, val) {
    $.ajax({
        type: 'POST',
        url: "<?= base_url('coach/jawab'); ?>",
        data: {
            id_instrumen: '<?= encode_id($instrumen->id) ?>',
            id_soal: id_soal,
            val: val
        },
        cache: false,
        success: function(data) {
            toastr.success('Berhasil Menyimpan Jawaban');
        }
    });
}

function delete_upload(id) {
    $.ajax({
        type: 'POST',
        url: "<?= base_url('coach/delete_upload'); ?>",
        data: {
            id
        },
        cache: false,
        success: function(data) {
            $(`#el${id}`).remove();
            toastr.success('Berhasil Menyimpan Menghapus File');
        }
    });
}

function simpan_submit() {
	        Swal.fire({
	            title:"Anda yakin ingin mensubmit semua data?",
	            icon :"warning",
	            showCancelButton  :true,
	            confirmButtonColor:"#b50002",
	            confirmButtonText :"Ya",
	            cancelButtonText  :"Batal",
	        }).then((result) => {
	            if (result.value) {
	                window.location.href = '<?= base_url('coach/simpan_submit') ?>';
	            }
	        });
	    }
</script>