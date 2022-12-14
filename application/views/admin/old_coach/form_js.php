<script>
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url: "<?php echo base_url('admin/coach/get_kota'); ?>",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<option value=' + data[i].kode_wilayah + '>' + data[i].nama + '</option>';
                    }
                    console.log(html);
                    $('.kota').html(html);

                }
            });
        });
    });
    $("#no_hp").keyup(function() {
        $("#myInput").val($('#no_hp').val());
    });
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

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
                Swal.fire(
                    'Success',
                    'Berhasil Menyimpan data',
                    'success'
                )
                // setTimeout(location.reload.bind(location), 2000);
                location.replace("https://ministry.phicos.co.id/coaching_bbgp/admin/coach/index");

            },
            fail: (res) => {
                console.log(res);
                // showErrorToastr('Oopss', 'Terjadi kesalahan saat upload file');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi Kesalahan saat menyimpan data!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
                // window.location.reload();
                setTimeout(location.reload.bind(location), 2000);
            },
            error: (res) => {
                // showErrorToastr('Oopss', 'Terjadi kesalahan saat upload file');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi Kesalahan saat menyimpan data!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
                // window.location.reload();
                setTimeout(location.reload.bind(location), 2000);

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