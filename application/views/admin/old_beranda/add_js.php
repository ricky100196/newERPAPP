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
</script>