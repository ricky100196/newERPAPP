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
</script>


<script>
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
            if (get.status=='1') {
                Swal.fire({
                    title:"Komentar berhasil dihapus",
                    icon :"success",
                    showCancelButton  :false,
                    confirmButtonColor:"#b50002",
                    confirmButtonText :"Oke",
                }).then((result) => {
                    if (result.value) {
                        window.location.href = '<?= base_url('coaching/guru/') ?>'+id_ins;
                    }
                });
            } else {
                Swal.fire({
                    title:"Gagal menghapus komentar, periksa koneksi anda.",
                    icon :"error",
                    showCancelButton  :false,
                    confirmButtonColor:"#b50002",
                    confirmButtonText :"Oke",
                });
            }
        }
    });
}

function done_chat(id) {
    Swal.fire({
        title: "Apakah anda yakin untuk menyelesaikan forum dikusi?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ea1c18",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
    }).then((result) => {
        Swal.fire({
            title:"Forum Coaching Telah Ditutup.",
            icon :"success",
            showCancelButton  :false,
            confirmButtonColor:"#b50002",
            confirmButtonText :"Oke",
        });
    });
}

function get_time_call(id,ket){
    $.ajax({
            type: "POST",
            url: '<?= base_url('coaching/get_time_call/') ?>'+id+'/'+ket,
            data: {},
            dataType: 'json',
        }).then((response)=>{
               
        }).fail((xhr, status, error)=>{
            console.log(xhr.responseText);
        });
}

function cek_done(id) {
    id.preventDefault();
    Swal.fire({
        title: "Apakah anda yakin untuk menutup dan menyelesaikan forum dikusi?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#ea1c18",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
    }).then((result) => {
        true;
    });
}
</script>