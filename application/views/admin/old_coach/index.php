<style type="text/css">
    small {
        font-size: 12px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="card-header">
                    <h5 class="m-b-0">Tabel <?php echo @$title ?></h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled">
                            <li><?php echo @$btn_tambah ?></li>
                        </ul>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="table-data" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle !important;width: 5%">No</th>
                                <!-- <th style="vertical-align: middle !important;">NUPTK</th> -->
                                <th class="text-center">NIP</th>
                                <th class="text-center">Nama</th>
                                <th class="text-center">Instansi</th>
                                <th class="text-center">Provinsi</th>
                                <th class="text-center">Kabupaten/Kota</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
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