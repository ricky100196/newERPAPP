
<script src="<?= $this->theme ?>/assets/libs/apexcharts/apexcharts.min.js"></script>
<script src="<?= $this->theme ?>/assets/js/pages/dashboard.init.js"></script>
<script type="text/javascript">
	$('.select2-kecil').select2({
		width: '150px'
	});
	
	$(document).ready(function(){
		load_tabel();
	});

	function reload_tabel() {
		load_tabel();
	}

	function load_tabel() {
		var filter = $('#filter').val();
		$("#tempat_tabel").html(`<div class="text-center p-3"><img src="https://banper.binsuslat.kemdikbud.go.id/pkk/assets/img/loading.gif" style="width:auto;"></div>`);
		if (navigator.onLine) {
            $.ajax({
                type: 'POST',
                url:"<?= base_url('admin/load_tabel') ?>",
                data : {
                    filter:filter
                },
                success: function(data){
					$("#tempat_tabel").html(data);
                },
            });
        }else{
            Swal.fire({
                icon: "warning",
                title: 'Warning...',
                text: 'Koneksi Internet anda terputus. Silahkan Refresh Halaman.'
            })
        }
	}
</script>