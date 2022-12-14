<style>
    .fw-600 {
        font-weight: 600;
    }

    .br-atas {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body bg-primary br-atas p-3 mb-0">
                <h3 style="display: inline-block;" class="fw-600 text-white mb-0">Kelola Referensi Modul</h3>
                <button style="float: right;" onclick="tambah();" class="btn btn-light btn-rounded fw-500">
                    <i class="fa fa-plus mr-1"></i> Tambah Data
                </button>
                <div style="clear: both;"></div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="mt-3 table table-striped" id="table_data" style="width: 100%;">
                        <thead>
                            <tr>
                                <th class="fw-500">NO</th>
                                <th class="fw-500">NAMA MODUL</th>
                                <th class="fw-500" style="width: 450px;">PROGRAM</th>
                                <th class="fw-500" style="width: 250px;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal_custom" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div id="modal_custom_size" class="modal-dialog modal-xl">
        <div style="border: 0;" class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title mt-0 text-white">JUDUL</h5>
                <button type="button" class="close" onclick="$('#modal_custom').modal('hide');">
                    <span class="text-white" aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, saepe esse sit nihil aperiam quae porro eveniet in recusandae consequatur reiciendis voluptatibus blanditiis magni! Aliquid ex minima distinctio at quod.
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>