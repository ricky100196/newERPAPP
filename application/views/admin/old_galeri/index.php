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

                    <button class="myStore btn btn-primary btn-rounded waves-effect waves-light">
                        <i class="bx bx-plus-circle mr-1"></i> Tambah Data
                    </button>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="datatable-buttons" class="table table-bordered nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th class="text-center" style="vertical-align: middle !important;width: 5%">No</th>

                                <th class="text-center">Nama File</th>
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
                                        <?= $row->nama_file ?>
                                    </td>
                                    <td>
                                        <img class="w-auto img-fluid rounded-3" src="<?= base_url($row->path) ?>" alt="img-hero-bgp" />

                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="<?= base_url('admin/galeri/edit/' . $row->id) ?>" class="myEdit btn btn-warning btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Edit" ">
                                                <i class=" bx bx-pencil font-size-15 align-middle"></i></a>
                                            <a href="javascript:;" data-url="<?= base_url('admin/galeri/hapus/' . $row->id) ?>" class="btn btn-danger btn-sm waves-effect waves-light" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="doHapus(this)">
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
<div id="myModalstore" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-upload-formulirLabel">Add Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url('admin/galeri/store') ?>" method="post" class="" id="form-add-galeri">
                <img class="w-auto img-fluid rounded-3" src="#" id="blah" alt="img-hero-bgp" />
                <div class="custom-file mb-3">
                    <input type="file" class="custom-file-input" name="image" id="file-image" onchange="readURL(this);" accept="image/*">
                    <label class="custom-file-label" for="file-image">Pilih File</label>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>