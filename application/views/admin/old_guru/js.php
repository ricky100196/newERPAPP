<script>
    function hapus(id, nama) {
		Swal.fire({
			title: "Apakah yakin non aktifkan data guru "+nama+"?",
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
				window.location.href = '<?= base_url('admin/guru/aksi/hapus/') ?>'+id;
			}
		});
	}

    function aktif(id, nama) {
		Swal.fire({
			title: "Apakah yakin mengaktifkan data guru "+nama+"?",
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
				window.location.href = '<?= base_url('admin/guru/aksi/aktif/') ?>'+id;
			}
		});
	}
</script>