<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    // $("#content").summernote({
    //     height: 300,
    //     minHeight: null,
    //     maxHeight: null,
    //     focus: !0
    // })

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

    $('#form-edit').on('submit', function(e) {
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