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
                <h4 class="card-title">Daftar Instrumen Guru Ekosistem Merdeka Belajar</h4>
                <hr>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nama</th>
                                <th>Program</th>
                                <?php if ($this->type!='guru') { ?>
                                <th>Instansi</th>
                                <th>NUPTK</th>
                                <th>Kontak</th>
                                <?php } ?>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $row->nama ?></td>
                                    <td><?= ($this->type=='guru') ? $row->program_bi : $row->program ?></td>
                                    <?php if ($this->type!='guru') { ?>
                                    <td><?= $row->instansi ?></td>
                                    <td><?= $row->nuptk ?></td>
                                    <td><?= $row->no_hp ?><br><?= $row->email ?></td>
                                    <?php } ?>
                                    <td class="text-center">
                                        <?= ($row->kunci=='0') ? '<button type="button" class="btn btn-sm btn-danger"> Belum Submit</button>' : '<a href="'.base_url('coaching/guru/'.encode_id($row->id)).'" class="btn btn-sm btn-primary"><i class="bx bx-detail"></i> Lihat</a>' ?>
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