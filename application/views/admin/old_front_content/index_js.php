<script>

function doHapus(input) {
        let url = $(input).data('url');
        console.log(url);
        Swal.fire({
            icon: 'warning',
            title: 'Anda yakin menghapus \n data ?',
            showCancelButton: true,
            cancelButtonText: 'Batalkan',
            confirmButtonText: 'Ya, Hapus',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: url,
                    dataType: "JSON",
                    beforeSend: function() {
                        
                    }
                }).done((response) => {
                    console.log(response);
                    if (response.status) {
                        show_swal('success', response.pesan, 2000);
                        setTimeout(location.reload.bind(location), 2000);
                        
                    } else {
                        show_swal('error', response.pesan, 2000);
                        setTimeout(location.reload.bind(location), 2000);
                    }
                }).fail((xhr, text, error) => {
                    console.log(error);
                    show_swal('error', xhr.responseText, 2000);
                    // setTimeout(location.reload.bind(location), 2000);
                });
            }
        });
    }
    function show_swal(ikon, text, timer) {
        Swal.fire({
            icon: ikon,
            title: text,
            showConfirmButton: false,
            timer: timer
        })
    }
</script>