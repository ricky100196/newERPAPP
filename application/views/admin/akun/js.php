<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
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
                            window.location.href = '<?= base_url('admin/akun') ?>';
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

	function hapus(id, nama, type) {
		Swal.fire({
			title: "Apakah yakin non aktifkan data " + nama + "?",
			text: "",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#ea1c18",
			confirmButtonText: "Ya",
			cancelButtonText: "Batal",
			closeOnConfirm: false,
			closeOnCancel: true
		}).then((result) => {
			if (result.value) {
				window.location.href = '<?= base_url('admin/akun/aksi/hapus/') ?>' + id + '/' + type;
			}
		});
	}

	function aktif(id, nama) {
		Swal.fire({
			title: "Apakah yakin mengaktifkan data guru " + nama + "?",
			text: "",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#ea1c18",
			confirmButtonText: "Ya",
			cancelButtonText: "Batal",
			closeOnConfirm: false,
			closeOnCancel: true
		}).then((result) => {
			if (result.value) {
				window.location.href = '<?= base_url('admin/akun/aksi/aktif/') ?>' + id;
			}
		});
	}

	<?php if ($this->session->flashdata('notice')) : ?>
		Swal.fire({
			icon: '<?= $this->session->flashdata('notice_type') ?>',
			title: '<?= $this->session->flashdata('notice') ?>',
			text: '',
			showConfirmButton: true,
		})
	<?php endif; ?>
</script>