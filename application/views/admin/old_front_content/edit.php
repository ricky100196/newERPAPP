<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <?php if (!empty($this->session->flashdata('error'))) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php $this->session->flashdata('error') ?>
                    </div>
                <?php endif ?>
                <?= validation_errors() ?>
                <form action="<?= site_url('admin/front_content/do_update') ?>" method="post" id="form-edit" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id" value="<?= encode_id($data->id) ?>">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control" placeholder="Masukkan judul.." value="<?= $data->title ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="ideas">Ideas <span class="text-danger">*</span></label>
                                <input type="text" name="ideas" id="ideas" class="form-control" placeholder="Masukkan nama Ideas.." value="<?= $data->ideas ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="analysis">Analysis <span class="text-danger">*</span></label>
                                <input type="text" name="analysis" id="analysis" class="form-control" placeholder="Masukkan Analysis.." value="<?= $data->analysis ?>" required>
                            </div>

                            <div class="form-group">
                                <label for="touch">Touch <span class="text-danger">*</span></label>
                                <input type="text" name="touch" id="touch" class="form-control" placeholder="Masukkan Touch.." value="<?= $data->touch ?>" required>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group">
                                <label for="desc_ideas">Desc Ideas <span class="text-danger">*</span></label>
                                <input type="text" name="desc_ideas" id="desc_ideas" class="form-control" placeholder="Masukkan Desc Ideas.." value="<?= $data->desc_ideas ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="desc_analysis">Desc Analysis <span class="text-danger">*</span></label>
                                <input type="text" name="desc_analysis" id="desc_analysis" class="form-control" placeholder="Masukkan Desc Analysis.." value="<?= $data->desc_analysis ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="desc_touch">Desc Touch <span class="text-danger">*</span></label>
                                <input type="text" name="desc_touch" id="desc_touch" class="form-control" placeholder="Masukkan Desc Touch.." value="<?= $data->desc_touch ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-">
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>