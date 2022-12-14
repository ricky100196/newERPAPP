<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		load_table();
	});

	function load_table(){
        $('#table-data').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 10,
            paging: true,
            lengthChange: true,
            searching: true,
            ordering: true,
            info: true,
            autoWidth: false,
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            order: [],
            ajax: {
                url: "<?= site_url('admin/surat_jalan/get_data_table/')?>",
                type: "GET",
                dataType: "json"
            },
            columnDefs: [
                {
                    targets: [ 0,1,5],
                    orderable: false
                },
                { 
                    targets: [0,5],
                    className: 'text-center'
                },
            ],
        });
    }

	function doHapus(input) {
        let id = $(input).data('id');
        let nama = $(input).data('nama');
        Swal.fire({
            icon: 'warning',
            title: 'Anda yakin menghapus \n data '+nama+' ?',
            showCancelButton: true,
            cancelButtonText: 'Batalkan',
            confirmButtonText: 'Ya, Hapus',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "<?= site_url('admin/surat_jalan/delete/') ?>"+id,
                    dataType: "JSON",
                    beforeSend: function() {
                    }
                }).done((response) => {
                    if (response.status) {
                        show_swal('success', response.pesan, 2000);
                        setTimeout(location.reload.bind(location), 2000);
                    } else {
                        show_swal('error', response.pesan, 2000);
                        // setTimeout(location.reload.bind(location), 2000);
                    }
                }).fail((xhr, text, error) => {
                    show_swal('error', xhr.responseText, 2000);
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