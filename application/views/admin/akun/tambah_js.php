<script>
    $(document).ready(function() {
        $('.js_select2').select2({
            width: '100%',
        })
    });

    function select_kab(dt) {
        $.ajax({
            type: "POST",
            url: "<?= base_url('admin/akun/get_kab') ?>",
            data: {
                kode_prov: $(dt).val(),
            },
            dataType: "JSON",
            success: function(res) {
                var html = '<option></option>';
                $.map(res.data, function(e, i) {
                    html += `
                        <option value="${e.kode_wilayah}">${e.nama_gis}</option>
                    `;
                });
                $('#kota').html(html);
            }
        });
    }
</script>