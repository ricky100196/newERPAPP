</div>
<style type="text/css">
.img-shade-back {
    position: absolute;
    opacity: 0.1;
    width: 300px;
    right: 10px;
    bottom: 10px;
    z-index: -1;
}
</style>
<img src="<?= base_url('images/custom/logo_kemdikbud.png') ?>" alt="" class="img-shade-back">
<footer class="footer" style="left: 0;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                document.write(new Date().getFullYear())
                </script> © Monitoring dan Evaluasi Coaching Merdeka Belajar
            </div>
            <div class="col-sm-6">
                <div class="text-sm-right d-none d-sm-block">
                    KEMENDIKBUDRISTEK
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?= $this->theme ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/node-waves/waves.min.js"></script>

<script src="<?= $this->theme ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>

<script src="<?= $this->theme ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= $this->theme ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<script src="<?= $this->theme ?>assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?= $this->theme ?>assets/libs/twitter-bootstrap-wizard/prettify.js"></script>
<script src="<?= $this->theme ?>assets/js/pages/form-wizard.init.js"></script>

<script src="<?= $this->theme ?>assets/js/app.js"></script>
<script src="<?= $this->theme ?>assets/libs/select2/js/select2.min.js"></script>
<!-- <script src="<?= $this->theme ?>assets/libs/bs-custom-file-input/bs-custom-file-input.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src="https://codeseven.github.io/toastr/toastr.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

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

$(document).ready(function() {
    $("#datatable").DataTable(),
        $("#datatable-buttons").DataTable({
            lengthChange: !1,
            buttons: ["copy", "excel", "pdf"]
        }).buttons().container().appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)")
});

$('.select2').select2({
    width: '100%'
});
$('.rupiah').keyup(function() {
    $(this).val(formatRupiah(this.value));
});

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

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