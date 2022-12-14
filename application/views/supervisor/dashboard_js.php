<script>
    $('.custom-file-input').on('change', function() {
        let span = $(this).parent().find('.custom-file-label');
        let file = $(this)[0].files;


        if (file.length == 0) {
            span.text('Pilih File');
        } else {
            span.text(file[0].name);
        }
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result).width(150).height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#provinsi').change(function() {
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url: "<?php echo base_url('supervisor/get_kota'); ?>",
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

    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $('.myEdit').on('click', function() {
        $('#myModal').modal('show');
    })

    $('#form-edit-profile').on('submit', function(e) {
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
                    'Profilemu terupdate',
                    'success'
                )
                $('#myModal').modal('hide');
                setTimeout(location.reload.bind(location), 2000);


            },
            fail: (res) => {
                console.log(res);
                // showErrorToastr('Oopss', 'Terjadi kesalahan saat upload file');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi Kesalahan saat update profilemu!',
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
                    text: 'Terjadi Kesalahan saat update profilemu!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
                // window.location.reload();
                setTimeout(location.reload.bind(location), 2000);

            }
        })
    })
</script>