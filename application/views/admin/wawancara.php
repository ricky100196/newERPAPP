<style type="text/css">
.toolbar {
    position: absolute;
    right: 10px;
    top: 10px;
}

@media screen and (max-width: 600px) {
    .toolbar {
        position: unset;
        text-align: center;
    }
}
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Daftar Wawancara</h4>
                <div class="toolbar">
                    <button type="button" data-toggle="modal" data-target="#modal-popout" onclick="tambah()"
                        class="btn btn-success"><i class="fa fa-plus"></i> Tambah Wawancara</button>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>NIB</th>
                                <th>Jenis Usaha</th>
                                <th>Nama Usaha</th>
                                <th>No HP</th>
                                <th>Link Pengisian</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $row->nib ?></td>
                                <td><?= $row->usaha ?></td>
                                <td><?= $row->nama_usaha ?></td>
                                <td><?= $row->no_hp ?></td>
                                <td>
                                    <a target="_blank" href="<?= base_url('form_wawancara?code=' . $row->code) ?>"><?= base_url('form_wawancara?code=' . $row->code) ?></a>
                                </td>
                                <td class="text-center">
                                    <button type="button" data-toggle="modal" data-target="#modal-popout"
                                        onclick="ubah(<?= $row->id ?>)" class="btn btn-sm btn-primary"><i
                                            class="bx bx-pencil"></i> Ubah</button>
                                    <button type="button" onclick="hapus(<?= $row->id ?>)"
                                        class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Hapus</button>
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
<div class="modal fade" id="modal-popout" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout modal-lg" role="document">
        <div class="modal-content">
            <div id="content_modal"></div>
        </div>
    </div>
</div>