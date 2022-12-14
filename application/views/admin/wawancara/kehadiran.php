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
                <h4 class="card-title">Daftar Kehadiran</h4>
                <div class="toolbar">
                    <button type="button" data-toggle="modal" data-target="#modal-popout-kehadiran"
                        onclick="tambah_kehadiran('<?= $id ?>')" class="btn btn-success"><i class="fa fa-plus"></i>
                        Tambah
                        Wawancara</button>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama Peserta</th>
                                <th>Jabatan</th>
                                <th>Nama Sekolah</th>
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach (@$data as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= @$row->nama_peserta ?></td>
                                <td><?= @$row->status ?></td>
                                <td><?= @$row->nama_sekolah ?></td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#modal-popout-ubah"
                                        onclick="ubah_kehadiran(<?= $row->id ?>)" class="btn btn-sm btn-primary"><i
                                            class="bx bx-pencil"></i> Ubah</button>
                                    <!-- <a data-toggle="modal" data-target="#modal-popout-ubah"
                                        onclick="ubah_kehadiran('<?= $row->id ?>')"
                                        class="btn btn-sm btn-primary">Edit</a> -->
                                    <button type="button" onclick="hapus_kehadiran(<?= $row->id ?>)"
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
<div class="modal fade" id="modal-popout-kehadiran" role="dialog" aria-labelledby="modal-popout" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout " role="document">
        <div class="modal-content">
            <div id="content_modal_kehadiran"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-popout-ubah" role="dialog" aria-labelledby="modal-popout-ubah" aria-hidden="true">
    <div class="modal-dialog modal-dialog-popout-ubah" role="document">
        <div class="modal-content">
            <div id="content_modal_kehadiran_ubah"></div>
        </div>
    </div>
</div>