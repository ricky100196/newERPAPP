<style type="text/css">
    small {
        font-size: 12px;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4 class="card-title"><?= $_title ?></h4>
                    </div>
                </div>
                <hr>
                <div class="text-right align-middle">

                    <a href="<?php echo base_url('admin/beranda/tambah'); ?>" class="btn btn-primary btn-rounded waves-effect waves-light">
                        <i class="bx bx-plus-circle mr-1"></i> Tambah Data
                    </a>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle !important;width: 5%">No</th>

                                <th class="text-center">Deskripsi</th>
                                <th class="text-center">Foto</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $row) : ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td>
                                        <?= $row->deskripsi ?>
                                    </td>
                                    <td>
                                        <img class="w-auto img-fluid rounded-3" src="<?= base_url($row->img_url) ?>" alt="img-hero-bgp" />

                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="<?= base_url('admin/beranda/edit/' . $row->id) ?>" class="btn btn-warning btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" ">
                                                <i class="bx bx-pencil font-size-15 align-middle"></i></a>
                                            <a href="javascript:;" data-url="<?= base_url('admin/beranda/hapus/' . $row->id) ?>" class="btn btn-danger btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="doHapus(this)">
                                                <i class="bx bx-trash font-size-15 align-middle"></i></a>
                                        </div>
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