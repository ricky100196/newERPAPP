
<script type="text/javascript">
    $(document).ready(function(){
        load_table();
    });

    $('#add_material').click(function(){
        sj_no = 1;
        kedatangan_no = 1;
        invoice_no = 1;
    });

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
                            window.location.href = '<?= base_url('supplier_po/detail/'.$id) ?>';
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

    //sj
    function remove_sj(num){
        $('.fieldset-'+num).remove();
        sj_no-=1;
    };

    function add_sj(content = "") {
        var html = '';
        sj_no += 1;
        html += '<fieldset class="sj_first mb-1 sj_lanjut fieldset-'+sj_no+'">';
            html += '<div class="input-group">';
            html += '<input type="text" class="form-control" placeholder="Nomor Surat Jalan" name="sj_list[]" value="'+content+'">';
            html += '<div class="input-group-append">';
                html += '<button class="btn btn-danger" onclick="remove_sj('+sj_no+')" type="button">Hapus</button>';
            html += '</div>';
            html += '</div>';
        html += '</fieldset>';
        $( ".sj_form" ).append(html);
    }

    $('#add_sj_list').click(function(){
        add_sj();
    });

    //kedatangan
    function remove_kedatangan(num){
        $('.fieldset-'+num).remove();
        kedatangan_no-=1;
    };

    function add_kedatangan(content = "") {
        var html = '';
        kedatangan_no += 1;
        html += '<fieldset class="kedatangan_first mb-1 kedatangan_lanjut fieldset-'+kedatangan_no+'">';
            html += '<div class="input-group">';
            html += '<input type="text" class="form-control" placeholder="Kedatangan" name="kedatangan_list[]" value="'+content+'">';
            html += '<div class="input-group-append">';
                html += '<button class="btn btn-danger" onclick="remove_kedatangan('+kedatangan_no+')" type="button">Hapus</button>';
            html += '</div>';
            html += '</div>';
        html += '</fieldset>';
        $( ".kedatangan_form" ).append(html);
    }

    $('#add_kedatangan_list').click(function(){
        add_kedatangan();
    });

    //invoice
    function remove_invoice(num){
        $('.fieldset-'+num).remove();
        invoice_no-=1;
    };

    function add_invoice(content = "") {
        var html = '';
        invoice_no += 1;
        html += '<fieldset class="invoice_first mb-1 invoice_lanjut fieldset-'+invoice_no+'">';
            html += '<div class="input-group">';
            html += '<input type="text" class="form-control" placeholder="Invoice" name="invoice_list[]" value="'+content+'">';
            html += '<div class="input-group-append">';
                html += '<button class="btn btn-danger" onclick="remove_invoice('+invoice_no+')" type="button">Hapus</button>';
            html += '</div>';
            html += '</div>';
        html += '</fieldset>';
        $( ".invoice_form" ).append(html);
    }

    $('#add_invoice_list').click(function(){
        add_invoice();
    });
</script>
