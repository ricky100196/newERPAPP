<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    $('.myEdit').on('click', function() {
        $('#form-upload-formulir')[0].reset();
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
                window.location.reload();
            },
            error: (res) => {
                // showErrorToastr('Oopss', 'Terjadi kesalahan saat upload file');
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Terjadi Kesalahan saat update profilemu!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
                window.location.reload();

            }
        })
    })
</script>