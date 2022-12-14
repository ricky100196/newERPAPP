<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title"><?= $_title ?></h4>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle !important;width:5%">No</th>
                                <th style="vertical-align: middle !important;">NUPTK</th>
                                <!-- <th class="text-center">NIP</th> -->
                                <th class="text-center">Nama</th>
                                <th class="text-center">Instansi</th>
                                <th class="text-center">Provinsi</th>
                                <th class="text-center">Kabupaten/Kota</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($data as $row): ?>
                                <tr>
                                    <td class="text-center">
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $row->nuptk ?>
                                    </td>
                                    <!-- <td>
                                        <?= $row->nip ?>
                                    </td> -->
                                    <td>
                                        <?= $row->nama ?>
                                    </td>
                                    <td>
                                        <?= $row->instansi ?>
                                    </td>
                                    <td>
                                        <?= $row->prov ?>
                                    </td>
                                    <td>
                                        <?= $row->kab ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($row->deleted == NULL): ?>
                                            <span class="badge badge-pill badge-success">
                                                <i class="fa fa-check"></i> Aktif
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-pill badge-danger">
                                                <i class="fa fa-times"></i> Non Aktif
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if($row->deleted == NULL): ?>
                                            <button onclick="hapus('<?=encode_id($row->id)?>','<?=$row->nama?>')" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash"></i>
                                                Non Aktifkan
                                            </button>
                                        <?php else: ?>
                                            <button onclick="aktif('<?=encode_id($row->id)?>','<?=$row->nama?>')" class="btn btn-sm btn-success">
                                                <i class="fa fa-check"></i>
                                                Aktifkan
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>