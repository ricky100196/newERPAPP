	<footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2022 <div class="bullet"></div><a href="#">PT.Anugerah Prima Plasindo </a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="<?= base_url('assets') ?>/js/stisla.js"></script>

  <!-- Datatable -->
  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

  <!-- Select2 -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- Toastr -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

	
  <!-- JS Libraies -->
  <!-- <script src="../node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->

  <!-- Template JS File -->
  <script src="<?= base_url('assets') ?>/js/scripts.js"></script>
  <script src="<?= base_url('assets') ?>/js/custom.js"></script>

  <script type="text/javascript">
		toastr.options = {
			"closeButton": true,
			"debug": false,
			"progressBar": true,
			"preventDuplicates": false,
			"positionClass": "toast-top-right",
			"onclick": null,
			"showDuration": "400",
			"hideDuration": "1000",
			"timeOut": "2500",
			"extendedTimeOut": "1000",
			"showEasing": "swing",
			"hideEasing": "linear",
			"showMethod": "fadeIn",
			"hideMethod": "fadeOut"
		}
		$(document).ready(function() {
			$('.example').DataTable({
				language: {
					search: '<span>Cari:</span> _INPUT_',
					searchPlaceholder: 'Masukan pencarian...',
					infoEmpty: "Menampilkan 0 data",
					zeroRecords: "Tidak ada data",
					info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
					infoFiltered: "(disaring dari _MAX_ data keseluruhan)",
					lengthMenu: 'Tampilkan: _MENU_',
					paginate: {
						'first': 'First',
						'last': 'Last',
						'next': '&rarr;',
						'previous': '&larr;'
					}
				}
			});
		});

		$('.select2').select2({
			width: '100%'
		});
		// $('.rupiah').keyup(function() {
		// 	$(this).val(formatRupiah(this.value));
		// });

		// function formatRupiah(angka, prefix) {
		// 	var number_string = angka.replace(/[^,\d]/g, '').toString(),
		// 		split = number_string.split(','),
		// 		sisa = split[0].length % 3,
		// 		rupiah = split[0].substr(0, sisa),
		// 		ribuan = split[0].substr(sisa).match(/\d{3}/gi);
		// 	if (ribuan) {
		// 		separator = sisa ? '.' : '';
		// 		rupiah += separator + ribuan.join('.');
		// 	}
		// 	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
		// 	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		// }

		function logout() {
			Swal.fire({
				title: "Keluar dari Sistem?",
				text: "Anda akan logout dari sistem ini.",
				icon: "warning",
				showCancelButton: true,
				confirmButtonColor: "#ea1c18",
				confirmButtonText: "Ya",
				cancelButtonText: "Batal",
				closeOnConfirm: false,
				closeOnCancel: true
			}).then((result) => {
				if (result.value) {
					window.location.href = '<?= base_url('login/logout') ?>';
				}
			});
		}
	</script>

	<?php if (@$this->session->flashdata('success')) { ?>
		<script>
			Swal.fire({
				type: "success",
				icon: "success",
				title: "<?= $this->session->flashdata('success') ?>"
			});
		</script>
	<?php }
	if (@$this->session->flashdata('failed')) { ?>
		<script>
			Swal.fire({
				type: "error",
				icon: "error",
				title: "<?= $this->session->flashdata('failed') ?>"
			});
		</script>
	<?php } ?>
	<?php isset($scriptExtra) ? $this->load->view($scriptExtra) : ''; ?>
</body>
</html>
