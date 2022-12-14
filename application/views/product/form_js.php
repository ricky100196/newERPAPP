
<script type="text/javascript">
    $(document).ready(function() {
        $("#customer_id").select2({
            width: '100%',
        });
    });

    $("#no_hp").keyup(function() {
        $("#myInput").val($('#no_hp').val());
    });

    $('#form-simpan').on('submit', function(e) {
        e.preventDefault();

        var data = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            beforeSend: () => {
                $(this).find(['type=submit']).fadeOut();
            },
            success: (res) => {
                if (res.status==true) {
                    Swal.fire({
                        title: "Berhasil Menyimpan Data",
                        text: "",
                        icon: "success",
                        showCancelButton: false,
                        confirmButtonColor: "#ea1c18",
                        confirmButtonText: "Oke",
                    }).then((result) => {
                        if (result.value) {
                            window.location.href = '<?= base_url('product') ?>';
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: res.message,
                    });
                }

            },
            fail: (res) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi Kesalahan saat menyimpan data!',
                });
            },
            error: (res) => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi Kesalahan saat menyimpan data!',
                })
            }
        })
    });

    function validasi_identitas() {
        let array_empty = [];
        let data = {};
        let nuptk = $('#nuptk').val();

        $.ajax({
            type: "POST",
            url: '<?= base_url('admin/coach/cek_lulusan') ?>',
            data: {nuptk: nuptk},
            dataType: 'json',
        }).then((response)=>{
                console.log(response.data);
                $('#nik').val(response.data.nik);
                $('#nik').css('background-color', '#e8f0fe');
                $('#nama').val(response.data.nama);
                $('#nama').css('background-color', '#e8f0fe');
                $('#instansi').val(response.data.instansi);
                $('#instansi').css('background-color', '#e8f0fe');
                $('#provinsi').val(response.data.kode_prov).change();
                $('#provinsi').css('background-color', '#e8f0fe');
                $('#kota').val(response.data.kode_kab).change();
                $('#kota').css('background-color', '#e8f0fe');

            if (response.status=='1') {
                swal({
                    title: response.title, 
                    text: response.msg, 
                    icon: response.icon,
                    closeOnClickOutside: false,
                    buttons: {
                        cancel: false,
                        confirm: {
                            text: "Saya Mengerti",
                            value: true,
                            visible: true,
                            closeModal: true
                        }
                    },
                });
            }
        }).fail((xhr, status, error)=>{
            console.log(xhr.responseText);
        });
    }
</script>
