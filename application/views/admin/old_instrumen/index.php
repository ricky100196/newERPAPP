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
                <h4 class="card-title">Instrumen Monitoring dan Evaluasi</h4>
                <?php if ($this->session->userdata('type') == 'admin') { ?>
                <div class="toolbar">
                    <button type="button" data-toggle="modal" data-target="#modal-popout" onclick="tambah()"
                        class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</button>
                </div>
                <?php } ?>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Petugas Monev</th>
                                <th>Petugas Administrasi</th>
                                <th>Kab/Kota</th>
                                <th>Provinsi</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Wawancara</th>
                                <th>Instrumen</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $row) : ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $row->nama ?></td>
                                <td><?= $row->petugas_administrasi ?></td>
                                <td><?= $row->nama_kab ?></td>
                                <td><?= $row->nama_prov ?></td>
                                <td><?= (@$row->tanggal_mulai ? date_to_id($row->tanggal_mulai) : '<span class="text-danger">Belum Monitoring</span>') ?>
                                </td>
                                <td><?= (@$row->tanggal_selesai ? date_to_id($row->tanggal_selesai) : '<span class="text-danger">Belum Monitoring</span>') ?>
                                </td>
                                <td>
                                    <a data-toggle="modal" data-target="#modal-popout"
                                        onclick="jenjang('<?= encode_id($row->id) ?>','ps')"
                                        class="btn btn-sm btn-outline-danger">Pengawas Sekolah</a>
                                    <a data-toggle="modal" data-target="#modal-popout"
                                        onclick="jenjang('<?= encode_id($row->id) ?>','ks')"
                                        class="btn btn-sm btn-outline-primary">Kepala Sekolah</a>
                                    <a data-toggle="modal" data-target="#modal-popout"
                                        onclick="jenjang('<?= encode_id($row->id) ?>','guru')"
                                        class="btn btn-sm btn-outline-success">Guru</a>
                                </td>
                                <td>
                                    <a href="<?= base_url('form_observasi?id=' . encode_id($row->id)) ?>"
                                        class="btn btn-sm btn-outline-primary">Isi instrumen</a>
                                    <a target="_blank"
                                        href="<?= base_url('form_observasi/rekap/' . encode_id($row->id)) ?>"
                                        class="btn btn-sm btn-outline-info">Cetak</a>
                                </td>
                                <td class="text-center">
                                    <button type="button" data-toggle="modal" data-target="#modal-popout"
                                        onclick="ubah('<?= encode_id($row->id) ?>')" class="btn btn-sm btn-warning"><i
                                            class="bx bx-pencil"></i> Ubah</button>
                                    <?php if ($this->session->userdata('type') == 'admin') { ?>
                                    <button type="button" onclick="hapus('<?= encode_id($row->id) ?>')"
                                        class="btn btn-sm btn-danger"><i class="bx bx-trash"></i> Hapus</button>
                                    <?php } else { ?>
                                    <a href="<?= base_url('instrumen/kehadiran/' . encode_id($row->id)) ?>"
                                        class="btn btn-sm btn-primary"><i class="bx bx-user"></i> Sekolah</a>
                                    <?php if ($row->kunci == '1') { ?>
                                    <button type="button" onclick="kunci('<?= encode_id($row->id) ?>', '0')"
                                        class="btn btn-sm btn-success"><i class="bx bx-lock"></i> Buka Kunci</button>
                                    <?php } else if ($row->kunci == '0' || $row->kunci == null) { ?>
                                    <button type="button" onclick="kunci('<?= encode_id($row->id) ?>', '1')"
                                        class="btn btn-sm btn-success"><i class="bx bx-lock"></i> Kunci
                                        Instrumen</button>
                                    <?php } ?>
                                    <?php } ?>
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
    <div class="modal-dialog modal-dialog-popout " role="document">
        <div class="modal-content">
            <div id="content_modal"></div>
        </div>
    </div>
</div>